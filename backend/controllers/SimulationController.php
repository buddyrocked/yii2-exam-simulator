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
                return $this->redirect(['/simulation/question/', 'id'=>$model->id, 'question'=>$firstQuestion->id]);

            }catch(Exception $e){
                $transaction->rollBack();
            }
        endif;
    }

    public function actionQuestion($id, $question){
        $this->layout = 'main-question';
        $modelQuestion = SimulationQuestion::findOne($question);
        $modelsAnswer = new SimulationQuestionAnswer;
        if ($modelsAnswer->load(Yii::$app->request->post())) {

            $modelsAnswer->simulation_question_id = $modelQuestion->id;
            $modelsAnswer->status = 1;
            if($modelsAnswer->save()):
                $modelNext = SimulationQuestion::find()->where(['>', 'id', $question])->orderBy('id ASC')->one();
                if($modelNext != null):
                    return $this->redirect(['question', 'id' => $id, 'question'=>$modelNext->id]);
                else:
                    return $this->redirect(['finish', 'id' => $id]);
                endif;
            else:
                return $this->render('question', [
                    'model' => $modelQuestion,
                    'modelsAnswer' => $modelsAnswer
                ]);
            endif;
        } else {
            return $this->render('question', [
                'model' => $modelQuestion,
                'modelsAnswer' => $modelsAnswer
            ]);
        }
    }

    public function actionFinish($id){
        $model = $this->findModel($id);
        return $this->render('finish', [
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

        return $this->redirect(['/site/dashboard']);
    }

    public function getScore($id){
        $model = Simulation::findOne($id);
        $qustions = $model->getSimulationQuestions()->select('id')->all()->assArray();
        //$answer = 
    }
}
