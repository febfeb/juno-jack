<?php
namespace frontend\controllers;

use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex($slug) {
        //cari slug di database, kalo ada, redirect ke view item
        
        $url = \common\models\Url::find()->where(["url"=>$slug])->one();
        if($url != NULL){
            if($url->jenis == "b"){
                return $this->actionLihatBarang($url->data_id);
            }
        }
        
        //kalo gak ada, redirect ke url aslinya
        return $this->redirect([$slug."/index"]);
    }
    
    public function actionLihatBarang($id){
        return $this->render("lihat-barang", ["id"=>$id]);
    }
    
    public function actionLihatKategori($id){
        return $this->render("lihat-kategori", ["id"=>$id]);
    }
}