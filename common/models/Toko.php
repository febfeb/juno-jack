<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "toko".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $longitude
 * @property string $latitude
 * @property string $telepon
 * @property string $email
 * @property string $keterangan_buka
 *
 * @property BarangStok[] $barangStoks
 * @property Pembelian[] $pembelians
 */
class Toko extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'toko';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'longitude', 'latitude', 'telepon', 'email', 'keterangan_buka'], 'required'],
            [['alamat', 'keterangan_buka'], 'string'],
            [['nama', 'email'], 'string', 'max' => 50],
            [['longitude', 'latitude'], 'string', 'max' => 15],
            [['telepon'], 'string', 'max' => 20]
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
            'alamat' => 'Alamat',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'telepon' => 'Telepon',
            'email' => 'Email',
            'keterangan_buka' => 'Keterangan Buka',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangStoks()
    {
        return $this->hasMany(BarangStok::className(), ['toko_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembelians()
    {
        return $this->hasMany(Pembelian::className(), ['toko_id' => 'id']);
    }
}
