<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Status;

/* @var $this yii\web\View */
/* @var $model backend\models\Approval */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approval-form">

    <?php $form = ActiveForm::begin(); ?>

      <?= $form->field($model, 'user_id')->textInput() ?>

   <?php
    echo $form->field($model,'status_approval')->dropDownList(ArrayHelper::map(Status::find()->all(),'id','status_name' ),
    ['class' => 'form-control inline-block']);
    ?>

    
    <?= $form->field($model, 'id_semesterpendek')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
