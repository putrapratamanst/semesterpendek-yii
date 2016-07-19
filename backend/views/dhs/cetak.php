<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/* @var $this yii\web\View */
/* @var $model app\models\Barang */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dhs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="dhs-view">

    <h1><?= Html::encode($this->title) ?></h1>
    Daftar Hasil Siswa
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'id',
          'user_id',
          'semester',

          

        ],
    ]) ?>

</div>
