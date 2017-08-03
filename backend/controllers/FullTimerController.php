<?php

namespace backend\controllers;

use Yii;
use backend\models\FullTimer;
use backend\models\FullTimerKarir;
use backend\models\FullTimerSearch;
use backend\models\FullTimerRiwayatHidup;
use backend\models\FullTimerPelayanan;
use backend\models\FullTimerSekolah;
use backend\models\FullTimerKuliah;
use backend\models\FullTimerKursus;
use backend\models\FullTimerKeluarga;
use backend\models\FullTimerKeluargaSearch;
use backend\models\FullTimerKarirSearch;
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
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\imagine\Image;

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

        $karirSearchModel = new FullTimerKarirSearch();
        $karirQueryParams = ['FullTimerKarirSearch' => ['full_timer_id' => $id], 
                              'r'=>'full-timer-karir'];
        $karirDataProvider = $karirSearchModel->search($karirQueryParams);             

        $modelRiwayatHidup = FullTimerRiwayatHidupController::findModelOnFullTimer($id);
        $modelPelayanan = FullTimerPelayananController::findModelOnFullTimer($id);
        $modelSekolah = FullTimerSekolahController::findModelOnFullTimer($id);
        $modelKuliah = FullTimerKuliahController::findModelOnFullTimer($id);
        $modelKarirJemaat = KarirJemaatController::findModelOnFullTimer($id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelRiwayatHidup' => $modelRiwayatHidup,
            'modelPelayanan' => $modelPelayanan,
            'modelSekolah' => $modelSekolah,
            'modelKuliah' => $modelKuliah,
            'modelKarirJemaat' => $modelKarirJemaat,
            'kuliahDataProvider' => $kuliahDataProvider,
            'kursusDataProvider' => $kursusDataProvider,
            'karirJemaatDataProvider' => $karirJemaatDataProvider,
            'karirKantorPusatDataProvider' => $karirKantorPusatDataProvider,
            'karirKepanitiaanDataProvider' => $karirKepanitiaanDataProvider,
            'karirExternalDataProvider' => $karirExternalDataProvider,
            'keluargaDataProvider' => $keluargaDataProvider,
            'karirDataProvider' => $karirDataProvider,
        ]);
    }

    private function savePhotoFile($model)
    {
        $model->photoFile = UploadedFile::getInstance($model, 'photoFile');
        if (isset($model->photoFile)) {
            $photoFileName = $model->id . '_' . $model->nama . '.' . $model->photoFile->extension; 
            $photoFilePath = 'photo_full_timer/' . $photoFileName;
            $thumbFilePath = 'photo_full_timer/thumbnails/' . $photoFileName;
            $model->photoFile->saveAs($photoFilePath);

            Image::thumbnail($photoFilePath, 160, 160)
              ->save(Yii::getAlias($thumbFilePath), ['quality' => 80]);

            // save the file name on database
            $model->photo_file = $photoFilePath;
        }
    }    

    public function parseAndSaveGelar($model) {
        if (!empty($model->gelarDepan))
            $model->gelar_depan = implode(", ", $model->gelarDepan);
        else
            $model->gelar_depan = '';
        if (!empty($model->gelarBelakang))
            $model->gelar_belakang = implode(", ", $model->gelarBelakang);
        else
            $model->gelar_belakang = '';        
    }

    /**
     * Creates a new FullTimer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!(Yii::$app->user->can('create-update-fulltimer')))
            throw new ForbiddenHttpException(\Yii::$app->params['txtErrorForbidden']);

        $model = new FullTimer();

        if (($model->load(Yii::$app->request->post()))) {
        
            // save gelar
            $this->parseAndSaveGelar($model);

            // save the physical file
            $model->photoFile = $_POST['FullTimer']['photoFile'];
            $this->savePhotoFile($model);
            $model->save();        

            return $this->redirect(['view', 'id' => $model->id]);
              
        } else {
            return $this->render('create', [
                'model' => $model,
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
        if (!(Yii::$app->user->can('create-update-fulltimer')))
            throw new ForbiddenHttpException(\Yii::$app->params['txtErrorForbidden']);

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            // save gelar
            $this->parseAndSaveGelar($model);

            // save the physical file
            $model->photoFile = $_POST['FullTimer']['photoFile'];
            $this->savePhotoFile($model);
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
        if (!(Yii::$app->user->can('delete-fulltimer')))
            throw new ForbiddenHttpException(\Yii::$app->params['txtErrorForbidden']);

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
