<?php
namespace frontend\controllers;

use backend\models\Pelanggan;
use backend\models\Pinjaman;
use backend\models\Simpanan;
use common\components\Tanggal;
use common\models\Konfirmasi;
use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\Pengunjung;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use Yii;
use yii\base\InvalidParamException;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

/**
 * Site controller
 */
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
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionTentang()
    {
        return $this->render('tentang');
    }
    
    public function actionTracking()
    {
        return $this->render('tracking');
    }

    public function actionSignup()
    {
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

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public static function visitorCounter()
    {
        //menyimpan informasi dari user
        $ip = $_SERVER['REMOTE_ADDR'];
        $query_string = $_SERVER['QUERY_STRING'];
        $http_user_agent = $_SERVER['HTTP_USER_AGENT'];
        if(isset($_SERVER['HTTP_REFERER']))
            $http_referer = $_SERVER['HTTP_REFERER'];
        else
            $http_referer = '';

        $is_bot = 0;
        $botList = ["Teoma", "alexa", "froogle", "Gigabot", "inktomi",
        "looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory",
        "Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot",
        "crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp",
        "msnbot", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz",
        "Baiduspider", "Feedfetcher-Google", "TechnoratiSnoop", "Rankivabot",
        "Mediapartners-Google", "Sogou web spider", "WebAlta Crawler","TweetmemeBot",
        "Butterfly","Twitturls","Me.dium","Twiceler"];
        foreach($botList as $bot)
        {
            if(strpos($_SERVER['HTTP_USER_AGENT'], $bot) !== 0){
                $is_bot = 1;
                break;
            }
        }

        $pengunjung = new Pengunjung;
        $pengunjung->tanggal = date('Y-m-d H:i:s');
        $pengunjung->nomor_ip = $ip;
        $pengunjung->query_string = $query_string;
        $pengunjung->http_referrer = $http_referer;
        $pengunjung->http_user_agent = $http_user_agent;
        $pengunjung->is_bot = $is_bot;
        $pengunjung->save();
    }

 
    /**
    * Halaman statis di frontend
    */

    public function actionCart()
    {
        return $this->render('cart');
    }

    public function actionAddToCart($barang_id, $jumlah)
    {
        $carts = Yii::$app->session["cart"];
        if($carts == NULL){
            $carts = [];
        }
        
        $ada = FALSE;
        
        foreach ($carts as $cart) {
            if($cart["barang_id"] == $barang_id){
                $cart["jumlah"] += $jumlah;
                $ada = TRUE;
            }
        }
        
        if(!$ada){
            $obj = [
                "barang_id" => $barang_id,
                "jumlah" => $jumlah
            ];
            $carts[] = $obj;
        }
        
        Yii::$app->session["cart"] = $carts;
    }
    
    public function actionRemoveFromCart($barang_id)
    {
        $carts = Yii::$app->session["cart"];
        if($carts == NULL){
            $carts = [];
        }
        
        $i = 0;
        foreach ($carts as $cart) {
            if($cart["barang_id"] == $barang_id){
                unset($carts[$i]);
            }
            $i++;
        }
        
        Yii::$app->session["cart"] = $carts;
    }

    public function actionKonfirmasi()
    {
        if(isset($_POST["_csrf"])){
            $konf = new Konfirmasi();
            $konf->no_order = $_POST["no_order"];
            $konf->bank_pengirim = $_POST["bank_pengirim"];
            $konf->bank_tujuan = $_POST["bank_tujuan"];
            $konf->metode_transfer = $_POST["metode_transfer"];
            $konf->nama_pengirim = $_POST["nama_pengirim"];
            $konf->no_rekening_pengirim = $_POST["no_rekening_pengirim"];
            $konf->tanggal_transfer = Tanggal::reverse($_POST["tanggal_transfer"]);
            $konf->nominal_transfer = $_POST["nominal_transfer"];
            $konf->catatan = $_POST["catatan"];
            if($konf->save()){
                Yii::$app->session->setFlash("success", "Konfirmasi Anda sudah kami terima, mohon tunggu untuk validasi data oleh tim kami. Terima Kasih");
            }else{
                Yii::$app->session->setFlash("danger", "Konfirmasi Anda tidak dapat kami proses.");
            }
        }
        
        return $this->render('konfirmasi');
    }

    public function actionProfilKomitmen()
    {
        return $this->render('profil-komitmen');
    }

    public function actionGaleri()
    {
        return $this->render('galeri');
    }

    public function actionKontak()
    {
        return $this->render('kontak');
    }

    public function actionProdukSimpanan()
    {
        $simpanan = Simpanan::find()->all();
        return $this->render('produk-simpanan', [
            'model' => $simpanan,
        ]);
    }

    public function actionProdukPinjaman()
    {
        $pinjaman = Pinjaman::find()->all();
        return $this->render('produk-pinjaman', [
            'model' => $pinjaman,
        ]);
    }

    public function actionBerita()
    {
        return $this->render('produk-pinjaman');
    }

    public function actionPelangganAnggota()
    {
        $anggota = Pelanggan::find()->where(['tipe_pelanggan_id' => '1'])->all();
        return $this->render('pelanggan-anggota', [
            'model' => $anggota,
        ]);
    }

    public function actionPrintPelangganAnggota() {
        $query = Pelanggan::find()->where(['tipe_pelanggan_id' => '1'])->orderBy('nama');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $content = $this->renderPartial('print-pelanggan-anggota', ['dataProvider' => $dataProvider]);
        $pdf = Yii::$app->pdf;
        $mpdf = $pdf->api;
        $mpdf->format = 'A4';
        $mpdf->SetHeader('Koperasi Ponorogo || Dicetak tanggal ' . date("d M Y"));
        $mpdf->WriteHtml($content);
        return $mpdf->Output('daftar_anggota_koperasi.pdf', 'I');
    }

    public function actionPelangganNasabah()
    {
        $nasabah = Pelanggan::find()->where(['tipe_pelanggan_id' => '2'])->all();
        return $this->render('pelanggan-nasabah', [
            'model' => $nasabah,
        ]);
    }

    public function actionPrintPelangganNasabah() {
        $query = Pelanggan::find()->where(['tipe_pelanggan_id' => '2'])->orderBy('nama');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $content = $this->renderPartial('print-pelanggan-nasabah', ['dataProvider' => $dataProvider]);
        $pdf = Yii::$app->pdf;
        $mpdf = $pdf->api;
        $mpdf->format = 'A4';
        $mpdf->SetHeader('Koperasi Ponorogo || Dicetak tanggal ' . date("d M Y"));
        $mpdf->WriteHtml($content);
        return $mpdf->Output('daftar_nasabah_koperasi.pdf', 'I');
    }

}
