<?php

namespace common\components;

use Yii;
use yii\base\Component;
use yii\helpers\Html;

/**
 * Description of NavAlternative
 *
 * @author feb
 */
class Tombol extends Component{
    public static function updateDeleteBack($id){
        $str = "";
        
        $str .= Html::a('<i class="fa fa-pencil"></i> Update', ['update', 'id' => $id], ['class' => 'btn btn-primary']);
        $str .= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete', 'id' => $id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Anda yakin ingin menghapus data ini ?',
                        'method' => 'post',
                    ],
                ]);
        $str .= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-success']);
        return $str;
    }
    
    public static function deleteBack($id){
        $str = "";
        
        $str .= Html::a('<i class="fa fa-trash"></i> Hapus', ['delete', 'id' => $id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Anda yakin ingin menghapus data ini ?',
                        'method' => 'post',
                    ],
                ]);
        $str .= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-success']);
        return $str;
    }
    
    public static function back(){
        $str = "";
        $str .= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-success']);
        return $str;
    }
    
    public static function save($isNewRecord){
        $str = Html::submitButton($isNewRecord ? '<i class="fa fa-save"></i> Simpan' : '<i class="fa fa-save"></i> Simpan', ['class' => $isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
        $str .= " ".Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-warning']);
        return $str;
    }
}
