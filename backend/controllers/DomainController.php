<?php

namespace backend\controllers;

use Yii;
use backend\models\Domain;
use backend\models\DomainSearch;
use backend\models\Question;
use backend\models\QuestionDomain;
use backend\models\QuestionOption;
use backend\controllers\BaseController as Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DomainController implements the CRUD actions for Domain model.
 */
class DomainController extends Controller
{
    
    /**
     * Lists all Domain models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DomainSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Domain model.
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
     * Creates a new Domain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Domain();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new Domain model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd($id)
    {
        $model = new Domain();

        if ($model->load(Yii::$app->request->post())) {
            $model->subject_id = $id;
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
                return $this->redirect(['/subject/view', 'id' => $id]);
            else:
                return $this->render('create', [
                    'model' => $model,
                ]);
            endif;
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Domain model.
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
                return $this->redirect(['/subject/view', 'id' => $model->subject->id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Domain model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $subject_id = $model->subject->id;

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
        return $this->redirect(['/subject/view', 'id' => $subject_id]);
    }

    /**
     * Finds the Domain model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Domain the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Domain::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTransferperdomain($domain_source_id){

        if(Yii::$app->request->post()):
            $domainSource = $this->findModel($domain_source_id);
            $questionSources = $domainSource->questionDomains;
            $domainNew = $this->findModel(Yii::$app->request->post('domain_id'));

            if($questionSources != null):
                $transaction = Yii::$app->db->beginTransaction();  
                try{
                    foreach($questionSources as $questionSource):
                        $question = $questionSource->question;
                        //check question exist at new domain
                        $existQuestion = QuestionDomain::find()->joinWith('question')->where(['domain_id'=>$domainNew->id])->andWhere(['question.question'=>$question->question])->all();
                        if($existQuestion == null):
                            //insert to table question
                            $newQuestion = new Question();
                            $newQuestion->attributes = $questionSource->getQuestion()->asArray()->one();
                            $newQuestion->subject_id = $domainNew->subject_id;
                            $newQuestion->id_question = $newQuestion->generateNumber($domainNew->subject->name);
                            if(!$newQuestion->validate()) {
                                print_r($newQuestion->getErrors());
                                break;
                            }
                            $newQuestion->save();

                            //insert to table question_domain
                            $newQuestionDomain = new QuestionDomain();
                            $newQuestionDomain->domain_id = $domainNew->id;
                            $newQuestionDomain->question_id = $newQuestion->id;
                            if(!$newQuestionDomain->validate()) {
                                print_r($newQuestionDomain->getErrors());
                                break;
                            }
                            $newQuestionDomain->save();

                            $options = $question->getQuestionOptions()->asArray()->all();
                            if($options != null):
                                foreach($options as $option):
                                    $newOption = new QuestionOption();
                                    $newOption->attributes = $option;
                                    $newOption->question_id = $newQuestion->id;
                                    if(!$newOption->validate()) {
                                        print_r($newOption->getErrors());
                                        break;
                                    }
                                    $newOption->save();
                                endforeach;
                            endif;
                        endif;
                    endforeach;

                    
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
                }

                return $this->redirect(['/subject/view', 'id'=>$domainNew->subject_id]);
            endif;
        else:
            return $this->renderAjax('_transferperdomain');
        endif;
    }

    public function actionTransfermultiple($subject_id){

        if(Yii::$app->request->post('domain_id') != null && Yii::$app->request->post('selection') != null):
            //print_r(Yii::$app->request->post()); exit;
            $questionSources = QuestionDomain::find()->where(['in', 'question_id', Yii::$app->request->post('selection')])->all();
            //var_dump($questionSources); exit;
            $domainNew = $this->findModel(Yii::$app->request->post('domain_id'));

            if($questionSources != null):
                $transaction = Yii::$app->db->beginTransaction();  
                try{
                    foreach($questionSources as $questionSource):
                        $question = $questionSource->question;
                        //check question exist at new domain
                        $existQuestion = QuestionDomain::find()->joinWith('question')->where(['domain_id'=>$domainNew->id])->andWhere(['question.question'=>$question->question])->all();
                        if($existQuestion == null):
                            //insert to table question
                            $newQuestion = new Question();
                            $newQuestion->attributes = $questionSource->getQuestion()->asArray()->one();
                            $newQuestion->subject_id = $domainNew->subject_id;
                            $newQuestion->id_question = $newQuestion->generateNumber($domainNew->subject->name);
                            if(!$newQuestion->validate()) {
                                print_r($newQuestion->getErrors());
                                break;
                            }
                            $newQuestion->save();

                            //insert to table question_domain
                            $newQuestionDomain = new QuestionDomain();
                            $newQuestionDomain->domain_id = $domainNew->id;
                            $newQuestionDomain->question_id = $newQuestion->id;
                            if(!$newQuestionDomain->validate()) {
                                print_r($newQuestionDomain->getErrors());
                                break;
                            }
                            $newQuestionDomain->save();

                            $options = $question->getQuestionOptions()->asArray()->all();
                            if($options != null):
                                foreach($options as $option):
                                    $newOption = new QuestionOption();
                                    $newOption->attributes = $option;
                                    $newOption->question_id = $newQuestion->id;
                                    if(!$newOption->validate()) {
                                        print_r($newOption->getErrors());
                                        break;
                                    }
                                    $newOption->save();
                                endforeach;
                            endif;
                        endif;
                    endforeach;

                    
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
                }

                return $this->redirect(['/subject/view', 'id'=>$domainNew->subject_id]);
            endif;
        else:
            Yii::$app->getSession()->setFlash('success', [
                        'type' => 'danger',
                        'duration' => 500000,
                        'icon' => 'fa fa-volume-up',
                        'message' => 'Please select question and domain first.',
                        'title' => 'Information',
                        'positonY' => 'bottom',
                        'positonX' => 'right'
                    ]);
            return $this->redirect(['/subject/view', 'id'=>$subject_id]);
        endif;
    }
}
