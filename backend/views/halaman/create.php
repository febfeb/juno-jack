<?php
use yii\helpers\Html;

$this->title = 'Tambah Halaman';
$this->params['breadcrumbs'][] = ['label' => 'Halaman', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="tinymce/tinymce.min.js"></script>
<br>
<div class="panel panel-default">
    <div class="panel-body">
	    <h2><?= Html::encode($this->title) ?></h2>
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</div>
</div>

<script type="text/javascript">
	tinymce.init({
		selector:'textarea.tinymce',
		plugins: "fullscreen link jbimages",
	    toolbar: "bold underline italic | alignleft aligncenter alignright alignjustify | formatselect fontselect fontsizeselect textcolor | bullist numlist | preview fullscreen link"
    });
</script>
