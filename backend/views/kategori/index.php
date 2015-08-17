<?php

use common\components\Angka;
use common\models\Kategori;
use yii\helpers\Html;

$this->title = 'Kategori';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="main-box">
            <header class="main-box-header clearfix pull-right ">
                <?= Html::a('<span class="fa fa-refresh"></span> Refresh Jumlah', ['reload-semua-jumlah'], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Tambah Kategori', ['create'], ['class' => 'btn btn-success']) ?>
            </header>

            <div class="main-box-body clearfix">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Jumlah Barang</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        function displayChildren($parent_id) {
                            static $i = 1;
                            $nodes = Kategori::find()->where(['parent_id' => $parent_id])->all();
                            foreach ($nodes as $node) {
                                echo '
                                <tr>
                                    <td>' . $i++ . '</td>
                                    <td>' . str_repeat('===', $node->tingkat) . ' ' . ($parent_id == 0 ? '<b><font size="3">' . $node->nama . '</font></b>' : $node->nama) . '</td>
                                    <td style="text-align:right">' . Angka::toReadableAngka($node->jumlah_barang) . '</td>
                                    <td style="text-align:center">
                                    ' . Html::a('<span class="glyphicon glyphicon-eye-open"></span> ', ['view', 'id' => $node->id], ['class' => 'btn btn-xs btn-info']) . '
                                    ' . Html::a('<span class="glyphicon glyphicon-pencil"></span> ', ['update', 'id' => $node->id], ['class' => 'btn btn-xs btn-primary']) . '
                                    ' . Html::a('<span class="glyphicon glyphicon-trash"></span> ', ['delete', 'id' => $node->id], ['class' => 'btn btn-xs btn-danger', 'data' => ['confirm' => 'Are you sure you want to delete this item?', 'method' => 'post']]) . '
                                    </td>
                                </tr>';

                                // infinit loops
                                displayChildren($node->id);
                            }
                        }

                        displayChildren(0);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>