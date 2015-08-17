<?php
namespace frontend\controllers;

use Yii;
use common\models\Barang;
use common\models\BarangThumbnail;
use common\models\Kategori;

class BarangController extends \yii\web\Controller {
    
    private function cariKategoriParent($id, $array = []){
        $kategori = Kategori::findOne($id);
        $array[] = $kategori->id;
        if($kategori->parent_id == 0) return $array;
        //rekursif untuk mencari parent nya
        return $this->cariKategoriParent($kategori->parent_id, $array);
    }
    
    private function buildObject($kategori_id, $label, $space, $count){
        $url = \common\models\Url::find()->where(["jenis"=>"k", "data_id"=>$kategori_id])->one();
        return [
            "label" => $label,
            "space" => $space,
            "count" => $count,
            "url" => $url ? \yii\helpers\Url::to(["/".$url->url]) : "not-set"
        ];
    }
    
    private function expandMenu($kategoriTerpilih, $kategori_id = 0, $level = 0){
        $array = [];
        $kategori = Kategori::findOne($kategori_id);
        if($kategori != NULL){
            //$array[] = str_replace("@", "&nbsp;&nbsp;&nbsp;&nbsp;", str_pad("", $level-1, "@", STR_PAD_LEFT)).$kategori->nama." (".$kategori->jumlah_barang.")";
            $array[] = $this->buildObject($kategori_id, $kategori->nama, $level-1, $kategori->jumlah_barang);
        }
        $all = Kategori::find()->where(['parent_id' => $kategori_id])->all();
        foreach ($all as $kategori){
            if(in_array($kategori->id, $kategoriTerpilih) ){
                foreach ($this->expandMenu($kategoriTerpilih, $kategori->id, $level + 1) as $m) {
                    $array[] = $m;
                }
            }else{
                //$array[] = str_replace("@", "&nbsp;&nbsp;&nbsp;&nbsp;", str_pad("", $level, "@", STR_PAD_LEFT)).$kategori->nama." (".$kategori->jumlah_barang.")";
                $array[] = $this->buildObject($kategori->id, $kategori->nama, $level, $kategori->jumlah_barang);
            }
            //$array[] = str_replace("@", "&nbsp;", str_pad($kategori->nama, $level, "@", STR_PAD_LEFT));
        }
        return $array;
    }
    
    private function getChildrenKategori($id){
        $array = [$id];
        $all = Kategori::find()->where(['parent_id' => $id])->all();
        foreach ($all as $kategori){
            foreach ($this->getChildrenKategori($kategori->id) as $m) {
                $array[] = $m;
            }
        }
        return $array;
    }

    public function actionKategori($id) {
        $core_kategori = Kategori::findOne($id);
        $kategori_terbuka = $this->cariKategoriParent($id);
        $sidebar_menu = $this->expandMenu($kategori_terbuka);

        //mencari untuk breadcrumb
        $nested_kategori = [];
        $kategori = Kategori::findOne($id);
        while (isset($kategori->parent)) {
            $kategori = $kategori->parent;
            $nested_kategori[] = ['label' => $kategori->nama];
        }
        
        //mencari semua anak dari sebuah kategori
        $children_kategori = Kategori::getAllChildrenFromID($id);

        return $this->render('barang-kategori', [
            'kategori' => $core_kategori,
            'children_kategori' => $children_kategori,
            'sidebar_menu' => $sidebar_menu,
            'barangs' => Barang::find()->where(['kategori_id' => $children_kategori])->all(),
            'nested_kategori' => $nested_kategori,
        ]);
    }

    public function actionDetail($id)
    {
        $barang = Barang::findOne($id);
        $thumbnails = BarangThumbnail::find()->where(['barang_id' => $id])->all();
    	return $this->render('barang-detail', [
            'barang' => $barang,
            'thumbnails' => $thumbnails,
        ]);
    }
}
