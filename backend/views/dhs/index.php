<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use backend\models\MatakuliahSearch;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DhsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dhs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dhs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dhs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    'export' =>false,
    'pjax'=>true, 
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function ($model ,$key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                
                'detail' => function ($model,$key,$index,$column){
                    $searchModel = New MatakuliahSearch();
                    $searchModel->id_dhs = $model->id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    return Yii::$app->controller->renderPartial('_matakuliah', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
               
                        ],
                 'user_id',
            'semester',

                ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
