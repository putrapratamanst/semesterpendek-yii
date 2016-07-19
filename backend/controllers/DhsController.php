<?php

namespace backend\controllers;

use Yii;
use common\models\Dhs;
use backend\models\DhsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Matakuliah;
use common\models\Model;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;
/**
 * DhsController implements the CRUD actions for Dhs model.
 */
class DhsController extends Controller
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
        $searchModel = new DhsSearch();
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
            $model = new Dhs();
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
                                       $modelMatakuliah->id_dhs = $model->id;
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
     * Updates an existing Dhs model.
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
                          $modelMatakuliah->id_dhs = $model->id;
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
    protected function findModel($id)
    {
        if (($model = Dhs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
