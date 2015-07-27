<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "barang_stok".
 *
 * @property integer $id
 * @property integer $barang_id
 * @property integer $toko_id
 * @property integer $jumlah
 *
 * @property Barang $barang
 * @property Toko $toko
 */
class BarangStok extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_stok';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['barang_id', 'toko_id'], 'required'],
            [['barang_id', 'toko_id', 'jumlah'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'barang_id' => 'Barang ID',
            'toko_id' => 'Toko ID',
            'jumlah' => 'Jumlah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'barang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToko()
    {
        return $this->hasOne(Toko::className(), ['id' => 'toko_id']);
    }
}
