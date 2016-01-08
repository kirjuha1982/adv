<?php

namespace frontend\modules\main\controllers;

use frontend\models\ContactForm;
use frontend\models\Image;
use frontend\models\SignupForm;
use yii\base\Response;
use yii\widgets\ActiveForm;

class MainController extends \yii\web\Controller
{
    public $layout = '\\inner';
    //public $layout ="//bootstrap";

    public function actions()
    {
        return [
           'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        //$url_image = Image::getImageUrl();
		//echo $url_image;
        return $this->render('index');
    }
    //public $layout ="//bootstrap";
    public function actionRegister()
    {
        $model = new SignupForm();
        /*
        if(\Yii::$app->request->isAjax){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        */
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            print_r($model->getAttributes());
           // die;
        }

        return $this->render('register', ['model'=>$model]);
    }

    public function actionContact(){
        $model = new ContactForm();
        return $this->render('contact', ['model'=>$model]);
    }
}
