<?php
namespace frontend\controllers;

use Yii;
use common\models\BarangThumbnails;

class BarangController extends \yii\web\Controller
{

    public function actionIndex($id)
    {
        $thumbnail = BarangThumbnails::findOne($id);
        
        $response = Yii::$app->getResponse();
        $response->headers->set('Content-Type', 'image/jpeg');
        $response->format = Response::FORMAT_RAW;
        
        if ( !is_resource($response->stream = fopen(Yii::$app->params['uploadPathBackendThumbnails'].$thumbnail->url, 'r')) ) {
            throw new \yii\web\ServerErrorHttpException('file access failed: permission deny');
        }

        return $response->send();
    }
}
