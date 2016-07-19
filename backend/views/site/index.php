<?php

use yii\helpers\Html;
use common\models\ValueHelpers;
/* @var $this yii\web\View */

$this->title = '.:D4 TEKNIK INFORMATIKA:.';
$is_admin = ValueHelpers::getRoleValue('Admin');
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang di Admin!</h1>

        <p class="lead">Halaman ini dapat memberikan kemudahan bagi Admin untuk mengelola Web!.</p>

        </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>User</h2>

                <p>
                     Disini Admin dapat melakukan manajemen bagi user.
                  </p>
                  <p>
                    <?php
if (!Yii::$app->user->isGuest
&& Yii::$app->user->identity->role_id >= $is_admin) {
echo Html::a('Manage Users', ['user/index'],
['class' => 'btn btn-default']);
}
?>
</p>

          </div>
            <div class="col-lg-4">
                <h2>Roles</h2>

                <p>
                  Disini Admin dapat melakukan manajemen Role.
                </p>
                <p>

                <?php
if (!Yii::$app->user->isGuest
&& Yii::$app->user->identity->role_id >= $is_admin) {
echo Html::a('Kelola Roles', ['role/index'],
['class' => 'btn btn-default']);
}
?>
</p>

            </div>
            <div class="col-lg-4">
                <h2>Status</h2>

                <p>Disini Admin dapat melakukan manajemen Status.</p>
<p>

                <?php
                if (!Yii::$app->user->isGuest
                && Yii::$app->user->identity->role_id >= $is_admin) {
                echo Html::a('Kelola Status', ['status/index'],
                ['class' => 'btn btn-default']);
                }
                ?>
                </p>
                <div class="body-content">


        </div>
            </div>
        </div>




        <div class="col-lg-4">
            <h2>Mahasiswa</h2>

            <p>
              Disini Admin dapat melakukan manajemen mahasiswa.
            </p>
            <p>

            <?php
        if (!Yii::$app->user->isGuest
        && Yii::$app->user->identity->role_id >= $is_admin) {
        echo Html::a('Kelola Mahasiswa', ['mahasiswa/index'],
        ['class' => 'btn btn-default']);
        }
        ?>
        </p>

        </div>

        <div class="col-lg-4">
            <h2>Matakuliah</h2>

            <p>
              Disini Admin dapat melakukan manajemen matakuliah.
            </p>
            <p>

            <?php
        if (!Yii::$app->user->isGuest
        && Yii::$app->user->identity->role_id >= $is_admin) {
        echo Html::a('Kelola Matakuliah', ['matakuliah/index'],
        ['class' => 'btn btn-default']);
        }
        ?>
        </p>

        </div>
        <div class="col-lg-4">
            <h2>Dhs</h2>

            <p>
              Disini Admin dapat melakukan manajemen DHS.
            </p>
            <p>

            <?php
        if (!Yii::$app->user->isGuest
        && Yii::$app->user->identity->role_id >= $is_admin) {
        echo Html::a('Kelola Dhs', ['dhs/index'],
        ['class' => 'btn btn-default']);
        }
        ?>
        </p>

        </div>


        <div class="col-lg-4">
            <h2>Approval</h2>

            <p>
              Disini Admin dapat melakukan manajemen Approval.
            </p>
            <p>

            <?php
        if (!Yii::$app->user->isGuest
        && Yii::$app->user->identity->role_id >= $is_admin) {
        echo Html::a('Kelola Approval', ['approval/index'],
        ['class' => 'btn btn-default']);
        }
        ?>
        </p>

        </div>

        <div class="col-lg-4">
            <h2>Semester Pendek</h2>

            <p>
              Disini Admin dapat melakukan manajemen Semester Pendek.
            </p>
            <p>

            <?php
        if (!Yii::$app->user->isGuest
        && Yii::$app->user->identity->role_id >= $is_admin) {
        echo Html::a('Kelola Semester Pendek', ['semesterpendek/index'],
        ['class' => 'btn btn-default']);
        }
        ?>
        </p>

        </div>
    </div>
</div>
