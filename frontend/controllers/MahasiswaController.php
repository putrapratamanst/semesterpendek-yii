<?php

namespace frontend\controllers;

use Yii;
use common\models\Mahasiswa;
use backend\models\search\MahasiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermissionHelpers;
use common\models\RecordHelpers;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;

/**
 * MahasiswaController implements the CRUD actions for Mahasiswa model.
 */
class MahasiswaController extends Controller
{

  public function behaviors()
{
return [

'access' => [
'class' => \yii\filters\AccessControl::className(),
'only' => ['index', 'view','create', 'update', 'delete'],
'rules' => [
[
'actions' => ['index', 'view','create', 'update', 'delete'],
'allow' => true,
'roles' => ['@'],
],
],
],
'access2' => [
'class' => \yii\filters\AccessControl::className(),
'only' => ['index', 'view','create', 'update', 'delete'],
'rules' => [
[
'actions' => ['index', 'view','create', 'update', 'delete'],
'allow' => true,
'roles' => ['@'],
'matchCallback' => function ($rule, $action) {
return PermissionHelpers::requireRole('mahasiswa');
}
],
],
],
'verbs' => [
'class' => VerbFilter::className(),
'actions' => [
'delete' => ['post'],
],
],
];
}

    /**
     * Lists all Mahasiswa models.
     * @return mixed
     */
     public function actionIndex()
 {
 if ($already_exists = RecordHelpers::userHas('mahasiswa')) {
 return $this->render('view', [
 'model' => $this->findModel($already_exists),
 ]);
 } else {
 return $this->redirect(['create']);
 }
 }

    /**
     * Displays a single Mahasiswa model.
     * @param integer $id
     * @return mixed
     */
     public function actionView()
 {
 if ($already_exists = RecordHelpers::userHas('mahasiswa')) {
 return $this->render('view', [
 'model' => $this->findModel($already_exists),
 ]);
 } else {
 return $this->redirect(['create']);
 }
 }

    /**
     * Creates a new Mahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
     {
     $model = new Mahasiswa;
     $model->user_id = \Yii::$app->user->identity->id;
     if ($already_exists = RecordHelpers::userHas('mahasiswa')) {
     return $this->render('view', [
     'model' => $this->findModel($already_exists),
     ]);
     } elseif ($model->load(Yii::$app->request->post()) && $model->save()){
     return $this->redirect(['view']);
     } else {
     return $this->render('create', [
     'model' => $model,
     ]);
     }
     }

    /**Yii::$app->db->getLastInsertID()
     * Updates an existing Mahasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     public function actionUpdate()
 {
 if($model = Mahasiswa::find()->where(['user_id' =>
 Yii::$app->user->identity->id])->one()) {
 if ($model->load(Yii::$app->request->post()) && $model->save()) {
 return $this->redirect(['view']);
} else {
return $this->render('update', [
'model' => $model,
]);
}
} else {
throw new NotFoundHttpException('No Such Mahasiswa.');
}
}



    /**
     * Deletes an existing Mahasiswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
     public function actionDelete()
   {
   $model = Mahasiswa::find()->where(['user_id' => Yii::$app->user->id])->one();
   $this->findModel($model->id)->delete();
   return $this->redirect(['site/index']);
   }

    /**
     * Finds the Mahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mahasiswa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCetakpdf($id){
        // get your HTML raw content without any layouts or scripts
        //$content = $this->renderPartial('_reportView');
        $content = $this->renderPartial('cetak',[
               'model' => $this->findModel($id),
           ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_BLANK,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => $this->findModel($id)->user_id],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>[$this->findModel($id)->user_id],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting

        return $pdf->render();
       }



}
