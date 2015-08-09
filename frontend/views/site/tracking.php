<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Vision Fokus » Tracking Barang';
?>
<div class="article-container style-1">
    <h1>Status Pesanan</h1>
    <p>Selamat Datang, berikut adalah status pesanan Anda </p>

    <table>
        <tbody>
            <tr>
                <td style="width: 200px">Tanggal Pembuatan :</td>
                <td>2 Agustus 2015, 18:00</td>
            </tr>
            <tr>
                <td>Metode Pembayaran :</td>
                <td>Cybersource</td>
            </tr>
        </tbody>
    </table>
</div>

<table class="compare-table">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Status Terakhir</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="2">Gelas Cantik</td>
            <td rowspan="2" style="width: 20px;">1</td>
            <td>
                <b>9 Agustus 2015, 09:00</b>
                <br>
                Pesanan sudah diterima Pelanggan, Semoga Anda puas dengan pelayanan kami dan kami tunggu pesanan selanjutnya.
            </td>
        </tr>
        <tr>
            <td>
                <b>7 Agustus 2015, 09:00</b>
                <br>
                Pesanan Anda telah dikirim melalui JNE, No Resi BKB3750. Input Nomor Tracking di JNE memakan waktu
                antara 1 s.d 3 hari kerja. Anda dapat melihat status pengiriman  di <a href="http://www.jne.co.id">www.jne.co.id</a> atau menghubungi 031-39200192
            </td>
        </tr>
    </tbody>
</table>

