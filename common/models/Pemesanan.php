<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pemesanan".
 *
 * @property integer $id
 * @property string $waktu
 * @property integer $user_id
 * @property string $nama_lengkap
 * @property string $telepon
 * @property string $alamat
 * @property string $negara
 * @property string $kode_pos
 * @property integer $total
 * @property integer $pemesanan_status_id
 *
 * @property PemesananStatus $pemesananStatus
 * @property User $user
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemesanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['waktu', 'user_id', 'nama_lengkap', 'alamat', 'negara'], 'required'],
            [['waktu'], 'safe'],
            [['user_id', 'total', 'pemesanan_status_id'], 'integer'],
            [['alamat'], 'string'],
            [['nama_lengkap'], 'string', 'max' => 100],
            [['telepon'], 'string', 'max' => 20],
            [['negara'], 'string', 'max' => 50],
            [['kode_pos'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'waktu' => 'Waktu',
            'user_id' => 'User ID',
            'nama_lengkap' => 'Nama Lengkap',
            'telepon' => 'Telepon',
            'alamat' => 'Alamat',
            'negara' => 'Negara',
            'kode_pos' => 'Kode Pos',
            'total' => 'Total',
            'pemesanan_status_id' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesananStatus()
    {
        return $this->hasOne(PemesananStatus::className(), ['id' => 'pemesanan_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
