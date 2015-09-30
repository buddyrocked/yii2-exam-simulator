<?php

namespace backend\controllers;

use Yii;
use backend\models\Simulation;
use backend\models\SimulationSearch;
use backend\models\SimulationQuestion;
use backend\models\Subject;
use backend\models\SimulationQuestionAnswer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * SimulationController implements the CRUD actions for Simulation model.
 */
class SimulationController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

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
                $model->timer_mode = 0;
                $model->start = date('H:i:s');
                $model->status = 0;
                $model->save();

                $model->insertQuestionSimulations();

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
        if($modelQuestion->status == 0):
            $modelsAnswer = new SimulationQuestionAnswer;
        else:
            $modelsAnswer = SimulationQuestionAnswer::find()->where(['simulation_question_id'=>$question])->one();
        endif;

        if(Yii::$app->session->get($id.'_'.$question) === NULL):
            Yii::$app->session->set($id.'_'.$question, date('H:i:s'));
        endif;

        if(Yii::$app->session->get('simulation_'.$id) === NULL):
            Yii::$app->session->set('simulation_'.$id, date('H:i:s'));
        endif;

        if ($modelsAnswer->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();  
            try{
                    $the_answer = $modelQuestion->question->getQuestionRightOptions()->select('id')->asArray()->all();
                    
                    if($modelQuestion->question->getQuestionRightOptions()->count() == 1):
                        if(in_array($modelsAnswer->question_option_id, ArrayHelper::getColumn($the_answer, 'id'))):
                            $modelQuestion->correct = 1;
                        else:
                            $modelQuestion->correct = 0;
                        endif;

                        $modelsAnswer->simulation_question_id = $modelQuestion->id;
                        if(Yii::$app->request->post('mark') != null):
                            $modelQuestion->status = 2;
                        else:
                            $modelQuestion->status = 1;
                        endif;

                        $modelsAnswer->status = 0;

                        if($modelsAnswer->save()):

                            if($modelQuestion->save()):
                                $transaction->commit();
                            else:
                                $transaction->rollBack();
                            endif;

                            $modelNext = SimulationQuestion::find()->where(['>', 'id', $question])->andWhere(['<>', 'status', 1])->orderBy('id ASC')->one();
                            Yii::$app->session->remove($id.'_'.$question);
                           
                            if($modelQuestion->simulation->subject->timer_mode == 3):
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
                                    return $this->actionPostfinish($id);
                                    //return $this->redirect(['review', 'id' => $id]);
                                endif;
                            endif;

                            if($modelNext != null):
                                return $this->redirect(['question', 'id' => $id, 'question'=>$modelNext->id]);
                            else:
                                return $this->redirect(['review', 'id' => $id]);
                            endif;

                        else:
                            $transaction->rollBack();

                            if($modelQuestion->simulation->subject->timer_mode == 3):
                                $time = ($modelQuestion->simulation->subject->time * 60) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get('simulation_'.$modelQuestion->simulation->id)));
                                if($time <= 0):
                                    return $this->actionPostfinish($id);
                                    //return $this->redirect(['review', 'id' => $id]);
                                endif;
                            endif;

                            return $this->render('question', [
                                'model' => $modelQuestion,
                                'modelsAnswer' => $modelsAnswer
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

                        if(Yii::$app->request->post('mark') != null):
                            $modelQuestion->status = 2;
                        else:
                            $modelQuestion->status = 1;
                        endif;

                        if($modelQuestion->save()):
                            $transaction->commit();
                            $modelNext = SimulationQuestion::find()->where(['>', 'id', $question])->andWhere(['<>', 'status', 1])->orderBy('id ASC')->one();
                            Yii::$app->session->remove($id.'_'.$question);
                            
                            if($modelQuestion->simulation->timer_mode == 3):
                                $time = ($modelQuestion->simulation->subject->time * 60) - (strtotime((string)date('H:i:s')) - strtotime((string)Yii::$app->session->get('simulation_'.$modelQuestion->simulation->id)));
                                if($time <= 0):
                                    Yii::$app->getSession()->setFlash('success', [
                                        'type' => 'info',
                                        'duration' => 500000,
                                        'icon' => 'fa fa-volume-up',
                                        'message' => 'Time is up.',
                                        'title' => 'Information',
                                        'positonY' => 'bottom',
                                        'positonX' => 'right'
                                    ]);
                                    return $this->actionPostfinish($id);
                                    //return $this->redirect(['review', 'id' => $id]);
                                endif;
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
                                'modelsAnswer' => $modelsAnswer
                            ]);
                        endif;

                    endif;

                }catch(Exception $e){
                    $transaction->rollBack();
                }

            
        } else {
            return $this->render('question', [
                'model' => $modelQuestion,
                'modelsAnswer' => $modelsAnswer
            ]);
        }
    }

    public function actionFinish($id){
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
}
