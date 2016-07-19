<?php

namespace backend\controllers;

use Yii;
use backend\models\Approval;
use backend\models\ApprovalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermissionHelpers;
use common\models\RecordHelpers;

/**
 * ApprovalController implements the CRUD actions for Approval model.
 */
 class ApprovalController extends Controller
 {
     public function behaviors()
     {
         return [
             'verbs' => [
                 'class' => VerbFilter::className(),
                 'actions' => [
                     'delete' => ['post'],
                 ],
             ],
         ];
     }

     /**
      * Lists all Dhs models.
      * @return mixed
      */
     public function actionIndex()
     {
         $searchModel = new ApprovalSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

         return $this->render('index', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);
     }

     /**
      * Displays a single Dhs model.
      * @param integer $id
      * @return mixed
      */
     public function actionView($id)
     {
         return $this->render('view', [
             'model' => $this->findModel($id),
         ]);
     }

     /**
      * Creates a new Dhs model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
      public function actionCreate()
         {
             $model = new Approval();

             if ($model->load(Yii::$app->request->post())){
                $model->waktu_approval = date ('Y-m-d h-m-s');
                $model-> save();
                 return $this->redirect(['view', 'id' => $model->id]);
             } else {
                 return $this->render('create', [
                     'model' => $model,
                 ]);
             }
         }
     /**
      * Updates an existing Dhs model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      */
     public function actionUpdate($id)
     {
         $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['view', 'id' => $model->id]);
         } else {
             return $this->render('update', [
                 'model' => $model,
             ]);
         }
     }

     /**
      * Deletes an existing Dhs model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param integer $id
      * @return mixed
      */
     public function actionDelete($id)
     {
         $this->findModel($id)->delete();

         return $this->redirect(['index']);
     }

     /**
      * Finds the Dhs model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Dhs the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($id)
     {
         if (($model = Approval::findOne($id)) !== null) {
             return $model;
         } else {
             throw new NotFoundHttpException('The requested page does not exist.');
         }
     }
 }
