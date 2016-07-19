<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Semesterpendek */

$this->title = 'Update Semesterpendek: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Semesterpendeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="semesterpendek-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
