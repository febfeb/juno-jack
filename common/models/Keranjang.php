<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "keranjang".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $waktu
 * @property integer $total_biaya
 *
 * @property User $user
 * @property KeranjangDetail[] $keranjangDetails
 */
class Keranjang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keranjang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'waktu', 'total_biaya'], 'required'],
            [['user_id', 'total_biaya'], 'integer'],
            [['waktu'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'waktu' => 'Waktu',
            'total_biaya' => 'Total Biaya',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeranjangDetails()
    {
        return $this->hasMany(KeranjangDetail::className(), ['keranjang_id' => 'id']);
    }
}
