<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "LetakMenu".
 *
 * @property integer $id
 * @property string $nama
 * @property string $gambar
 * @property integer $jumlah_barang
 * @property integer $parent_id
 * @property integer $tingkat
 */
class LetakMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'letak_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'tingkat'], 'required'],
            [['id', 'jumlah_barang', 'parent_id', 'tingkat'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['nama'], 'unique', 'message' => 'Nama LetakMenu harus unik'],
            [['gambar'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Letak Menu',
            'gambar' => 'Gambar',
            'jumlah_barang' => 'Jumlah Barang',
            'parent_id' => 'Parent ID',
            'tingkat' => 'Tingkat',

        ];
    }

}
