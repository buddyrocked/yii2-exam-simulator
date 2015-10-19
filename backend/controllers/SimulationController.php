<?php

namespace backend\controllers;

use Yii;
use backend\models\Simulation;
use backend\models\SimulationSearch;
use backend\models\SimulationQuestion;
use backend\models\Subject;
use backend\models\SimulationQuestionAnswer;
use backend\controllers\BaseController as Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SimulationController implements the CRUD actions for Simulation model.
 */
class SimulationController extends Controller
{
     public $freeAccessActions = ['take'];

    /**
     * Lists all Simulation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SimulationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Simulation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'loginLayout';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Simulation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Simulation();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Simulation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Simulation model.
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
     * Finds the Simulation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Simulation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Simulation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     /**
     * Finds the Simulation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Simulation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findMine($id, $status = 0)
    {
        if (($model = Simulation::find()->where(['id'=>$id])->andWhere(['user_id'=>Yii::$app->user->id])->andWhere(['status'=>$status])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Subject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionPreview($id)
    {
        $this->layout = 'loginLayout';
        $model = Subject::findOne($id);
        
        return $this->render('prepare', [
            'model' => $model,
        ]);
    }

    public function actionStart($id){
        if(Yii::$app->request->post()):
            $subject = Subject::findOne($id);
            $transaction = Yii::$app->db->beginTransaction();  
            try{   
                $model = new Simulation();
                $model->user_id = Yii::$app->user->identity->id;
                $model->subject_id = $id;
                $model->duration = $subject->time;
                $model->timer_mode = $subject->timer_mode;
                $model->explain_mode = $subject->explain_mode;
                $model->start = date('H:i:s');
                $model->status = 0;
                $model->is_dummy = $subject->status;
                $model->minimum_score = $subject->minimum_score;
                $model->save();

                $model->insertSimulationDomain();

                $model->insertQuestionSimulations();

                $model->insertDomainStrength();

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

                $firstQuestion = $model->getSimulationQuestions()->orderBy('id ASC')->one();
                if(Yii::$app->session->get('simulation_'.$model->id) === NULL):
                    Yii::$app->session->set('simulation_'.$model->id, date('H:i:s'));
                endif;

                return $this->redirect(['/simulation/question/', 'id'=>$model->id, 'question'=>$firstQuestion->id]);

            }catch(Exception $e){
                $transaction->rollBack();
            }
        endif;
    }

    public function actionQuestion($id, $question){

        $this->layout = 'main-question';
        $mine = $this->findMine($id, 0);
        $modelQuestion = SimulationQuestion::findOne($question);

        $modelNext = SimulationQuestion::find()->where(['>', 'id', $question])->andWhere(['<>', 'is_read', 1])->andWhere(['simulation_id'=>$id])->orderBy('id ASC')->one();
        $modelPrev = SimulationQuestion::find()->where(['<', 'id', $question])->andWhere(['=', 'is_read', 1])->andWhere(['simulation_id'=>$id])->orderBy('id ASC')->one();
        
        if($modelQuestion->status == 0):
            $modelsAnswer = new SimulationQuestionAnswer;
        else:
            if($modelQuestion->simulation->timer_mode != 0):
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'danger',
                    'duration' => 500000,
                    'icon' => 'fa fa-volume-up',
                    'message' => 'You not allow to review your question.',
                    'title' => 'Warning',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['review', 'id' => $id]);
            endif;
            $modelsAnswer = SimulationQuestionAnswer::find()->where(['simulation_question_id'=>$question])->one();
        endif;

        //set time start
        if(Yii::$app->session->get($id.'_'.$question) === NULL):
            Yii::$app->session->set($id.'_'.$question, date('H:i:s'));
        endif;

        //set time start
        if(Yii::$app->session->get('simulation_'.$id) === NULL):
            Yii::$app->session->set('simulation_'.$id, date('H:i:s'));
        endif;

        //checking time is over
        if($modelQuestion->simulation->timer_mode == 3 || $modelQuestion->simulation->timer_mode == 1):
            $time = ($modelQuestion->simulation->subject->time * 60) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get('simulation_'.$modelQuestion->simulation->id)));
            if($time <= 0):
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'danger',
                    'duration' => 500000,
                    'icon' => 'fa fa-volume-up',
                    'message' => 'Time is up.',
                    'title' => 'Information',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['review', 'id'=>$id]);
            endif;
        elseif($modelQuestion->simulation->timer_mode == 2):
            $time = ($modelQuestion->question->time * 60) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get($id.'_'.$question)));
            if($time <= 0):
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'danger',
                    'duration' => 500000,
                    'icon' => 'fa fa-volume-up',
                    'message' => 'Time per question is up.',
                    'title' => 'Information',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
                
                if($modelNext != null):
                    return $this->redirect(['question', 'id' => $id, 'question'=>$modelNext->id]);
                else:
                    return $this->redirect(['review', 'id' => $id]);
                endif;

            endif;
        endif;

        if ($modelsAnswer->load(Yii::$app->request->post())) {
            $modelsAnswer->question_option_id = Yii::$app->request->post('SimulationQuestionAnswer')['question_option_id'];
            $transaction = Yii::$app->db->beginTransaction();  
            try{
                    $the_answer = $modelQuestion->question->getQuestionRightOptions()->select('id')->asArray()->all();
                    //not multiple answer
                    $modelQuestion->is_read = true;
                    if($modelQuestion->question->getQuestionRightOptions()->count() == 1):
                        if(in_array($modelsAnswer->question_option_id, ArrayHelper::getColumn($the_answer, 'id'))):
                            $modelQuestion->correct = 1;
                        else:
                            $modelQuestion->correct = 0;
                        endif;

                        $modelsAnswer->simulation_question_id = $modelQuestion->id;
                        if( $modelsAnswer->question_option_id != null):
                            $modelQuestion->status = 1;
                        else:
                            $modelQuestion->status = 0;
                        endif;

                        if(Yii::$app->request->post('mark') != null):
                            $modelQuestion->status = 2;
                        endif;

                        $modelsAnswer->status = 0;

                        if($modelsAnswer->save()):

                            if($modelQuestion->save()):
                                $transaction->commit();
                            else:
                                $transaction->rollBack();
                            endif;

                            
                            if($modelNext != null):
                                return $this->redirect(['question', 'id' => $id, 'question'=>$modelNext->id]);
                            else:
                                return $this->redirect(['review', 'id' => $id]);
                            endif;

                        else:
                            $transaction->rollBack();

                            if($modelQuestion->simulation->timer_mode == 3):
                                $time = ($modelQuestion->simulation->subject->time * 60) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get('simulation_'.$modelQuestion->simulation->id)));
                                if($time <= 0):
                                    return $this->actionPostfinish($id);
                                    //return $this->redirect(['review', 'id' => $id]);
                                endif;
                            endif;

                            return $this->render('question', [
                                'model' => $modelQuestion,
                                'modelsAnswer' => $modelsAnswer,
                                'modelNext' => $modelNext,
                                'modelPrev' => $modelPrev
                            ]);
                        endif;

                    else:
                        if(is_array($modelsAnswer->question_option_id)):
                            if(array_intersect(ArrayHelper::getColumn($the_answer, 'id'), $modelsAnswer->question_option_id) != NULL):
                                $modelQuestion->correct = 1;
                            else:
                                $modelQuestion->correct = 0;
                            endif;
                        else:
                            $modelQuestion->correct = 0;
                        endif;
                        $answers = Yii::$app->request->post('SimulationQuestionAnswer');
                        if(!empty($answers['question_option_id'])):
                            SimulationQuestionAnswer::deleteAll(['simulation_question_id'=>$modelQuestion->id]);
                            foreach ($answers['question_option_id'] as $answer):
                                $ans = new SimulationQuestionAnswer;
                                $ans->simulation_question_id = $modelQuestion->id;
                                $ans->status = 0;
                                $ans->question_option_id = $answer;

                                if(!$ans->save()):
                                    $transaction->rollBack();
                                    break;
                                endif;
                            endforeach;
                        endif;

                        if($modelsAnswer->question_option_id != null):
                            $modelQuestion->status = 1;
                        else:
                            $modelQuestion->status = 0;
                        endif;

                        if(Yii::$app->request->post('mark') != null):
                            $modelQuestion->status = 2;
                        endif;

                        if($modelQuestion->save()):
                            $transaction->commit();                            
                            
                            if($modelNext != null):

                                return $this->redirect(['question', 'id' => $id, 'question'=>$modelNext->id]);
                            else:
                                return $this->redirect(['review', 'id' => $id]);
                            endif;
                        else:
                            $transaction->rollBack();

                            if($modelQuestion->simulation->timer_mode == 3):
                                $time = ($modelQuestion->simulation->subject->time * 60) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get('simulation_'.$modelQuestion->simulation->id)));
                                if($time <= 0):
                                    return $this->actionPostfinish($id);
                                    //return $this->redirect(['review', 'id' => $id]);
                                endif;
                            endif;

                            return $this->render('question', [
                                'model' => $modelQuestion,
                                'modelsAnswer' => $modelsAnswer,
                                'modelNext' => $modelNext,
                                'modelPrev' => $modelPrev
                            ]);
                        endif;

                    endif;

                }catch(Exception $e){
                    $transaction->rollBack();
                }

            
        } else {
            return $this->render('question', [
                'model' => $modelQuestion,
                'modelsAnswer' => $modelsAnswer,
                'modelNext' => $modelNext,
                'modelPrev' => $modelPrev
            ]);
        }
    }

    public function actionViewquestion($id){
        
        $modelQuestion = SimulationQuestion::findOne($id);
        if($modelQuestion->status == 0):
            $modelsAnswer = new SimulationQuestionAnswer;
        else:
            $modelsAnswer = SimulationQuestionAnswer::find()->where(['simulation_question_id'=>$id])->one();
        endif;

        return $this->renderAjax('viewquestion', [
            'model' => $modelQuestion,
            'modelsAnswer' => $modelsAnswer
        ]);
    }

    public function actionBack($id, $question){
        $modelPrev = SimulationQuestion::find()->where(['<', 'id', $question])->andWhere(['simulation_id'=>$id])->orderBy('id DESC')->one();
        
        if($modelPrev != null):
            return $this->redirect(['question', 'id' => $id, 'question'=>$modelPrev->id]);
        else:
            return $this->redirect(['question', 'id' => $id, 'question'=>$question]);
        endif;
    }

    public function actionFinish($id){
        $this->layout = 'main-question';
        $model = $this->findMine($id, 1);
        return $this->render('finish', [
            'model' => $model,
        ]);
    }

    public function actionReview($id){
        
        $this->layout = 'main-question';
        $model = $this->findMine($id, 0);
        return $this->render('review', [
            'model' => $model,
        ]);
    }

    public function actionPostfinish($id){
        $model = $this->findModel($id);
        if(Yii::$app->request->post()):
            $model->status = 1;
            $model->finish = date('H:i:s');
            $model->save();
        endif;

        Yii::$app->getSession()->setFlash('success', [
            'type' => 'info',
            'duration' => 500000,
            'icon' => 'fa fa-volume-up',
            'message' => 'Data has been closed.',
            'title' => 'Information',
            'positonY' => 'bottom',
            'positonX' => 'right'
        ]);

        return $this->redirect(['finish', 'id'=>$id]);
    }

    public function getScore($id){
        $model = Simulation::findOne($id);
        $qustions = $model->getSimulationQuestions()->select('id')->all()->assArray();
        //$answer = 
    }

    public function actionList()
    {
        $this->layout = 'loginLayout';
        $searchModel = new SimulationSearch();
        $dataProvider = $searchModel->searchList(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTake()
    {
        $this->layout = 'loginLayout';
        Yii::$app->getSession()->setFlash('success', [
                         'type' => 'success',
                         'duration' => 5000000,
                         'icon' => 'fa fa-info-circle',
                         'message' => 'Welcome To Rialachas Exam Simulator',
                         'title' => 'Welcome',
                         'positonY' => 'bottom',
                         'positonX' => 'right'
                     ]);

        return $this->render('take', [
            'subjects'=>Subject::find(),
        ]);
    }
}
