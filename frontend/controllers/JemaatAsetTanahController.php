<?php

namespace frontend\controllers;

use Yii;

use frontend\models\Model;
use frontend\models\JemaatAsetTanah;
use frontend\models\JemaatAsetTanahSearch;
use frontend\models\JemaatAsetSuratTanahSearch;
use frontend\models\JemaatAsetSuratTanah;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * JemaatAsetTanahController implements the CRUD actions for JemaatAsetTanah model.
 */
class JemaatAsetTanahController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all JemaatAsetTanah models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JemaatAsetTanahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JemaatAsetTanah model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $suratTanahSearchModel = new JemaatAsetSuratTanahSearch();
        $suratTanahQueryParams = ['JemaatAsetSuratTanahSearch' => ['aset_tanah_id' => $id],
                                'r' => 'jemaat-aset-surat-tanah'];
        $suratTanahDataProvider = $suratTanahSearchModel->search($suratTanahQueryParams);       

        if (Yii::$app->request->isAjax) {        
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
                'suratTanahDataProvider' => $suratTanahDataProvider,
            ]);
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
                'suratTanahDataProvider' => $suratTanahDataProvider,
            ]);            
        }
    }

    /**
     * Creates a new JemaatAsetTanah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = new JemaatAsetTanah();
        $modelsJemaatAsetSuratTanah = [new JemaatAsetSuratTanah];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            // ------------------------------------------
            // Initiate sub-models
            // ------------------------------------------

            $modelsJemaatAsetSuratTanah = Model::createMultiple(JemaatAsetSuratTanah::classname());
            Model::loadMultiple($modelsJemaatAsetSuratTanah, Yii::$app->request->post());              


            foreach ($modelsJemaatAsetSuratTanah as $modelJemaatAsetSuratTanah) {
                $modelJemaatAsetSuratTanah->aset_tanah_id = $model->id;
            } 

            // ------------------------------------------
            // Validation
            // ------------------------------------------         

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsJemaatAsetSuratTanah) && $valid;                        

            if ($valid) {                 
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsJemaatAsetSuratTanah as $modelJemaatAsetSuratTanah) {
                            $modelJemaatAsetSuratTanah->aset_tanah_id = $model->id;
                            if (! ($flag = $modelJemaatAsetSuratTanah->save(false))) {
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
                'modelsJemaatAsetSuratTanah' => (empty($modelsJemaatAsetSuratTanah) ? [new JemaatAsetSuratTanah] : $modelsJemaatAsetSuratTanah),                           
            ]);
        }
    }

    /**
     * Creates a new JemaatHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateFor($jemaatId)
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = new JemaatAsetTanah();
        $model->jemaat_id = $jemaatId;

        if ($model->load(Yii::$app->request->post())) {

            // ------------------------------------------
            // Initiate sub-models
            // ------------------------------------------

            $modelsJemaatAsetSuratTanah = Model::createMultiple(JemaatAsetSuratTanah::classname());
            Model::loadMultiple($modelsJemaatAsetSuratTanah, Yii::$app->request->post());              

            // ------------------------------------------
            // Validation
            // ------------------------------------------         

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsJemaatAsetSuratTanah) && $valid;                        

            if ($valid) {                 
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsJemaatAsetSuratTanah as $modelJemaatAsetSuratTanah) {
                            $modelJemaatAsetSuratTanah->aset_tanah_id = $model->id;
                            if (! ($flag = $modelJemaatAsetSuratTanah->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }                            
                    }                    
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }            

        } else {
            return $this->renderAjax('create-for', [
                'model' => $model,
               'modelsJemaatAsetSuratTanah' => (empty($modelsJemaatAsetSuratTanah) ? [new JemaatAsetSuratTanah] : $modelsJemaatAsetSuratTanah),                       
            ]);
        }
    }     

    /**
     * Updates an existing JemaatHistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateFor($id)
    {

        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = $this->findModel($id);
        $modelsJemaatAsetSuratTanah = $model->jemaatAsetSuratTanahs;        

        if ($model->load(Yii::$app->request->post())) {

            // ------------------------------------------
            // Initiate sub-models
            // ------------------------------------------

            $oldIDs = ArrayHelper::map($modelsJemaatAsetSuratTanah, 'id', 'id');
            $modelsJemaatAsetSuratTanah = Model::createMultiple(JemaatAsetSuratTanah::classname(), $modelsJemaatAsetSuratTanah);
            Model::loadMultiple($modelsJemaatAsetSuratTanah, Yii::$app->request->post()); 
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsJemaatAsetSuratTanah, 'id', 'id')));     

            // ------------------------------------------
            // Validation
            // ------------------------------------------         

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsJemaatAsetSuratTanah) && $valid;                        

            if ($valid) {                 
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {

                        if (! empty($deletedIDs)) {
                            JemaatAsetSuratTanah::deleteAll(['id' => $deletedIDs]);
                        }

                        foreach ($modelsJemaatAsetSuratTanah as $modelJemaatAsetSuratTanah) {
                            $modelJemaatAsetSuratTanah->aset_tanah_id = $model->id;

                            if (! ($flag = $modelJemaatAsetSuratTanah->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }                            
                    }                    
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(Yii::$app->request->referrer);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }    

        } else {
            return $this->renderAjax('update-for', [
                'model' => $model,
                'modelsJemaatAsetSuratTanah' => (empty($modelsJemaatAsetSuratTanah) ? [new JemaatAsetSuratTanah] : $modelsJemaatAsetSuratTanah),                                       
            ]);
        }
    }         

    /**
     * Updates an existing JemaatAsetTanah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = $this->findModel($id);
        $modelsJemaatAsetSuratTanah = $model->jemaatAsetSuratTanahs;

        if ($model->load(Yii::$app->request->post())) {

            // ------------------------------------------
            // Initiate sub-models
            // ------------------------------------------

            $oldIDs = ArrayHelper::map($modelsJemaatAsetSuratTanah, 'id', 'id');
            $modelsJemaatAsetSuratTanah = Model::createMultiple(JemaatAsetSuratTanah::classname(), $modelsJemaatAsetSuratTanah);
            Model::loadMultiple($modelsJemaatAsetSuratTanah, Yii::$app->request->post()); 
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsJemaatAsetSuratTanah, 'id', 'id')));             


            foreach ($modelsJemaatAsetSuratTanah as $modelJemaatAsetSuratTanah) {
                $modelJemaatAsetSuratTanah->aset_tanah_id = $model->id;
            } 

            // ------------------------------------------
            // Validation
            // ------------------------------------------         

            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsJemaatAsetSuratTanah) && $valid;                        

            if ($valid) {                 
                $transaction = \Yii::$app->db->beginTransaction();

                try {
                    if ($flag = $model->save(false)) {

                        if (! empty($deletedIDs)) {
                            JemaatAsetSuratTanah::deleteAll(['id' => $deletedIDs]);
                        }

                        foreach ($modelsJemaatAsetSuratTanah as $modelJemaatAsetSuratTanah) {
                            $modelJemaatAsetSuratTanah->aset_tanah_id = $model->id;

                            if (! ($flag = $modelJemaatAsetSuratTanah->save(false))) {
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
            return $this->render('update', [
                'model' => $model,
                'modelsJemaatAsetSuratTanah' => (empty($modelsJemaatAsetSuratTanah) ? [new JemaatAsetSuratTanah] : $modelsJemaatAsetSuratTanah),                   
            ]);
        }
    }

    /**
     * Deletes an existing JemaatAsetTanah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the JemaatAsetTanah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JemaatAsetTanah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JemaatAsetTanah::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
