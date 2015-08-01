<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "penjualan".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $barang_id
 * @property string $waktu
 * @property integer $harga
 * @property integer $jumlah
 * @property integer $total_harga
 * @property integer $status
 * @property string $batas_garansi
 *
 * @property User $user
 * @property Barang $barang
 */
class Penjualan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penjualan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'barang_id', 'waktu', 'harga', 'total_harga', 'batas_garansi'], 'required'],
            [['user_id', 'barang_id', 'harga', 'jumlah', 'total_harga', 'status'], 'integer'],
            [['waktu', 'batas_garansi'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'barang_id' => 'Barang ID',
            'waktu' => 'Waktu',
            'harga' => 'Harga',
            'jumlah' => 'Jumlah',
            'total_harga' => 'Total Harga',
            'status' => 'Status',
            'batas_garansi' => 'Batas Garansi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'barang_id']);
    }
}
