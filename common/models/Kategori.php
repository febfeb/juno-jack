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

    public function getChilds()
    {
        return $this->hasMany(Kategori::className(), ['parent_id' => 'id']);
    }
    
    public function getParent() {
        return $this->hasOne(Kategori::className(), ['id' => 'parent_id']);
    }

    public function getParentString() {
        return ($this->parent_id==0?'INDUK':$this->parent->nama);
    }
    
    public function getParentList() {
        $droptions = Kategori::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id', 'nama');
    } 
    
    /* Static Functions */
    
    /**
     * Mencari anak kategori dari sebuah ID
     * @param type $induk_id
     * @return type
     */
    public static function getKategoriChild($induk_id = 0){
        $out = [];
        $kat = Kategori::findOne($induk_id);
        if($kat){
            $pad = str_replace("@", "--", str_pad("", $kat->tingkat-1, "@", STR_PAD_LEFT));
            $out = [$induk_id => $pad. $kat->nama];
        }
        
        foreach (Kategori::find()->where(["parent_id"=>$induk_id])->all() as $kategori) {
            $hasil = Kategori::getKategoriChild($kategori->id);
            foreach ($hasil as $key => $val) {
                $out[$key] = $val;
            }
        }
        
        return $out;
    }

    public static function getAllChildrenFromID($id = 0){
        $array = [$id];
        $all = Kategori::find()->where(['parent_id' => $id])->all();
        foreach ($all as $kategori){
            foreach (Kategori::getAllChildrenFromID($kategori->id) as $m) {
                $array[] = $m;
            }
        }
        return $array;
    }

}
