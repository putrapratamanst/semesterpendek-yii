<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



/* @var $this yii\web\View */
/* @var $model app\models\Barang */

//$this->title = $model->nama_mahasiswa;
$this->params['breadcrumbs'][] = ['label' => 'Mahasiswa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="mahasiswa-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p><center><b>Data Mahasiswa</b></center></p>

<p></p>
<p></p>
   
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          'user_id',
            'nama_mahasiswa',
            'kelas',
            'tanggal_lahir',
            'tahun_angkatan',
        ],
    ]) ?>

</div>
