<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Cms;
use frontend\models\CmsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * CmsController implements the CRUD actions for Cms model.
 */
class CmsController extends Controller
{
    public $layout = 'frontendLayout';
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CmsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cms model.
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
     * Creates a new Cms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cms();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image){                
                $path = Yii::getAlias('@frontend') .'/web/uploads/cms/';

                if(!is_dir($path)):
                    mkdir($path, 0777, true);
                endif;

                $name = rand(1000,9999) . time();
                $model->image->saveAs($path . $name . '.' . $model->image->extension);
                $model->image = $name . '.' . $model->image->extension;
            }

            if($model->save()):
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'info',
                    'duration' => 500000,
                    'icon' => 'fa fa-volume-up',
                    'message' => 'Data has been saved.',
                    'title' => 'Information',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);

                return $this->redirect(['view', 'id' => $model->id]);
            else:
                return $this->render('create', [
                    'model' => $model,
                ]);
            endif;
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Cms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            if($model->image){                
                $path = Yii::getAlias('@frontend') .'/web/uploads/cms/';

                if(!is_dir($path)):
                    mkdir($path, 0777, true);
                endif;

                $name = rand(1000,9999) . time();
                $model->image->saveAs($path . $name . '.' . $model->image->extension);
                $model->image = $name . '.' . $model->image->extension;
            }else{
                $model->image = $this->findModel($id)->image;
            }

            if($model->save()):
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'info',
                    'duration' => 500000,
                    'icon' => 'fa fa-volume-up',
                    'message' => 'Data has been updated.',
                    'title' => 'Information',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);

                return $this->redirect(['view', 'id' => $model->id]);
            else:
                return $this->render('update', [
                    'model' => $model,
                ]);
            endif;
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Cms model.
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
     * Finds the Cms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
