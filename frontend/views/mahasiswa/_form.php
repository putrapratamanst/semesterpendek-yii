<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Mahasiswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mahasiswa-form">

    <?php $form = ActiveForm::begin(); ?>


  <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_mahasiswa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kelas')->dropDownList(['D4 TI 1A' => 'D4 TI 1A', 'D4 TI 1B' => 'D4 TI 1B', 'D4 TI 1C' => 'D4 TI 1C', 'D4 TI 1D' => 'D4 TI 1D', 'D4 TI 2A' => 'D4 TI 2A'
  , 'D4 TI 2B' => 'D4 TI 2B', 'D4 TI 2C' => 'D4 TI 2C', 'D4 TI 2D' => 'D4 TI 2D', 'D4 TI 3A' => 'D4 TI 3A','D4 TI 3B' => 'D4 TI 3B','D4 TI 4A' => 'D4 TI 4A','D4 TI 4B' => 'D4 TI 4B']); ?>

      <?= $form->field($model, 'tanggal_lahir')->widget(
       DatePicker::className(),[
           'inline' => false,
          //'template' => '<div class="well well-sm" style="background-color:#fff;width:250px">{input}</div>',
           'clientOptions' => [
               'autoclose' => true,
               'format' => 'yyyy-m-d'
           ]
       ]
   ) ?>

    <?= $form->field($model, 'tahun_angkatan')->dropDownList(['2012' => '2012','2013' => '2013','2014' => '2014','2015' => '2015',]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
