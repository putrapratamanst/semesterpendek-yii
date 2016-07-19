<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use backend\models\Matakuliah;


/* @var $this yii\web\View */
/* @var $model common\models\Dhs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dhs-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'semester')->textInput() ?>


    <div class="row">
      <div class="panel panel-default">
          <div class="panel-heading"><h4><i class="glyphicon glyphicon-user"></i> DHS</h4></div>
          <div class="panel-body">
               <?php DynamicFormWidget::begin([
                  'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                  'widgetBody' => '.container-items', // required: css class selector
                  'widgetItem' => '.item', // required: css class
                  'limit' => 10, // the maximum times, an element can be cloned (default 999)
                  'min' => 1, // 0 or 1 (default 1)
                  'insertButton' => '.add-item', // css class
                  'deleteButton' => '.remove-item', // css class
                  'model' => $modelsMatakuliah [0],
                  'formId' => 'dynamic-form',
                  'formFields' => [
                      'nama_matakuliah',
                      'nilai_matakuliah',
                      'sks_matakuliah'


                  ],
              ]); ?>

              <div class="container-items"><!-- widgetContainer -->
              <?php foreach ($modelsMatakuliah as $i => $modelMatakuliah): ?>
                  <div class="item panel panel-default"><!-- widgetBody -->
                      <div class="panel-heading">
                          <h3 class="panel-title pull-left">Matakuliah</h3>
                          <div class="pull-right">
                              <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                              <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                      <div class="panel-body">
                          <?php
                              // necessary for update action.
                              if (! $modelMatakuliah->isNewRecord) {
                                  echo Html::activeHiddenInput($modelMatakuliah, "[{$i}]id");
                              }
                          ?>
                          <div class="row">
                              <div class="col-sm-6">
                                  <?= $form->field($modelMatakuliah, "[{$i}]nama_matakuliah")->textInput(['maxlength' => true]) ?>
                              </div>
                              <div class="col-sm-6">
                                  <?= $form->field($modelMatakuliah, "[{$i}]nilai_matakuliah")->textInput(['maxlength' => true]) ?>
                              </div>
                              <div class="col-sm-6">
                                  <?= $form->field($modelMatakuliah, "[{$i}]sks_matakuliah")->textInput(['maxlength' => true]) ?>
                              </div>

                        </div>
                      </div>
                  </div>
              <?php endforeach; ?>
              </div>
              <?php DynamicFormWidget::end(); ?>
          </div>
        </div>
      </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
