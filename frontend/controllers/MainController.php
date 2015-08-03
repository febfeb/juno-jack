<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\controllers\BarangController;

class MainController extends Controller
{
    public function actionIndex($slug) {
        //cari slug di database, kalo ada, redirect ke view item
        
        $url = \common\models\Url::find()->where(["url" => $slug])->one();
        
        if($url != NULL){
            switch ($url->jenis) {
                case 'b':
                    return $this->actionLihatBarang($url->data_id);
                    break;
                case 'k':
                    return $this->actionLihatKategori($url->data_id);
                    break;
                case 'm':
                    return $this->actionLihatMerk($url->data_id);
                    break;
            }
        }
        
        //kalo gak ada, redirect ke url aslinya
        return $this->redirect([$slug."/index"]);
    }
    
    public function actionLihatBarang($id){
        return Yii::$app->runAction("barang/detail", ["id" => $id]);
    }
    
    public function actionLihatKategori($id){
        return Yii::$app->runAction("barang/kategori", ["id" => $id]);
    }

    public function actionLihatMerk($id){
        return Yii::$app->runAction("merk/index", ["id" => $id]);
    }
}