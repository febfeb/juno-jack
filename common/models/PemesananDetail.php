<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pemesanan_detail".
 *
 * @property integer $id
 * @property integer $pemesanan_id
 * @property integer $barang_id
 * @property integer $jumlah
 * @property integer $harga_satuan
 * @property integer $subtotal
 *
 * @property Pemesanan $pemesanan
 * @property Barang $barang
 */
class PemesananDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemesanan_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pemesanan_id', 'barang_id'], 'required'],
            [['pemesanan_id', 'barang_id', 'jumlah', 'harga_satuan', 'subtotal'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pemesanan_id' => 'Pemesanan ID',
            'barang_id' => 'Barang ID',
            'jumlah' => 'Jumlah',
            'harga_satuan' => 'Harga Satuan',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanan()
    {
        return $this->hasOne(Pemesanan::className(), ['id' => 'pemesanan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'barang_id']);
    }
}
