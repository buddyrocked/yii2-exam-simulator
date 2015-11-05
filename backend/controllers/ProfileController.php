<?php

namespace backend\controllers;

use Yii;
use backend\models\Profile;
use backend\models\ProfileSearch;
use backend\controllers\BaseController as Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profile();

        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if($model->photo){
                $path = Yii::getAlias('@backend') . '/web/uploads/profile/';
                $name = rand(1000,9999) . time();
                $model->photo->saveAs($path . $name . '.' . $model->photo->extension);
                $model->photo = $name . '.' . $model->photo->extension;

            } 
            $model->save();
            Yii::$app->session->setFlash('message', 'simpan berhasil berhasil katakan berhasil.');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->status = 1;
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if($model->photo){
                $path = Yii::getAlias('@backend') . '/web/uploads/profile/';
                $name = rand(1000,9999) . time();
                $model->photo->saveAs($path . $name . '.' . $model->photo->extension);
                $model->photo = $name . '.' . $model->photo->extension;
            }
            $model->save();
            Yii::$app->session->setFlash('message', 'simpan berhasil berhasil katakan berhasil.');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionViewdetail()
    {
        $this->layout = 'loginLayout';
        return $this->render('viewdetail', [
            'model' => $this->findModelDetail(),
        ]);
    }

    protected function findModelDetail()
    {
        if (($model = Profile::find()->where (['user_id' => Yii::$app->user->identity->id])->one()))
        {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpdatedetail()
    {
        $this->layout = 'loginLayout';
        $model = $this->findModelDetail();

        if ($model->load(Yii::$app->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if($model->photo){
                $path = Yii::getAlias('@backend') . '/web/uploads/profile/';
                $name = rand(1000,9999) . time();
                $model->photo->saveAs($path . $name . '.' . $model->photo->extension);
                $model->photo = $name . '.' . $model->photo->extension;
            }
            $model->save();
            Yii::$app->session->setFlash('message', 'simpan berhasil berhasil katakan berhasil.');
            return $this->redirect(['viewdetail', 'id' => $model->id]);
        } else {
            return $this->render('updatedetail', [
                'model' => $model,
            ]);
        }
    }
}
