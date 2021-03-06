<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Cms;
use frontend\models\Event;
use frontend\models\EventRegistration;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function init()
    {
        parent::init();
        Yii::$app->seo->title = '| Consulting | Implementation | Audit | Training | - Rialachas ...means governance';
        Yii::$app->seo->metakeys = 'Rialachas, Consulting, Implementation, Audit, Training';
        Yii::$app->seo->metadesc = 'Rialachas provide services in consultancy and training related to information systems security in Indonesia.';
        Yii::$app->seo->tags['og:type'] = 'website';
        Yii::$app->seo->tags['og:title'] = '| Consulting | Implementation | Audit | Training | - Rialachas ...means governance';
        Yii::$app->seo->tags['og:site_name'] = 'Rialachas';
        Yii::$app->seo->tags['og:image'] = Url::to('@web/uploads/logo.png');
        Yii::$app->seo->tags['og:description'] = 'Rialachas provide services in consultancy and training related to information systems security in Indonesia.';
    }

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
        $latest_event = Event::find()->where(['published'=>1])->orderBy('datetime DESC')->one();
        $services = Cms::find()->where(['type'=>3])->all();
        return $this->render('index', [
            'latest_issues'=>$latest_issues,
            'services'=>$services,
            'latest_event'=>$latest_event
        ]);
    }

    public function actionEvent()
    {
        Yii::$app->seo->title = 'Rialachas - Our Events';
        Yii::$app->seo->tags['og:type'] = 'Event';
        Yii::$app->seo->tags['og:title'] = 'Rialachas - Our Events';

        $events = Event::find()->where(['published'=>1])->all();
        return $this->render('events', ['events'=>$events]);
    }

    public function actionPopup($id){
        $latest_event = Event::find()->where(['id'=>$id])->orderBy('created DESC')->one();
        echo Html::a(
            Html::img('@web/uploads/event/'.$latest_event->image, ['class'=>'popup-image']),
            ['/site/detail', 'id'=>$latest_event->id, 'name'=>$latest_event->name]
        );
    }

    public function actionServices()
    {
        Yii::$app->seo->title = 'Rialachas - Our Services';
        Yii::$app->seo->tags['og:type'] = 'Website';
        Yii::$app->seo->tags['og:title'] = 'Rialachas - Our Services';

        $services = Cms::find()->where(['type'=>3])->all();
        return $this->render('services', ['services'=>$services]);
    }

    public function actionProduct()
    {
        Yii::$app->seo->title = 'Rialachas - Our Products';
        Yii::$app->seo->tags['og:type'] = 'Website';
        Yii::$app->seo->tags['og:title'] = 'Rialachas - Our Products';

        $products = Cms::find()->where(['type'=>5])->orderBy('updated DESC');
        return $this->render('product', ['products'=>$products]);
    }

    public function actionTraining()
    {   
        Yii::$app->seo->title = 'Rialachas - Our Training';
        Yii::$app->seo->tags['og:type'] = 'Website';
        Yii::$app->seo->tags['og:title'] = 'Rialachas - Our Training';

        $trainings = Cms::find()->where(['type'=>2])->all();
        //$events = Cms::find()->where(['type'=>4])->orderBy('updated DESC');
        $events = Event::find()->where(['published'=>1])->orderBy('datetime DESC');
                
        return $this->render('training', ['trainings'=>$trainings, 'events'=>$events]);
    }

    public function actionDetail($id, $name){
        $model = new EventRegistration();
        $model_event = Event::findOne($id);
        $model->status = 0;
        $model->event_id = $model_event->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->sendMail();
            Yii::$app->getSession()->setFlash('success', [
                'type' => 'info',
                'duration' => 500000,
                'icon' => 'fa fa-volume-up',
                'message' => 'Thank you for Event registration. We will respond to you as soon as possible..',
                'title' => 'Information',
                'positonY' => 'bottom',
                'positonX' => 'right'
            ]);
            return $this->redirect(['detail', 'id' => $id, 'name'=>$name]);
        } else {
            Yii::$app->seo->title = 'Rialachas - Our Event '.$model_event->name;
            Yii::$app->seo->tags['og:type'] = 'Event';
            Yii::$app->seo->tags['og:title'] = 'Rialachas - Our Events'.$model_event->name;

            return $this->render('detail', [
                'model' => $model,
                'model_event' => $model_event
            ]);
        }

    }

    public function actionForm($id){
        $model = Event::findOne($id);
        $path = Yii::getAlias('@frontend') .'/web/uploads/event/';
        
        if(isset($model->file)):
            $file = $path . $model->file;

            if (file_exists($file)) {
               Yii::$app->response->sendFile($file);
            }
        endif;
    }

    public function actionClients()
    {
        Yii::$app->seo->title = 'Rialachas - Our Clients';
        Yii::$app->seo->tags['og:type'] = 'Website';
        Yii::$app->seo->tags['og:title'] = 'Rialachas - Our Clients';

        $clients = Cms::find()->where(['type'=>6])->orderBy('updated DESC');
        return $this->render('clients', ['clients'=>$clients]);
    } 

    public function actionPartners()
    {
        Yii::$app->seo->title = 'Rialachas - Our Partners';
        Yii::$app->seo->tags['og:type'] = 'Website';
        Yii::$app->seo->tags['og:title'] = 'Rialachas - Our Partners';

        $partners = Cms::find()->where(['type'=>7])->orderBy('updated DESC');
        return $this->render('partners', ['partners'=>$partners]);
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
        Yii::$app->seo->title = 'Rialachas - Our Contact';
        Yii::$app->seo->tags['og:type'] = 'Website';
        Yii::$app->seo->tags['og:title'] = 'Rialachas - Our Contact';

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
