<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SemesterpendekSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Semesterpendeks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semesterpendek-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Semesterpendek', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
           // 'id_matakuliah',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
