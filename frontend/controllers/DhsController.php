<?php

namespace frontend\controllers;

use Yii;
use common\models\Dhs;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\RecordHelpers;
use backend\models\Matakuliah;

/**
 * DhsController implements the CRUD actions for Dhs model.
 */
class DhsController extends Controller
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
];
}
    /**
     * Lists all Dhs models.
     * @return mixed
     */
     public function actionIndex()
    {
    if ($already_exists = RecordHelpers::userHas('dhs')) {
    return $this->render('view', [
    'model' => $this->findModel($already_exists),
    ]);
    } else {
    return $this->redirect(['create']);
    }
    }

    /**
     * Displays a single Dhs model.
     * @param integer $id
     * @return mixed
     */
     public function actionView($id)
        {

            $model = $this->findModel($id);
            $modelsMatakuliah = $model-> matakuliahs ;
              return $this->render('view', [
                'model' => $model,
                  'modelsMatakuliah' => $modelsMatakuliah,
              ]);
        }


    /**
     * Creates a new Dhs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
     {
     $model = new Dhs;
     $model->user_id = \Yii::$app->user->identity->id;
     if ($already_exists = RecordHelpers::userHas('Dhs')) {
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
        if (($model = Dhs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
