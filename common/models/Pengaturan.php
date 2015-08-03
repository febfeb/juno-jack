<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pengaturan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $nilai
 */
class Pengaturan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengaturan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'nilai'], 'required'],
            [['nama'], 'string', 'max' => 50],
            [['nilai'], 'string', 'max' => 255]
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
            'nilai' => 'Nilai',
        ];
    }
    
    public static function getPengaturan($nama){
        return \yii\helpers\ArrayHelper::getValue(Pengaturan::find()->where(["nama"=>$nama])->one(), "nilai", "-");
    }
}
