<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Barang;

$this->title = 'Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <?= Html::a('Tambah Barang', ['create'], ['class' => 'pull-right btn btn-success']) ?>
            </header>

            <div class="main-box-body clearfix">
                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Barang</th>
                            <th>Warna</th>
                            <th>Kategori</th>
                            <th>Harga Normal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($barangs as $barang) {
                            $br = Barang::find()->where(['kelompok' => $barang->kelompok])->one();
                            echo '
                            <tr>
                                <td>'.$br->kode.'</td>
                                <td>'.$br->nama.'</td>
                                <td>'.$br->warnaRgb.'</td>
                                <td>'.$br->kategori->nama.'</td>
                                <td>'.$br->harga_normal.'</td>
                                <td>
                                '.Html::a('<span class="glyphicon glyphicon-eye-open"></span> ', ['view', 'klp' => $barang->kelompok]).'
                                '.Html::a('<span class="glyphicon glyphicon-pencil"></span> ', ['view', 'id' => '4']).'
                                '.Html::a('<span class="glyphicon glyphicon-trash"></span> ', ['view', 'id' => '4'], ['data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]).'
                                </td>
                            </tr>
                            ';
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>