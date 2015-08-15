<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use common\models\Kategori;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kategori', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6"><?= Html::a('<span class="glyphicon glyphicon-menu-left"></span> Kembali', ['index'], ['class' => 'btn btn-warning']) ?><hr></div>
            <div class="col-md-6" style="text-align: right;"><br>
                <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <b><font size="3">Pisisi Hirarki</font></b><br><br>
                <?php
                $nested_kategori = [];
                $hirarkies = [];
                $kategori = Kategori::findOne($model->id);
                while (isset($kategori->parent)) {
                    $kategori = $kategori->parent;
                    $nested_kategori[] = ['id' => $kategori->id, 'nama' => $kategori->nama];
                }
                $index = count($nested_kategori);
                while ($index) $hirarkies[] = $nested_kategori[--$index];
                foreach ($hirarkies as $hirarki) {
                    echo Html::a('<span class="glyphicon glyphicon-menu-right"></span> '.$hirarki['nama'], ['view', 'id' => $hirarki['id']], ['class' => 'btn btn-xs btn-info']).' ';
                }
                ?>
                <div class="btn btn-default btn-xs"><span class="glyphicon glyphicon-menu-right"></span> <?= $model->nama ?></div>

                <hr>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'nama',
                        ['attribute' => 'parentString', 'label' => 'Parent'],
                        'tingkat',
                        'jumlah_barang',
                        
                        
                    ],
                ]) ?>

                <hr>
                <b><font size="3">Anak Kategori dari <?= $model->nama ?></font></b><br><br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Tingkat</th>
                            <th>Jumlah Barang</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $childs = Kategori::find()->where(['parent_id' => $model->id])->all();
                        $i=1;
                        foreach ($childs as $child) {
                            echo '
                            <tr>
                                <td>'.$i++.'</td>
                                <td>'.$child->nama.'</td>
                                <td>'.$child->tingkat.'</td>
                                <td>'.$child->jumlah_barang.'</td>
                                <td>'.Html::a('<span class="glyphicon glyphicon-eye-open"></span> ', ['view', 'id' => $child->id], ['class' => 'btn btn-xs btn-info']).'</td>
                            </tr>
                            ';                            
                        }
                        ?>
                    </tbody>
                </table>                
            </div>
            <div class="col-md-3">
                <?php
                if ($model->gambar == '') {
                    echo '<div class="alert alert-danger">Tidak ada gambar</div>';
                } else {
                    echo '
                    <div class="thumbnail">
                        '. Html::img(Yii::getAlias("@kategori_url/").$model->gambar).'
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
    </div>
</div>