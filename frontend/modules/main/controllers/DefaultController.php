<?php

namespace app\modules\main\controllers;

use frontend\components\Common;
use yii\web\Controller;

class DefaultController extends Controller
{

    public function actionIndex()
    {
        $this->layout ="bootstrap";

        return $this->render('index');
    }
    public function actionPath(){
        print \Yii::getAlias('@frontend');
    }

    public function actionEvent(){
        $component = new Common();
        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
        $component->sendMail('test@domine.com', 'Test', 'Test text');
    }

    public function actionLocator(){
        $locator = \Yii::$app->locator;
        $cache =  $locator->cache;
        $cache->set("test", 1);
        print $cache->get("test");
    }
}
