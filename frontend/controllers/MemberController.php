<?php

namespace frontend\controllers;

use common\models\Barang;
use common\models\LoginForm;
use common\models\Pemesanan;
use common\models\PemesananDetail;
use Yii;
use yii\web\Controller;

class MemberController extends Controller {

    public function beforeAction($action) {
        parent::beforeAction($action);

        if ($action->id == "login") {
            return TRUE;
        } else {
            if (Yii::$app->user->isGuest) {
                return $this->redirect(["login"]);
            } else {
                return TRUE;
            }
        }
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(["checkout"]);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionCheckout() {
        return $this->render("checkout");
    }
    
    public function actionSimpanDataPengiriman() {
        $carts = Yii::$app->session["cart"];
        
        $total = 0;
        
        if(count($carts) != 0){
            foreach ($carts as $cart) {
                $barang = Barang::findOne($cart["barang_id"]);
                $subtotal = $barang->harga * $cart["jumlah"];
                $total += $subtotal;
            }
            
            $pemesanan = new Pemesanan();
            $pemesanan->nama_lengkap = $_POST["nama_lengkap"];
            $pemesanan->telepon = $_POST["telepon"];
            $pemesanan->alamat = $_POST["alamat"];
            $pemesanan->negara = $_POST["negara"];
            $pemesanan->kode_pos = $_POST["kode_pos"];
            $pemesanan->total = $total;
            $pemesanan->waktu = date("Y-m-d H:i:s");
            $pemesanan->user_id = Yii::$app->user->id;
            if($pemesanan->save()){
                foreach ($carts as $cart) {
                    $barang = Barang::findOne($cart["barang_id"]);
                    $subtotal = $barang->harga * $cart["jumlah"];
                    
                    $detail = new PemesananDetail();
                    $detail->pemesanan_id = $pemesanan->id;
                    $detail->barang_id = $cart["barang_id"];
                    $detail->jumlah = $cart["jumlah"];
                    $detail->harga_satuan = $barang->harga;
                    $detail->subtotal = $subtotal;
                    $detail->save();
                }
                
                Yii::$app->session["cart"] = [];
            }
        }
        
        return "";
    }
    
    public function actionSukses() {
        return $this->render("sukses");
    }

}
