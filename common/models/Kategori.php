<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kategori".
 *
 * @property integer $id
 * @property string $nama
 * @property string $gambar
 * @property integer $jumlah_barang
 * @property integer $parent_id
 * @property integer $tingkat
 */
class Kategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kategori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'gambar'], 'required'],
            [['jumlah_barang', 'parent_id', 'tingkat'], 'integer'],
            [['nama'], 'string', 'max' => 100],
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
            'nama' => 'Kategori',
            'gambar' => 'Gambar',
            'jumlah_barang' => 'Jumlah Barang',
            'parent_id' => 'Parent ID',
            'tingkat' => 'Tingkat',
        ];
    }
    
    public function getParent() {
        return $this->hasOne(Kategori::className(), ['id' => 'parent_id']);
    }

    public function getUrl() {
        return $this->hasOne(Url::className(), ['data_id' => 'id']);
    }

}
