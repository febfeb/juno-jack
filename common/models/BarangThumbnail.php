<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "barang_thumbnail".
 *
 * @property integer $id
 * @property integer $barang_id
 * @property string $url
 *
 * @property Barang $barang
 */
class BarangThumbnail extends \yii\db\ActiveRecord
{
    public $gambar;
    public $warna;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_thumbnail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['barang_id', 'url'], 'required'],
            [['barang_id'], 'integer'],
            [['url'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'barang_id' => 'Barang ID',
            'url' => 'Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(Barang::className(), ['id' => 'barang_id']);
    }
}
