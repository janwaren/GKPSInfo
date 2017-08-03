<?php

namespace backend\controllers;

use Yii;
use backend\models\Model;
use backend\models\FullTimer;
use backend\models\FullTimerSearch;
use backend\models\FullTimerRiwayatHidup;
use backend\models\FullTimerPelayanan;
use backend\models\FullTimerSekolah;
use backend\models\FullTimerKuliah;
use backend\models\FullTimerKursus;
use backend\models\FullTimerKeluarga;
use backend\models\FullTimerKeluargaSearch;
use backend\models\KarirJemaat;
use backend\models\KarirJemaatSearch;
use backend\models\KarirKantorPusat;
use backend\models\KarirKantorPusatSearch;
use backend\models\KarirExternal;
use backend\models\KarirExternalSearch;
use backend\models\KarirKepanitiaan;
use backend\models\KarirKepanitiaanSearch;
use backend\models\FullTimerKuliahSearch;
use backend\models\FullTimerKursusSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

use backend\controllers\FullTimerRiwayatHidupController;
use backend\controllers\FullTimerPelayananController;
use backend\controllers\FullTimerSekolahController;
use backend\controllers\FullTimerKuliahController;
use backend\controllers\KarirJemaatController;



/**
 * FullTimerController implements the CRUD actions for FullTimer model.
 */
class FullTimerController extends Controller
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
     * Lists all FullTimer models.
     * @return mixed
     */
    public function actionIndex()
    {
        // default full-timer models
        $searchModel = new FullTimerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FullTimer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        // query full-timer-kuliah
        $kuliahSearchModel = new FullTimerKuliahSearch();
        $kuliahQueryParams = ['FullTimerKuliahSearch' => ['full_timer_id' => $id], 
                              'r'=>'full-timer-kuliah'];
        $kuliahDataProvider = $kuliahSearchModel->search($kuliahQueryParams);

        // query full-timer-kursus
        $kursusSearchModel = new FullTimerKursusSearch();
        $kursusQueryParams = ['FullTimerKursusSearch' => ['full_timer_id' => $id], 
                              'r'=>'full-timer-kursus'];
        $kursusDataProvider = $kursusSearchModel->search($kursusQueryParams);        

        // query karir-jemaat
        $karirJemaatSearchModel = new KarirJemaatSearch();
        $karirJemaatQueryParams = ['KarirJemaatSearch' => ['full_timer_id' => $id], 
                              'r'=>'karir-jemaat'];
        $karirJemaatDataProvider = $karirJemaatSearchModel->search($karirJemaatQueryParams);        

        // query karir-kantor-pusat
        $karirKantorPusatSearchModel = new KarirKantorPusatSearch();
        $karirKantorPusatQueryParams = ['KarirKantorPusatSearch' => ['full_timer_id' => $id], 
                              'r'=>'karir-kantor-pusat'];
        $karirKantorPusatDataProvider = $karirKantorPusatSearchModel->search($karirKantorPusatQueryParams);                

        // query karir-kepanitiaan
        $karirKepanitiaanSearchModel = new KarirKepanitiaanSearch();
        $karirKepanitiaanQueryParams = ['KarirKepanitiaanSearch' => ['full_timer_id' => $id], 
                              'r'=>'karir-kepanitiaan'];
        $karirKepanitiaanDataProvider = $karirKepanitiaanSearchModel->search($karirKepanitiaanQueryParams);      

        // query karir-external
        $karirExternalSearchModel = new KarirExternalSearch();
        $karirExternalQueryParams = ['KarirExternalSearch' => ['full_timer_id' => $id], 
                              'r'=>'karir-external'];
        $karirExternalDataProvider = $karirExternalSearchModel->search($karirExternalQueryParams); 

        // query full-timer-keluarga
        $keluargaSearchModel = new FullTimerKeluargaSearch();
        $keluargaQueryParams = ['FullTimerKeluargaSearch' => ['full_timer_id' => $id], 
                              'r'=>'full-timer-keluarga'];
        $keluargaDataProvider = $keluargaSearchModel->search($keluargaQueryParams);         


        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelRiwayatHidup' => FullTimerRiwayatHidupController::findModelOnFullTimer($id),
            'modelPelayanan' => FullTimerPelayananController::findModelOnFullTimer($id),
            'modelSekolah' => FullTimerSekolahController::findModelOnFullTimer($id),
            'modelKuliah' => FullTimerKuliahController::findModelOnFullTimer($id),
            'modelKarirJemaat' => KarirJemaatController::findModelOnFullTimer($id),
            'kuliahDataProvider' => $kuliahDataProvider,
            'kursusDataProvider' => $kursusDataProvider,
            'karirJemaatDataProvider' => $karirJemaatDataProvider,
            'karirKantorPusatDataProvider' => $karirKantorPusatDataProvider,
            'karirKepanitiaanDataProvider' => $karirKepanitiaanDataProvider,
            'karirExternalDataProvider' => $karirExternalDataProvider,
            'keluargaDataProvider' => $keluargaDataProvider,
        ]);
    }

    /**
     * Creates a new FullTimer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new FullTimer();
        $modelRiwayatHidup = new FullTimerRiwayatHidup();
        $modelPelayanan = new FullTimerPelayanan();
        $modelSekolah = new FullTimerSekolah();
        $modelsKuliah = [new FullTimerKuliah];
        $modelsKursus = [new FullTimerKursus];
        $modelsKarirJemaat = [new KarirJemaat];
        $modelsKarirKantorPusat = [new KarirKantorPusat];
        $modelsKarirExternal = [new KarirExternal];
        $modelsKarirKepanitiaan = [new KarirKepanitiaan];
        $modelsKeluarga = [new FullTimerKeluarga];

        if (($model->load(Yii::$app->request->post())) 
             && 
            ($modelRiwayatHidup->load(Yii::$app->request->post())) 
             && 
            ($modelPelayanan->load(Yii::$app->request->post())) 
             &&
            ($modelSekolah->load(Yii::$app->request->post())) ) {


            // initiate all models
            $modelsKuliah = Model::createMultiple(FullTimerKuliah::classname());
            Model::loadMultiple($modelsKuliah, Yii::$app->request->post());

            $modelsKursus = Model::createMultiple(FullTimerKursus::classname());
            Model::loadMultiple($modelsKursus, Yii::$app->request->post());

            $modelsKarirJemaat = Model::createMultiple(KarirJemaat::classname());
            Model::loadMultiple($modelsKarirJemaat, Yii::$app->request->post());            

            $modelsKarirKantorPusat = Model::createMultiple(KarirKantorPusat::classname());
            Model::loadMultiple($modelsKarirKantorPusat, Yii::$app->request->post());                        

            $modelsKarirExternal = Model::createMultiple(KarirExternal::classname());
            Model::loadMultiple($modelsKarirExternal, Yii::$app->request->post());

            $modelsKarirKepanitiaan = Model::createMultiple(KarirKepanitiaan::classname());
            Model::loadMultiple($modelsKarirKepanitiaan, Yii::$app->request->post());            

            $modelsKeluarga = Model::createMultiple(FullTimerKeluarga::classname());
            Model::loadMultiple($modelsKeluarga, Yii::$app->request->post());            

            // ------------------------------------------
            // Handle file photo for full-timer
            // ------------------------------------------

            // save the physical file
            $model->photoFile = UploadedFile::getInstance($model, 'photoFile');
            $photoFileName = 'photo_full_timer/' . $model->nama . '.' . $model->photoFile->extension;        
            $model->photoFile->saveAs($photoFileName);

            // save the file name on database
            $model->photo_file = $photoFileName;

            // ------------------------------------------
            // Configure foreign-keys
            // ------------------------------------------

            $modelRiwayatHidup->full_timer_id = $model->id;
            $modelPelayanan->full_timer_id = $model->id;
            $modelSekolah->full_timer_id = $model->id;

            foreach ($modelsKuliah as $modelKuliah) {
                $modelKuliah->full_timer_id = $model->id;
            }

            foreach ($modelsKursus as $modelKursus) {
                $modelKursus->full_timer_id = $model->id;
            }    

            foreach ($modelsKarirJemaat as $modelKarirJemaat) {
                $modelKarirJemaat->full_timer_id = $model->id;
            }   

            foreach ($modelsKarirKantorPusat as $modelKarirKantorPusat) {
                $modelKarirKantorPusat->full_timer_id = $model->id;
            }   

            foreach ($modelsKarirExternal as $modelKarirExternal) {
                $modelKarirExternal->full_timer_id = $model->id;
            }   

            foreach ($modelsKarirKepanitiaan as $modelKarirKepanitiaan) {
                $modelKarirKepanitiaan->full_timer_id = $model->id;
            }   

            foreach ($modelsKeluarga as $modelKeluarga) {
                $modelKeluarga->full_timer_id = $model->id;
            }               

            // validate all models
            $valid = $model->validate();
            $valid = $modelRiwayatHidup->validate() && $valid;
            $valid = $modelPelayanan->validate() && $valid;
            $valid = $modelSekolah->validate() && $valid;
            $valid = Model::validateMultiple($modelsKuliah) && $valid;
            $valid = Model::validateMultiple($modelsKursus) && $valid;
            $valid = Model::validateMultiple($modelsKarirJemaat) && $valid;
            $valid = Model::validateMultiple($modelsKarirKantorPusat) && $valid;
            $valid = Model::validateMultiple($modelsKarirExternal) && $valid;
            $valid = Model::validateMultiple($modelsKarirKepanitiaan) && $valid;
            $valid = Model::validateMultiple($modelsKeluarga) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {

                        foreach ($modelsKuliah as $modelKuliah) {
                            if (! ($flag = $modelKuliah->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        foreach ($modelsKursus as $modelKursus) {
                            if (! ($flag = $modelKuliah->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }   

                        foreach ($modelsKarirJemaat as $modelKarirJemaat) {
                            if (! ($flag = $modelKarirJemaat->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }   

                        foreach ($modelsKarirKantorPusat as $modelKarirKantorPusat) {
                            if (! ($flag = $modelKarirKantorPusat->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }   

                        foreach ($modelsKarirExternal as $modelKarirExternal) {
                            if (! ($flag = $modelKarirExternal->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }   

                        foreach ($modelsKarirKepanitiaan as $modelKarirKepanitiaan) {
                            if (! ($flag = $modelKarirKepanitiaan->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }   

                        foreach ($modelsKeluarga as $modelKeluarga) {
                            if (! ($flag = $modelKeluarga->save(false))) {
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

            return $this->redirect(['view', 'id' => $model->id]);
              
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelPelayanan' => $modelPelayanan,                
                'modelRiwayatHidup' => $modelRiwayatHidup,
                'modelSekolah' => $modelSekolah,
                'modelsKuliah' => (empty($modelsKuliah) ? [new FullTimerKuliah] : $modelsKuliah),
                'modelsKursus' => (empty($modelsKursus) ? [new FullTimerKursus] : $modelsKursus),
                'modelsKarirJemaat' => (empty($modelsKarirJemaat) ? [new KarirJemaat] : $modelsKarirJemaat),
                'modelsKarirKantorPusat' => (empty($modelsKarirKantorPusat) ? [new KarirKantorPusat] : $modelsKarirKantorPusat),
                'modelsKarirExternal' => (empty($modelsKarirExternal) ? [new KarirExternal] : $modelsKarirExternal),
                'modelsKarirKepanitiaan' => (empty($modelsKarirKepanitiaan) ? [new KarirKepanitiaan] : $modelsKarirKepanitiaan),
                'modelsKeluarga' => (empty($modelsKeluarga) ? [new FullTimerKeluarga] : $modelsKeluarga),
            ]);
        }
    }

    /**
     * Updates an existing FullTimer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            // save the physical file
            $model->photoFile = UploadedFile::getInstance($model, 'photoFile');
            $photoFileName = 'photo_full_timer/' . $model->nama . '.' . $model->photoFile->extension;        
            $model->photoFile->saveAs($photoFileName);

            // save the file name on database
            $model->photo_file = $photoFileName;

            $model->save();            

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FullTimer model.
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
     * Finds the FullTimer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FullTimer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FullTimer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
