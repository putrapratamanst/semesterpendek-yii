<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Semesterpendek */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Semesterpendeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semesterpendek-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
        //    'id_matakuliah',
        ],
    ]) ?>

</div>
