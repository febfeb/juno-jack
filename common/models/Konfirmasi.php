<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "konfirmasi".
 *
 * @property integer $id
 * @property string $no_order
 * @property string $bank_pengirim
 * @property string $bank_tujuan
 * @property string $metode_transfer
 * @property string $nama_pengirim
 * @property string $no_rekening_pengirim
 * @property string $tanggal_transfer
 * @property integer $nominal_transfer
 * @property string $catatan
 */
class Konfirmasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'konfirmasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_order', 'bank_pengirim', 'bank_tujuan', 'metode_transfer', 'nama_pengirim', 'no_rekening_pengirim', 'tanggal_transfer', 'nominal_transfer', 'catatan'], 'required'],
            [['tanggal_transfer'], 'safe'],
            [['nominal_transfer'], 'integer'],
            [['catatan'], 'string'],
            [['no_order', 'bank_pengirim', 'bank_tujuan', 'metode_transfer'], 'string', 'max' => 20],
            [['nama_pengirim', 'no_rekening_pengirim'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_order' => 'No Order',
            'bank_pengirim' => 'Bank Pengirim',
            'bank_tujuan' => 'Bank Tujuan',
            'metode_transfer' => 'Metode Transfer',
            'nama_pengirim' => 'Nama Pengirim',
            'no_rekening_pengirim' => 'No Rekening Pengirim',
            'tanggal_transfer' => 'Tanggal Transfer',
            'nominal_transfer' => 'Nominal Transfer',
            'catatan' => 'Catatan',
        ];
    }
}
