<?php
use yii\helpers\Html;

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Toko', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->judul, 'url' => ['barang/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-6">
        <div class="main-box">
            <header class="main-box-header clearfix">
                <?= Html::a('<span class="glyphicon glyphicon-menu-left"></span> Kembali', ['view', 'id' => $model->id], ['class' => 'btn btn-warning']) ?><hr>
            </header>
            <div class="main-box-body clearfix">
                <?=
                $this->render('_form', [
                    'model' => $model,
                ])
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <?= $this->render('panduan') ?>
    </div>
</div>

<script src="../tinymce/tinymce.min.js"></script>

<script type="text/javascript">
    tinymce.init({
        selector: 'textarea.tinymce',
        plugins: "fullscreen link jbimages",
        toolbar: "bold underline italic | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect textcolor | bullist numlist | preview fullscreen link"
    });
</script>
