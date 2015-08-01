<?php

namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\User;
use backend\models\Dosen;
use backend\models\Kegiatan;
use backend\models\JenisKegiatan;
use backend\models\Sertifikasi;
use backend\models\JenisSertifikasi;
	
class LaporanController extends \yii\web\Controller
{

	/* ===========================================================================
	   LAPORAN DATA
	   =========================================================================*/

    public function actionDataDosen()
    {
        $query = Dosen::find();
        $dataProvider = new ActiveDataProvider([
        	'query' => $query,
        ]);

        return $this->render('data-dosen', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPrintDataDosen() {
        $query = Dosen::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $content = $this->renderPartial('print-data-dosen', ['dataProvider' => $dataProvider]);
        $pdf = Yii::$app->pdf;
        $mpdf = $pdf->api;
        $mpdf->format = 'A4';
        $mpdf->SetHeader('Sertifikasi Dosen || Dicetak tanggal ' . date("d M Y"));
        $mpdf->WriteHtml($content);
        return $mpdf->Output('laporan_data_dosen.pdf', 'I');
    }

    public function actionKegiatan()
    {
        $query = Kegiatan::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('laporan-kegiatan', [
            'dataProvider' => $dataProvider,
            'jenis' => new JenisKegiatan(),
        ]);
    }

    public function actionPrintKegiatanDosen() {
        $title = 'Laporan Semua Kegiatan';
        if (Yii::$app->request->get('jenis_kegiatan_id') == null) {
            $query = Kegiatan::find();
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
        } else {
            $query = Kegiatan::find()->where(['jenis_kegiatan_id' => Yii::$app->request->get('jenis_kegiatan_id')]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            $title = 'Laporan Kegiatan Jenis: '.JenisKegiatan::findOne(Yii::$app->request->get('jenis_kegiatan_id'))->nama;
        }

        $content = $this->renderPartial('print-laporan-kegiatan', ['dataProvider' => $dataProvider, 'title' => $title]);
        $pdf = Yii::$app->pdf;
        $mpdf = $pdf->api;
        $mpdf->format = 'A4';
        $mpdf->SetHeader('Sertifikasi Kegiatan || Dicetak tanggal ' . date("d M Y"));
        $mpdf->WriteHtml($content);
        return $mpdf->Output('laporan_kegiatan_dosen.pdf', 'I');
    }


    public function actionSertifikasi()
    {
        $query = Sertifikasi::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('laporan-sertifikasi', [
            'dataProvider' => $dataProvider,
            'jenis' => new JenisSertifikasi(),
        ]);
    }

    public function actionPrintSertifikasiDosen() {
        $title = 'Laporan Semua Sertifikasi';
        if (Yii::$app->request->get('jenis_sertifikasi_id') == null) {
            $query = Sertifikasi::find();
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
        } else {
            $query = Sertifikasi::find()->where(['jenis_sertifikasi_id' => Yii::$app->request->get('jenis_sertifikasi_id')]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
            $title = 'Laporan Sertifikasi Jenis: '.JenisSertifikasi::findOne(Yii::$app->request->get('jenis_sertifikasi_id'))->nama;
        }

        $content = $this->renderPartial('print-laporan-sertifikasi', ['dataProvider' => $dataProvider, 'title' => $title]);
        $pdf = Yii::$app->pdf;
        $mpdf = $pdf->api;
        $mpdf->format = 'A4';
        $mpdf->SetHeader('Sertifikasi Dosen || Dicetak tanggal ' . date("d M Y"));
        $mpdf->WriteHtml($content);
        return $mpdf->Output('laporan_sertifikasi_dosen.pdf', 'I');
    }

    /* ===========================================================================
       LAPORAN GRAFIK
       =========================================================================*/

    public function actionGrafikKegiatanByJenis()
    {
        return $this->render('grafik-kegiatan-by-jenis', [
            'jenisKegiatan' => JenisKegiatan::find()->all(),
        ]);
    }

    public function actionPrintGrafikKegiatanByJenis() {
        $title = 'Grafik Kegiatan Berdasarkan Jenisnya';

        $content = $this->renderPartial('print-grafik-kegiatan-by-jenis', ['jenisKegiatan' => JenisKegiatan::find()->all(), 'title' => $title]);
        $pdf = Yii::$app->pdf;
        $mpdf = $pdf->api;
        $mpdf->format = 'A4';
        $mpdf->SetHeader('Sertifikasi Dosen || Dicetak tanggal ' . date("d M Y"));
        $mpdf->WriteHtml($content);
        return $mpdf->Output('laporan_grafik_kegiatan_by_jenis.pdf', 'I');
    }

    public function actionGrafikSertifikasiByJenis()
    {
        return $this->render('grafik-sertifikasi-by-jenis', [
            'jenisSertifikasi' => JenisSertifikasi::find()->all(),
        ]);
    }

    public function actionGrafikDosenByKegiatan()
    {
        return $this->render('grafik-dosen-by-kegiatan', [
            'dosen' => Dosen::find()->all(),
            'kegiatan' => new Kegiatan(),
        ]);
    }

    public function actionGrafikDosenBySertifikasi()
    {
        return $this->render('grafik-dosen-by-sertifikasi', [
            'dosen' => Dosen::find()->all(),
            'sertifikasi' => new Sertifikasi(),
        ]);
    }
}
