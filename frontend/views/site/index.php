<?php

/* @var $this yii\web\View    <center>    <?= Html::img( $url, $options = [
        'title' => 'Test',
          'alt' => 'Funky Looking Image',
        ]) ?> </center>*/
use yii\helpers\Html;



$this->title = '.:D4 TEKNIK INFORMATIKA:.';
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>SISTEM INFORMASI SEMESTER PENDEK D4 TEKNIK INFORMATIKA</h2>
          <center><img src="<?= yii\helpers\Url::to('@web/images/test.png') ?>" /></center>
        </div>
        <div class="body-content">
<center> <?= Html::a('Profil Mahasiswa', ['/mahasiswa/index'], ['class'=>'btn btn-primary'])   ?>
   <?= Html::a('Daftar Semester Pendek', ['/semesterpendek/index'], ['class'=>'btn btn-primary'])?>
     <?= Html::a('Daftar Hasil Siswa', ['/dhs/index'], ['class'=>'btn btn-primary']) ?> </center>

</div>
</div>
