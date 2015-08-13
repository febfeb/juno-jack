<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\components\Slug;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

$this->title = 'Thumbnails';
$this->params['breadcrumbs'][] = ['label' => 'Barang', 'url' => ['barang/index']];
$this->params['breadcrumbs'][] = ['label' => $firstBarang->nama, 'url' => ['barang/view', 'klp' => $firstBarang->kelompok]];
$this->params['breadcrumbs'][] = $this->title;
?>
<br>
<div class="panel panel-default">
    <div class="panel-body">

        <ul class="nav nav-tabs">
            <?php
            $i = 1;
            foreach ($barangs as $barang) {
                if ($i==1) $class='class="active"'; else $class=''; $i++;
                echo '<li '.$class.'><a data-toggle="tab" href="#'.Slug::slugify($barang->nama.'-'.$barang->barangWarna->nama).'"><span class="label" style="background: #'.$barang->barangWarna->rgb.';">&nbsp;</span> '.$barang->barangWarna->nama.'</a></li>';
            }
            ?>
        </ul>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="tab-content">
                    <?php
                    $i=1;
                    foreach ($barangs as $barang) {
                        if ($i==1) $class='in active'; else $class=''; $i++; ?>

                        <div class="panel panel-default">
                                
                        </div>

                        <div id="<?= Slug::slugify($barang->nama.'-'.$barang->barangWarna->nama) ?>" class="tab-pane fade <?= $class ?>">
                            <p><?= $barang->barangWarna->nama ?></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]);
                                    echo $form->field($thumbnails, 'barang_id')->hiddenInput(['value' => $barang->id])->label(false);
                                    echo $form->field($thumbnails, 'gambar')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*']]);
                                    ActiveForm::end();
                                    ?>
                                </div>
                            </div>
                        </div>

                        <?php }//endif ?>
                </div>
            </div>
        </div>
    </div>
</div>

                            <!--
                            <div class="uploader"></div>
                            <= harrytang\fineuploader\Fineuploader::widget([
                                    'options' => [
                                        'request' => [
                                            'endpoint' => Yii::$app->urlManager->createUrl(['barang-thumbnails/uploading/']),
                                            'params' => [Yii::$app->request->csrfParam => Yii::$app->request->csrfToken]
                                        ],
                                        'validation' => [
                                            'allowedExtensions' => ['jpeg', 'jpg', 'png'],
                                        ],
                                        'classes' => [
                                            'success' => 'alert alert-success',
                                            'fail' => 'alert alert-error'
                                        ],
                                        //'multiple'=>false,
                                    ],
                                    //'events' => [
                                    //    'allComplete' => '$("#loading").modal("hide"); ',
                                    //]
                                ])
                            ?>
                            -->

<!--
<div class="panel panel-default">
    <div class="panel-body">
        <p><= Html::a('Tambah Thumbnail', ['create', 'id' => Yii::$app->request->get('id')], ['class' => 'pull-right btn btn-sm btn-success']) ?></p>
        <h3><= Html::encode($this->title) ?></h3>
        <hr>

        <div class="row">
            <php
            if (count($thumbnails) == 0) {
                echo '<div class="col-md-12"><div class="alert alert-danger" role="alert">Tidak ada gambar</div></div>';
            } else {
                foreach($thumbnails as $thumbnail){
            ?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <= Html::img('uploads/thumbnails/'.$thumbnail->url) ?>
                    <div class="caption">
                        <p>
                        <= Html::a('Hapus', ['barang-thumbnails/delete', 'id' => $thumbnail->id], ['class' => 'btn btn-danger btn-xs', 'data-method' => 'post', 'data-confirm' => 'Are you sure?']) ?>
                        </p>
                    </div>
                </div>
            </div>
            <php }} ?>

        </div>

    </div>
</div>

-->