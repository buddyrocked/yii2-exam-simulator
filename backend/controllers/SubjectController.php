<?php

namespace backend\controllers;

use Yii;
use backend\models\Subject;
use backend\models\SubjectSearch;
use backend\models\Question;
use backend\models\QuestionOption;
use backend\models\QuestionDomain;
use backend\models\Domain;
use backend\components\Model;
use backend\controllers\BaseController as Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectController implements the CRUD actions for Subject model.
 */
class SubjectController extends Controller
{
    /**
     * Lists all Subject models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subject model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $modelQuestion = new Question();
        $modelsOption = [new QuestionOption()];
        $modelsDomain = [new QuestionDomain()];
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelQuestion' => $modelQuestion,
            'modelsOption' => $modelsOption,
            'modelsDomain' => $modelsDomain,
        ]);
    }

    /**
     * Creates a new Subject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subject();
        $modelsDomain = [new Domain()];

        if ($model->load(Yii::$app->request->post())) {           

            $modelsDomain = Model::createMultiple(Domain::classname());

            Model::loadMultiple($modelsDomain, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsDomain),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            //var_dump($valid); exit;
            $valid = Model::validateMultiple($modelsDomain) && $valid;
            //var_dump($valid); exit;
            if($valid){
                $transaction = Yii::$app->db->beginTransaction();  
                try{       
                    $model->id_subject = $model->generateNumber();
                    if($flag = $model->save(false)):    

                        if($flag){
                            foreach ($modelsDomain as $modelDomain) {
                                $modelDomain->subject_id = $model->id;
                                if(!($flag = $modelDomain->save(false))){
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }

                        if($flag):
                            $transaction->commit();
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
                        endif;

                    endif;                    

                }catch(Exception $e){
                    $transaction->rollBack();
                }
            }
              
            return $this->render('create', [
                'model' => $model,
                'modelsDomain'=>$modelsDomain,
            ]);

        
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsDomain' => $modelsDomain
            ]);
        }
    }

    /**
     * Updates an existing Subject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Subject model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionSetting($id, $setting = 0)
    {
        $model = $this->findModel($id);
        $model->timer_mode = $setting;
        if ($model->save()) {
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
        } else {
            Yii::$app->getSession()->setFlash('success', [
                                'type' => 'info',
                                'duration' => 500000,
                                'icon' => 'fa fa-volume-up',
                                'message' => 'Update data failed.',
                                'title' => 'Information',
                                'positonY' => 'bottom',
                                'positonX' => 'right'
                            ]);
            return $this->redirect(['view', 'id' => $model->id]);
        }
    }

    /**
     * Deletes an existing Subject model.
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
     * Finds the Subject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subject::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
