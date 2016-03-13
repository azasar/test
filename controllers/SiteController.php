<?php

namespace app\controllers;

use app\models\Employee;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
        $models = Employee::find()->all();
        return $this->render('index',compact('models'));
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Creates new Employee model
     * @return string
     */
    public function actionCreate(){
        $model = new Employee();
        $model->load(Yii::$app->request->post());
        $model->save();
        return $this->renderAjax('_employee_row', compact('model'));
    }

    /**
     * Validates Employee model on create
     * @return array
     */
    public function actionValidateCreate(){
        $model = new Employee();
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }

    /**
     * Updates Employee model
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);
        if(isset($_POST['Employee'])){
            $model->load(Yii::$app->request->post());
            $model->save();
            return $this->renderAjax('_employee_row', compact('model'));
        }else{
            return $this->renderAjax('_form', compact('model'));
        }
    }

    /**
     * Validates Employee model on update
     * @param $id
     * @return array
     * @throws NotFoundHttpException
     */
    public function actionValidateUpdate($id){
        $model = $this->findModel($id);
        $model->load(Yii::$app->request->post());
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }

    /**
     * Deletes Employee model
     * @param $id
     * @throws NotFoundHttpException
     * @throws \Exception
     */
    public function actionDelete($id){
        $this->findModel($id)->delete();
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
