<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Matakuliah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matakuliah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_matakuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_matakuliah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_dhs')->textInput() ?>

    <?= $form->field($model, 'sks_matakuliah')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
