<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "barang".
 *
 * @property integer $id
 * @property string $nama
 * @property string $kode
 * @property integer $warna
 * @property string $review
 * @property integer $kelompok
 * @property integer $harga_beli
 * @property integer $harga_normal
 * @property integer $harga_promo
 * @property integer $kategori_id
 * @property string $overview_1
 * @property string $overview_2
 *
 * @property Warna $warna0
 * @property BarangStok[] $barangStoks
 * @property BarangThumbnail[] $barangThumbnails
 * @property KeranjangDetail[] $keranjangDetails
 * @property Pembelian[] $pembelians
 * @property Penjualan[] $penjualans
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kode', 'warna', 'kelompok', 'harga_beli', 'harga_normal', 'harga_promo', 'kategori_id', 'overview_2'], 'required'],
            [['warna', 'kelompok', 'harga_beli', 'harga_normal', 'harga_promo', 'kategori_id'], 'integer'],
            [['review'], 'number'],
            [['overview_1', 'overview_2'], 'string'],
            [['nama'], 'string', 'max' => 100],
            [['kode'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'kode' => 'Kode',
            'warna' => 'Warna',
            'review' => 'Review',
            'kelompok' => 'Kelompok',
            'harga_beli' => 'Harga Beli',
            'harga_normal' => 'Harga Normal',
            'harga_promo' => 'Harga Promo',
            'kategori_id' => 'Kategori ID',
            'overview_1' => 'Overview 1',
            'overview_2' => 'Overview 2',

            'barangThumbnailsCount' => 'Thumbnails',
        ];
    }


    public function getKategori()
    {
        return $this->hasOne(Kategori::className(), ['id' => 'kategori_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangWarna()
    {
        return $this->hasOne(Warna::className(), ['id' => 'warna']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangStoks()
    {
        return $this->hasMany(BarangStok::className(), ['barang_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangThumbnails()
    {
        return $this->hasMany(BarangThumbnail::className(), ['barang_id' => 'id']);
    }

    public function getBarangThumbnailsCount()
    {
        return count($this->barangThumbnails);
    }

    public function getBarangThumbnailsLink()
    {
        return count($this->barangThumbnails) . ' ' . Html::a('<span class="glyphicon glyphicon-picture"></span>', ['thumbnails/index', 'id' => $this->id]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeranjangDetails()
    {
        return $this->hasMany(KeranjangDetail::className(), ['barang_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['barang_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualans()
    {
        return $this->hasMany(Penjualan::className(), ['barang_id' => 'id']);
    }
}
