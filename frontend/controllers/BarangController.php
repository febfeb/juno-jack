<?php
namespace frontend\controllers;

use Yii;
use common\models\Barang;
use common\models\BarangThumbnail;
use common\models\Kategori;

class BarangController extends \yii\web\Controller
{
	public function actionKategori($id)
    {
        $barangs = [];

        // Hirarki sampai 4 level
        $kategori = Kategori::findOne($id);
        $core_kategori = Kategori::findOne($id);
        foreach (Barang::find()->where(['kategori_id' => $id])->all() as $barang) {
            $barangs[] = $barang;
        }
        foreach (Kategori::find()->where(['parent_id' => $kategori->id])->all() as $kategori) {
            foreach (Barang::find()->where(['kategori_id' => $kategori->id])->all() as $barang) {
                $barangs[] = $barang;
            }
            foreach (Kategori::find()->where(['parent_id' => $kategori->id])->all() as $kategori) {
                foreach (Barang::find()->where(['kategori_id' => $kategori->id])->all() as $barang) {
                    $barangs[] = $barang;
                }
                foreach (Kategori::find()->where(['parent_id' => $kategori->id])->all() as $kategori) {
                    foreach (Barang::find()->where(['kategori_id' => $kategori->id])->all() as $barang) {
                        $barangs[] = $barang;
                    }
                }
            }
        }
        
        $sub_kategori = Kategori::find()->where(['parent_id' => $id])->all();

    	//$barangs = Barang::find()->where(['kategori_id' => $id])->all();
    	return $this->render('barang-kategori', [
            'kategori' => $core_kategori,
            'sub_kategori' => $sub_kategori,
    		'barangs' => $barangs
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
