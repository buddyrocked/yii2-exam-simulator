<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\BaseController as Controller;
use backend\models\Profile;
use backend\models\Subject;
use backend\models\Simulation;
use common\models\LoginForm;
use backend\models\Content;
use yii\filters\VerbFilter;
use backend\models\UploadForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $freeAccessActions = ['index'];

    public $layout = 'loginLayout';
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        Yii::$app->getSession()->setFlash('success', [
                         'type' => 'success',
                         'duration' => 5000000,
                         'icon' => 'fa fa-info-circle',
                         'message' => 'Welcome To Rialachas Exam Simulator',
                         'title' => 'Welcome',
                         'positonY' => 'bottom',
                         'positonX' => 'right'
                     ]);
        $intro = Content::find()->where(['id' => '1'])->one();
        $process1 = Content::find()->where(['id' => '2'])->one();
        $process2 = Content::find()->where(['id' => '3'])->one();
        $process3 = Content::find()->where(['id' => '4'])->one();
        $features1 = Content::find()->where(['id' => '5'])->one();
        $features2 = Content::find()->where(['id' => '6'])->one();
        $features3 = Content::find()->where(['id' => '7'])->one();
        $Advantages1 = Content::find()->where(['id' => '8'])->one();
        $Advantages2 = Content::find()->where(['id' => '9'])->one();
        $Advantages3 = Content::find()->where(['id' => '10'])->one();
        $Advantages4 = Content::find()->where(['id' => '11'])->one();
        $Advantages5 = Content::find()->where(['id' => '12'])->one();
        $Advantages6 = Content::find()->where(['id' => '13'])->one();

        return $this->render('index', [
            'intro' => $intro,
            'process1' => $process1,
            'process2' => $process2,
            'process3' => $process3,
            'features1' => $features1,
            'features2' => $features2,
            'features3' => $features3,
            'Advantages1' => $Advantages1,
            'Advantages2' => $Advantages2,
            'Advantages3' => $Advantages3,
            'Advantages4' => $Advantages4,
            'Advantages5' => $Advantages5,
            'Advantages6' => $Advantages6,
        ]);
    }

    public function actionDashboard()
    {
        $this->layout = 'main';
        Yii::$app->getSession()->setFlash('success', [
                         'type' => 'success',
                         'duration' => 5000000,
                         'icon' => 'fa fa-info-circle',
                         'message' => 'Welcome To Rialachas Exam Simulator',
                         'title' => 'Welcome',
                         'positonY' => 'bottom',
                         'positonX' => 'right'
                     ]);

        return $this->render('dashboard', [
            'profile'=>Profile::find()->where(['user_id'=>Yii::$app->user->identity->id])->one(),
            'subjects'=>Subject::find(),
            'simulations'=>Simulation::find()->where(['user_id'=>Yii::$app->user->identity->id])->limit(5)->orderBy('id DESC')
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
