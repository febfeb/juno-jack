<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "merk".
 *
 * @property integer $id
 * @property string $nama
 * @property string $gambar
 */
class Merk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'merk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'gambar'], 'required'],
            [['nama', 'gambar'], 'string', 'max' => 50],
            [['nama'], 'unique'],
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
            'gambar' => 'Gambar',
        ];
    }
}
