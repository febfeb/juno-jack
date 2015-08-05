<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "halaman".
 *
 * @property integer $id
 * @property string $nama
 * @property string $rgb
 *
 * @property Barang[] $barangs
 */
class Halaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'halaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'waktu'], 'required'],
            [['judul'], 'string', 'max' => 255],
            [['konten'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'waktu' => 'Waktu',
            'konten' => 'Konten',
        ];
    }
}
