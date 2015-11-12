<?php

namespace backend\controllers;

use Yii;
use backend\components\Model;
use backend\models\Question;
use backend\models\QuestionSearch;
use backend\models\QuestionOption;
use backend\models\QuestionDomain;
use backend\models\Subject;
use backend\controllers\BaseController as Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\ArrayHelper;

/**
 * QuestionController implements the CRUD actions for Question model.
 */
class QuestionController extends Controller
{
    

    /**
     * Lists all Question models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Question model.
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
     * Creates a new Question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Question();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Question model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsOption = $model->questionOptions;
        $modelsDomain = ($model->questionDomains != null)?$model->questionDomains:[new QuestionDomain];

        if ($model->load(Yii::$app->request->post())) {

            $oldIDdomains = ArrayHelper::map($modelsDomain, 'id', 'id');
            $modelsDomain = Model::createMultiple(QuestionDomain::classname());
            $deletedIDdomains = array_diff($oldIDdomains, array_filter(ArrayHelper::map($modelsDomain, 'id', 'id')));
            
            $oldIDoptions = ArrayHelper::map($modelsOption, 'id', 'id');
            $modelsOption = Model::createMultiple(QuestionOption::classname());
            $deletedIDoptions = array_diff($oldIDoptions, array_filter(ArrayHelper::map($modelsOption, 'id', 'id')));


            Model::loadMultiple($modelsDomain, Yii::$app->request->post());
            Model::loadMultiple($modelsOption, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                /*Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsQuestion),
                    ActiveForm::validate($model)
                );*/
            }

            // validate all models
            $valid = $model->validate();
            //var_dump($valid); exit;
            $valid = Model::validateMultiple($modelsDomain) && $valid;
            //var_dump($valid); exit;
            $valid = Model::validateMultiple($modelsOption) && $valid;
            //var_dump($valid); exit;
            if($valid){
                $transaction = Yii::$app->db->beginTransaction();  
                try{                          
                    
                    //$subject = Subject::findOne($id);
                    //$model->id_question = $model->generateNumber($subject->name);
                    if($flag = $model->save(false)):    
                        if (! empty($deletedIDoptions)) {
                            QuestionOption::deleteAll(['id' => $deletedIDoptions]);
                        }
                        if($flag){
                            foreach ($modelsOption as $modelOption) {
                                $modelOption->question_id = $model->id;
                                if(!($flag = $modelOption->save(false))){
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }

                        if($flag){
                            if (! empty($deletedIDdomains)) {
                                QuestionDomain::deleteAll(['id' => $deletedIDdomains]);
                            }
                            foreach ($modelsDomain as $modelDomain) {
                                $modelDomain->question_id = $model->id;
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

                            return $this->redirect(['/subject/view', 'id'=>$model->subject_id]);
                        endif;

                    endif;                    

                }catch(Exception $e){
                    $transaction->rollBack();
                    Yii::$app->getSession()->setFlash('success', [
                                'type' => 'danger',
                                'duration' => 500000,
                                'icon' => 'fa fa-volume-up',
                                'message' => 'Data failed to save.',
                                'title' => 'Information',
                                'positonY' => 'bottom',
                                'positonX' => 'right'
                            ]);
                    return $this->render('update', [
                        'model' => $model,
                        'modelsOption' => $modelsOption,
                        'modelsDomain' => $modelsDomain,
                    ]);
                }
            }
        
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelsOption' => $modelsOption,
                'modelsDomain' => $modelsDomain,
            ]);
        }
    }

    /**
     * Deletes an existing Question model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $subject_id = $model->subject_id;
        $model->delete();

        Yii::$app->getSession()->setFlash('success', [
            'type' => 'info',
            'duration' => 500000,
            'icon' => 'fa fa-volume-up',
            'message' => 'Data has been deleted.',
            'title' => 'Information',
            'positonY' => 'bottom',
            'positonX' => 'right'
        ]);

        return $this->redirect(['/subject/view', 'id'=>$subject_id]);
    }

    /**
     * Finds the Question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Subject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd($id)
    {
        $model = new Question();
        $modelsOption = [new QuestionOption()];
        $modelsDomain = [new QuestionDomain()];
        
        if ($model->load(Yii::$app->request->post())) {           

            $modelsDomain = Model::createMultiple(QuestionDomain::classname());
            $modelsQuestion = Model::createMultiple(QuestionOption::classname());

            Model::loadMultiple($modelsDomain, Yii::$app->request->post());
            Model::loadMultiple($modelsQuestion, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                /*Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsQuestion),
                    ActiveForm::validate($model)
                );*/
            }

            // validate all models
            $valid = $model->validate();
            //var_dump($valid); exit;
            $valid = Model::validateMultiple($modelsDomain) && $valid;
            //var_dump($valid); exit;
            $valid = Model::validateMultiple($modelsQuestion) && $valid;
            //var_dump($valid); exit;
            if($valid){
                $transaction = Yii::$app->db->beginTransaction();  
                try{                          
                    $model->subject_id = $id; 
                    $subject = Subject::findOne($id);
                    $model->id_question = $model->generateNumber($subject->name);
                    if($flag = $model->save(false)):    

                        if($flag){
                            foreach ($modelsQuestion as $modelQuestion) {
                                $modelQuestion->question_id = $model->id;
                                if(!($flag = $modelQuestion->save(false))){
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }

                        if($flag){
                            foreach ($modelsDomain as $modelDomain) {
                                $modelDomain->question_id = $model->id;
                                if(!($flag = $modelDomain->save(false))){
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                        }

                        if($flag):
                            $transaction->commit();
                            Yii::$app->response->format = Response::FORMAT_JSON;
                            return ['status'=>'1', 'message' => 'Data has been saved.'];
                        endif;

                    endif;                    

                }catch(Exception $e){
                    $transaction->rollBack();
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ['status'=>'0', 'message' => 'Data failed to saved.'];
                }
            }
        }
    }
}
