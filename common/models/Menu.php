<?php

namespace common\models;

use Yii;
use common\models\Halaman;
use common\models\LetakMenu;
use yii\helpers\Html;

/**
 * This is the model class for table "url".
 *
 * @property integer $id
 * @property string $url
 * @property string $jenis
 * @property integer $data_id
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['letak_menu_id', 'halaman_id'], 'required'],
            [['letak_menu_id', 'halaman_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'letak_menu_id' => 'Letak Menu',
            'halaman_id' => 'Halaman',
            'urutan' => 'Urutan',
        ];
    }

    public function getLetakMenu() {
        return $this->hasOne(LetakMenu::className(), ['id' => 'letak_menu_id']);
    }

    public function getHalaman() {
        return $this->hasOne(Halaman::className(), ['id' => 'halaman_id']);
    }

    public function getUbahUrutan() {
        return Html::a('<i class="fa fa-upload"></i>', ['ubah-urutan', 'lmid' => $this->letakMenu->id, 'urutan' => $this->urutan, 'action' => 'up'], ['title' => 'Pindah ke atas'])
        .' '.
        Html::a('<i class="fa fa-download"></i>', ['ubah-urutan', 'lmid' => $this->letakMenu->id, 'urutan' => $this->urutan, 'action' => 'down'], ['title' => 'Pindah ke bawah']);
    }

}