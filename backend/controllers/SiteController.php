<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\controllers\BaseController as Controller;
use backend\models\Profile;
use backend\models\Subject;
use backend\models\Simulation;
use common\models\LoginForm;
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
        return $this->render('index');
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
            'simulations'=>Simulation::find()->where(['user_id'=>Yii::$app->user->identity->id])
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
