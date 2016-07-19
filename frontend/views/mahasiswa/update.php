<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mahasiswa */

$this->title = 'Update Profil: ' . ' ' . $model->nama_mahasiswa;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_mahasiswa, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mahasiswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
