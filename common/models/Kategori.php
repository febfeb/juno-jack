<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

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
            [['nama'], 'required'],
            [['id', 'jumlah_barang', 'tingkat'], 'integer'],
            [['parent_id'], 'default', 'value' => '0'],
            [['nama'], 'string', 'max' => 100],
            [['nama'], 'unique', 'message' => 'Nama kategori harus unik'],
            [['gambar'], 'string']
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

            'parent_id' => 'Kategori Induk',

        ];
    }
    
    public function getParent() {
        return $this->hasOne(Kategori::className(), ['id' => 'parent_id']);
    }

    public function getParentString() {
        return ($this->parent_id==0?'INDUK':$this->parent->nama);
    }

    public function getKategoriList()
    {
        $droptions = Kategori::find()->where(['not in', 'parent_id', '0'])->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'nama');
    }  

    public function getParentList()
    {
        $droptions = Kategori::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'nama');
    } 

}
