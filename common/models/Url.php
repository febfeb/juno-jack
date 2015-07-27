<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property integer $id
 * @property string $url
 * @property string $jenis
 * @property integer $data_id
 */
class Url extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'data_id'], 'required'],
            [['data_id'], 'integer'],
            [['url'], 'string', 'max' => 100],
            [['jenis'], 'string', 'max' => 1],
            [['url'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'jenis' => 'Jenis',
            'data_id' => 'Data ID',
        ];
    }
}
