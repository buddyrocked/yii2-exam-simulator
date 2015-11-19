<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Cms;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Html;
use Yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'frontendLayout';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $latest_issues = Cms::find()->where(['type'=>1])->all();
        $latest_event = Cms::find()->where(['type'=>4])->orderBy('created DESC')->one();
        $services = Cms::find()->where(['type'=>3])->all();
        return $this->render('index', [
            'latest_issues'=>$latest_issues,
            'services'=>$services,
            'latest_event'=>$latest_event
        ]);
    }

    public function actionPopup($id){
        $latest_event = Cms::find()->where(['id'=>$id])->orderBy('created DESC')->one();
        echo Html::a(
            Html::img('@web/uploads/cms/'.$latest_event->image, ['class'=>'popup-image']),
            ['/site/training']
        );
    }

    public function actionServices()
    {
        $services = Cms::find()->where(['type'=>3])->all();
        return $this->render('services', ['services'=>$services]);
    }

    public function actionProduct()
    {
        $products = Cms::find()->where(['type'=>5])->orderBy('updated DESC');
        return $this->render('product', ['products'=>$products]);
    }

    public function actionTraining()
    {   
        $trainings = Cms::find()->where(['type'=>2])->all();
        $events = Cms::find()->where(['type'=>4])->orderBy('updated DESC');
                
        return $this->render('training', ['trainings'=>$trainings, 'events'=>$events]);
    }

    public function actionPartners()
    {
        $clients = Cms::find()->where(['type'=>6])->orderBy('updated DESC');
        $partners = Cms::find()->where(['type'=>7])->all();
        return $this->render('partners', ['clients'=>$clients, 'partners'=>$partners]);
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

    public function actionContact()
    {
        $model = new ContactForm();
        $address = Cms::find()->where(['title'=>'address'])->one();
        $hire = Cms::find()->where(['title'=>'hire'])->one();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'info',
                    'duration' => 500000,
                    'icon' => 'fa fa-volume-up',
                    'message' => 'Thank you for contacting us. We will respond to you as soon as possible..',
                    'title' => 'Information',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            } else {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'info',
                    'duration' => 500000,
                    'icon' => 'fa fa-volume-up',
                    'message' => 'There was an error sending email.',
                    'title' => 'Information',
                    'positonY' => 'bottom',
                    'positonX' => 'right'
                ]);
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
                'address' => $address,
                'hire' => $hire
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
