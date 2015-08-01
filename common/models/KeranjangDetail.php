<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "keranjang_detail".
 *
 * @property integer $id
 * @property integer $keranjang_id
 * @property integer $barang_id
 * @property integer $jumlah
 *
 * @property Keranjang $keranjang
 * @property Barang $barang
 */
class KeranjangDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keranjang_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['keranjang_id', 'barang_id', 'jumlah'], 'required'],
            [['keranjang_id', 'barang_id', 'jumlah'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keranjang_id' => 'Keranjang ID',
            'barang_id' => 'Barang ID',
            'jumlah' => 'Jumlah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeranjang()
    {
        return $this->hasOne(Keranjang::className(), ['id' => 'keranjang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'barang_id']);
    }
}
