<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Matakuliah */

$this->title = 'Matakuliah';


?>
<div class="matakuliah-view">

  <h1><?= Html::encode($this->title) ?></h1>


  <?= GridView::widget([
  'dataProvider' => $dataProvider,
  'filterModel' =>$searchModel,
    'columns' =>[
        ['class' =>'yii\grid\SerialColumn'],



          'id',
          'nama_matakuliah',
          'nilai_matakuliah',
          'id_dhs',
          'sks_matakuliah',

      ],
  ]) ?>

</div>
