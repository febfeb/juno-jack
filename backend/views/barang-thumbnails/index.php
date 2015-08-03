<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Thumbnails';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['barang/index']];
$this->params['breadcrumbs'][] = ['label' => $barang->nama, 'url' => ['barang/view', 'id' => $barang->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">
        <p><?= Html::a('Tambah Thumbnail', ['create', 'id' => Yii::$app->request->get('id')], ['class' => 'pull-right btn btn-sm btn-success']) ?></p>
        <h3><?= Html::encode($this->title) ?></h3>
        <hr>

        <div class="row">
            <?php
            if (count($thumbnails) == 0) {
                echo '<div class="col-md-12"><div class="alert alert-danger" role="alert">Tidak ada gambar</div></div>';
            } else {
                foreach($thumbnails as $thumbnail){
            ?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <?= Html::img('uploads/thumbnails/'.$thumbnail->url) ?>
                    <div class="caption">
                        <p>
                        <?= Html::a('Hapus', ['delete', 'id' => $thumbnail->id], ['class' => 'btn btn-danger btn-xs', 'data-method' => 'post', 'data-confirm' => 'Are you sure?']) ?>
                        <!--<a href="#" class="btn btn-danger btn-xs" role="button">Hapus</a>-->
                        </p>
                    </div>
                </div>
            </div>
            <?php }} ?>

        </div>

    </div>
</div>

