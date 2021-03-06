<?php

namespace app\controllers;

use app\models\Cabinet;
use app\models\Department;
use app\models\Equipment;
use app\models\Program;
use app\models\Zbir;
use app\models\Zbirpol;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;


class SiteController extends Controller
{
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
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                   [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login', 302);
        }
		
		if ($actualcompany = Yii::$app->request->post('company_id'))
			Yii::$app->session->set('company', $actualcompany);
			
		$user_id = Yii::$app->user->id;
		$user = User::findOne($user_id);
		return $this->render('index', ['user' => $user]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

		$user_id = Yii::$app->user->id;
//		$user = User::findOne($user_id);
		$firstcompany = (new \yii\db\Query())->select('company_id')->from('user_company')->where(['user_id' => $user_id])->one();		

		if ($actualcompany = $firstcompany['company_id']) {
		 if (!Yii::$app->session->get('company')){
			Yii::$app->session->set('company', $actualcompany);
	  	 }
		}

		return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCatalogues()
    {
        return $this->render('catalogues');
    }

    public function actionConfigurator()
    {
        return $this->render('configurator');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
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

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');
		   
			return $this->goHome();
        }
		
		if (!Yii::$app->user->isGuest) {Yii::$app->user->logout();}
		
        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }


    public function actionGetzboresbydepartment()
    {
        if (Yii::$app->request->isAjax && Yii::$app->user) {

            $department_id = (int)(json_decode($_POST['department_id'], true));
            if (Department::findOne($department_id)){

                $zbores = Zbir::find()->where(['department_id' => $department_id])->all();
                $cabinets = Cabinet::find()->where(['department_id' => $department_id])->all();
                $programs = Program::find()->where(['department_id' => $department_id])->all();

                if ($zbores){
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'zbores' => $zbores,
                        'cabinets' => $cabinets,
                        'programs' => $programs
                    ];
                }
                else {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'error' => 'Cannot to get zbores.'
                    ];
                }
            }
        }
    }


    public function actionGetzbirfields()
    {
        if (Yii::$app->request->isAjax && Yii::$app->user) {

            $zbir_id = (int)(json_decode($_POST['zbir_id'], true));
            if (Zbir::findOne($zbir_id)) {
                $zbir_fields = Zbirpol::find()->where(['zbir_id' => $zbir_id])->all();
                if ($zbir_fields) {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'zbirfields' => $zbir_fields,
                    ];
                } else {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'error' => 'Cannot  get zbirfields or empty.'
                    ];
                }
            }
        }
    }

    public function actionGetcomputersfromcabinet()
    {
        if (Yii::$app->request->isAjax && Yii::$app->user) {

            $cabinet_id = (int)(json_decode($_POST['cabinet_id'], true));
            if (Cabinet::findOne($cabinet_id)) {
                $computers = Equipment::find()->where(['cabinet_id' => $cabinet_id])->all();
                if ($computers) {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'computers' => $computers,
                    ];
                } else {
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return [
                        'error' => 'Cannot get computers or empty'
                    ];
                }
            }
        }
    }



    }
