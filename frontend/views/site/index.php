<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Sistem Informasi Pengarsipan Data Kegiatan Akademik';
?>
<div class="site-index">

    <div class="jumbotrons">
        <h1>Selamat Datang!</h1>
        <p class="lead">Terima kasih telah mengunjungi Sistem Informasi Pengarsipan ini. Di bawah ini adalah beberapa tombol pintas untuk mengakses beberapa informasi penting.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-6">
                <h2>Data Kegiatan</h2>
                <p>Data Kegiatan adalah halaman yang menampilkan informasi daftar kegiatan yang dilakukan dosen yang ada di Politeknik Elektronika Negeri Surabaya.</p>
                <p><?= Html::a('Selengkapnya &raquo;', ['kegiatan/index'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-md-6">
                <h2>Data Sertifikasi</h2>
                <p>Data Sertifikasi adalah halaman yang menampilkan informasi daftar sertifikasi yang dilakukan dosen yang ada di Politeknik Elektronika Negeri Surabaya.</p>
                <p><?= Html::a('Selengkapnya &raquo;', ['sertifikasi/index'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>

    </div>
</div>
