<?php

namespace frontend\controllers;

use Yii;
use common\models\Semesterpendek;
use frontend\models\SemesterpendekSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\RecordHelpers;

/**
 * SemesterpendekController implements the CRUD actions for Semesterpendek model.
 */
class SemesterpendekController extends Controller
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
     * Lists all Semesterpendek models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SemesterpendekSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Semesterpendek model.
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
     * Creates a new Semesterpendek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
     {
     $model = new Semesterpendek;
     $model->user_id = \Yii::$app->user->identity->id;
     if ($already_exists = RecordHelpers::userHas('semesterpendek')) {
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
     * Updates an existing Semesterpendek model.
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
     * Deletes an existing Semesterpendek model.
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
     * Finds the Semesterpendek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Semesterpendek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Semesterpendek::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
