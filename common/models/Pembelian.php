<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pembelian".
 *
 * @property integer $id
 * @property integer $toko_id
 * @property integer $barang_id
 * @property string $waktu
 * @property integer $jumlah
 * @property integer $harga
 * @property integer $total_harga
 *
 * @property Toko $toko
 * @property Barang $barang
 */
class Pembelian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembelian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['toko_id', 'barang_id', 'waktu', 'jumlah', 'harga', 'total_harga'], 'required'],
            [['toko_id', 'barang_id', 'jumlah', 'harga', 'total_harga'], 'integer'],
            [['waktu'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'toko_id' => 'Toko ID',
            'barang_id' => 'Barang ID',
            'waktu' => 'Waktu',
            'jumlah' => 'Jumlah',
            'harga' => 'Harga',
            'total_harga' => 'Total Harga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToko()
    {
        return $this->hasOne(Toko::className(), ['id' => 'toko_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'barang_id']);
    }
}
