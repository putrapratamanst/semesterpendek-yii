<?php

namespace backend\controllers;

use Yii;
use common\models\Semesterpendek;
use backend\models\SemesterpendekSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Matakuliah;
use common\models\Model;
use yii\helpers\ArrayHelper;
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
               $model = new Semesterpendek();
               $modelsMatakuliah = [new Matakuliah];

               if ($model->load(Yii::$app->request->post()) && $model->save())
               {
                 $modelsMatakuliah = Model::createMultiple(Matakuliah::classname());
                Model::loadMultiple($modelsMatakuliah, Yii::$app->request->post());

                $valid = $model->validate();
                          $valid = Model::validateMultiple($modelsMatakuliah) && $valid;

                          if ($valid) {
                              $transaction = \Yii::$app->db->beginTransaction();
                              try {
                                  if ($flag = $model->save(false)) {
                                      foreach ($modelsMatakuliah as $modelMatakuliah) {
                                          $modelMatakuliah->id_semesterpendek = $model->id;
                                          if (! ($flag = $modelMatakuliah->save(true))) {
                                              $transaction->rollBack();
                                              break;
                                          }
                                      }
                                  }
                                  if ($flag) {
                                      $transaction->commit();
                                      return $this->redirect(['view', 'id' => $model->id]);
                                  }
                              } catch (Exception $e) {
                                  $transaction->rollBack();
                              }
                          }

               } else {
                   return $this->render('create', [
                       'model' => $model,
                        'modelsMatakuliah' => (empty($modelsMatakuliah )) ? [new Matakuliah] : $modelsMatakuliah
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
        $modelsMatakuliah = $model-> matakuliahs;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsMatakuliah, 'id', 'id');
            $modelsMatakuliah = Model::createMultiple(Matakuliah::classname(), $modelsMatakuliah);
            Model::loadMultiple($modelsMatakuliah, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsMatakuliah, 'id', 'id')));


            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsMatakuliah) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Matakuliah::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsMatakuliah as $modelMatakuliah) {
                            $modelMatakuliah->id_semesterpendek= $model->id;
                            if (! ($flag = $modelMatakuliah->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsMatakuliah' => (empty($modelsMatakuliah)) ? [new Matakuliah] : $modelsMatakuliah
        ]);
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
