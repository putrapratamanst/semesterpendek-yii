<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Semesterpendek */

$this->title = 'Create Semesterpendek';
$this->params['breadcrumbs'][] = ['label' => 'Semesterpendeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semesterpendek-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsMatakuliah' => $modelsMatakuliah,
    ]) ?>

</div>
