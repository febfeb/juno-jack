<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pemesanan_status".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Pemesanan[] $pemesanans
 */
class PemesananStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemesanan_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 50]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPemesanans()
    {
        return $this->hasMany(Pemesanan::className(), ['pemesanan_status_id' => 'id']);
    }
}
