<?php

namespace backend\controllers;

use Yii;
use backend\controllers\JemaatDetailsController;
use backend\controllers\JemaatHistoryController;
use backend\controllers\JemaatPhotosController;
use backend\models\Jemaat;
use backend\models\JemaatSearch;
use backend\models\JemaatStatistikSearch;
use backend\models\JemaatKebaktianMingguSearch;
use backend\models\JemaatKebaktianSektorSearch;
use backend\models\JemaatKategorialSearch;
use backend\models\JemaatProgramSearch;
use backend\models\JemaatAsetElektronikSearch;
use backend\models\JemaatAsetKendaraanSearch;
use backend\models\JemaatAsetTanahSearch;
use backend\models\JemaatAsetBangunanSearch;
use backend\models\JemaatPorhangerSearch;
use backend\models\KarirJemaatSearch;
use backend\models\LevelJemaat;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\ForbiddenHttpException;

/**
 * JemaatController implements the CRUD actions for Jemaat model.
 */
class JemaatController extends Controller
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
     * Lists all Jemaat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JemaatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } 

    /**
     * Displays a single Jemaat model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $downLineSearchModel = new JemaatSearch();
        $downLineQueryParams = ['JemaatSearch' => ['super_id' => $id],
                                'r' => 'jemaat'];
        $downLineDataProvider = $downLineSearchModel->search($downLineQueryParams);

        $statistikSearchModel = new JemaatStatistikSearch();
        $statistikQueryParams = ['JemaatStatistikSearch' => ['jemaat_id' => $id],
                                'r' => 'jemaat-statistik'];
        $statistikDataProvider = $statistikSearchModel->search($statistikQueryParams);        

        $kebaktianMingguSearchModel = new JemaatKebaktianMingguSearch();
        $kebaktianMingguQueryParams = ['JemaatKebaktianMingguSearch' => ['jemaat_id' => $id],
                                'r' => 'jemaat-kebaktian-minggu'];
        $kebaktianMingguDataProvider = $kebaktianMingguSearchModel->search($kebaktianMingguQueryParams);             

        $kebaktianSektorSearchModel = new JemaatKebaktianSektorSearch();
        $kebaktianSektorQueryParams = ['JemaatKebaktianSektorSearch' => ['jemaat_id' => $id],
                                'r' => 'jemaat-kebaktian-minggu'];
        $kebaktianSektorProvider = $kebaktianSektorSearchModel->search($kebaktianSektorQueryParams);                            
	    $sekolahMingguSearchModel = new JemaatKategorialSearch();
        $sekolahMingguQueryParams = ['JemaatKategorialSearch' => ['jemaat_id' => $id, 'kategorial_id' => 1],
                                'r' => 'jemaat-kategorial'];
        $sekolahMingguDataProvider = $sekolahMingguSearchModel->searchFor($sekolahMingguQueryParams);         

        $remajaSearchModel = new JemaatKategorialSearch();
        $remajaQueryParams = ['JemaatKategorialSearch' => ['jemaat_id' => $id, 'kategorial_id' => 2],
                                'r' => 'jemaat-kategorial'];
        $remajaDataProvider = $remajaSearchModel->searchFor($remajaQueryParams);            

        $pemudaSearchModel = new JemaatKategorialSearch();
        $pemudaQueryParams = ['JemaatKategorialSearch' => ['jemaat_id' => $id, 'kategorial_id' => 3],
                                'r' => 'jemaat-kategorial'];
        $pemudaDataProvider = $pemudaSearchModel->searchFor($pemudaQueryParams);       

        $bapaSearchModel = new JemaatKategorialSearch();
        $bapaQueryParams = ['JemaatKategorialSearch' => ['jemaat_id' => $id, 'kategorial_id' => 4],
                                'r' => 'jemaat-kategorial'];
        $bapaDataProvider = $bapaSearchModel->searchFor($bapaQueryParams);     

        $wanitaSearchModel = new JemaatKategorialSearch();
        $wanitaQueryParams = ['JemaatKategorialSearch' => ['jemaat_id' => $id, 'kategorial_id' => 5],
                                'r' => 'jemaat-kategorial'];
        $wanitaDataProvider = $wanitaSearchModel->searchFor($wanitaQueryParams);         

        $lansiaSearchModel = new JemaatKategorialSearch();
        $lansiaQueryParams = ['JemaatKategorialSearch' => ['jemaat_id' => $id, 'kategorial_id' => 6],
                                'r' => 'jemaat-kategorial'];
        $lansiaDataProvider = $lansiaSearchModel->searchFor($lansiaQueryParams);                  

        $profesiSearchModel = new JemaatKategorialSearch();
        $profesiQueryParams = ['JemaatKategorialSearch' => ['jemaat_id' => $id, 'kategorial_id' => 7],
                                'r' => 'jemaat-kategorial'];
        $profesiDataProvider = $profesiSearchModel->searchFor($profesiQueryParams);       

        $majelisSearchModel = new JemaatKategorialSearch();
        $majelisQueryParams = ['JemaatKategorialSearch' => ['jemaat_id' => $id, 'kategorial_id' => 8],
                                'r' => 'jemaat-kategorial'];
        $majelisDataProvider = $majelisSearchModel->searchFor($majelisQueryParams);      

        $pastoralSearchModel = new JemaatProgramSearch();
        $pastoralQueryParams = ['JemaatProgramSearch' => ['jemaat_id' => $id, 'program_bidang_id' => 1],
                                'r' => 'jemaat-program'];
        $pastoralDataProvider = $pastoralSearchModel->searchFor($pastoralQueryParams);      

        $diakoniaInternalSearchModel = new JemaatProgramSearch();
        $diakoniaInternalQueryParams = ['JemaatProgramSearch' => ['jemaat_id' => $id, 'program_bidang_id' => 2],
                                'r' => 'jemaat-program'];
        $diakoniaInternalDataProvider = $diakoniaInternalSearchModel->searchFor($diakoniaInternalQueryParams);                         
        $diakoniaEksternalSearchModel = new JemaatProgramSearch();
        $diakoniaEksternalQueryParams = ['JemaatProgramSearch' => ['jemaat_id' => $id, 'program_bidang_id' => 3],
                                'r' => 'jemaat-program'];
        $diakoniaEksternalDataProvider = $diakoniaEksternalSearchModel->searchFor($diakoniaEksternalQueryParams);    

        $kesaksianSearchModel = new JemaatProgramSearch();
        $kesaksianQueryParams = ['JemaatProgramSearch' => ['jemaat_id' => $id, 'program_bidang_id' => 4],
                                'r' => 'jemaat-program'];
        $kesaksianDataProvider = $kesaksianSearchModel->searchFor($kesaksianQueryParams);            

        $elektronikSearchModel = new JemaatAsetElektronikSearch();
        $elektronikQueryParams = ['JemaatAsetElektronikSearch' => ['jemaat_id' => $id],
                                'r' => 'jemaat-aset-elektronik'];
        $elektronikDataProvider = $elektronikSearchModel->search($elektronikQueryParams);                    

        $kendaraanSearchModel = new JemaatAsetKendaraanSearch();
        $kendaraanQueryParams = ['JemaatAsetKendaraanSearch' => ['jemaat_id' => $id],
                                'r' => 'jemaat-aset-kendaraan'];
        $kendaraanDataProvider = $kendaraanSearchModel->search($kendaraanQueryParams);        

        $tanahSearchModel = new JemaatAsetTanahSearch();
        $tanahQueryParams = ['JemaatAsetTanahSearch' => ['jemaat_id' => $id],
                                'r' => 'jemaat-aset-tanah'];
        $tanahDataProvider = $tanahSearchModel->search($tanahQueryParams);

        $bangunanSearchModel = new JemaatAsetBangunanSearch();
        $bangunanQueryParams = ['JemaatAsetBangunanSearch' => ['jemaat_id' => $id],
                                'r' => 'jemaat-aset-bangunan'];
        $bangunanDataProvider = $bangunanSearchModel->search($bangunanQueryParams);     

        $porhangerSearchModel = new JemaatPorhangerSearch();
        $porhangerQueryParams = ['JemaatPorhangerSearch' => ['jemaat_id' => $id],
                                'r' => 'jemaat-aset-porhanger'];
        $porhangerDataProvider = $porhangerSearchModel->search($porhangerQueryParams);              
        // query karir-jemaat
        $fullTimerSearchModel = new KarirJemaatSearch();
        $fullTimerQueryParams = ['KarirJemaatSearch' => ['jemaat_id' => $id], 
                              'r'=>'karir-jemaat'];
        $fullTimerDataProvider = $fullTimerSearchModel->search($fullTimerQueryParams);     

        // $this->layout = 'layout-jemaat';

        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelJemaatDetails' => JemaatDetailsController::findModelOnJemaat($id),
            'modelJemaatHistory' => JemaatHistoryController::findModelOnJemaat($id),
            'modelJemaatDemografi' => JemaatDemografiController::findModelOnJemaat($id),
            'downLineSearchModel' => $downLineSearchModel,
            'downLineDataProvider' => $downLineDataProvider,
            'statistikSearchModel' => $statistikSearchModel,
            'statistikDataProvider' => $statistikDataProvider,  
            'kebaktianMingguDataProvider' => $kebaktianMingguDataProvider,
            'kebaktianSektorDataProvider' => $kebaktianSektorProvider,            
            'sekolahMingguDataProvider' => $sekolahMingguDataProvider,
            'remajaDataProvider' => $remajaDataProvider,
            'pemudaDataProvider' => $pemudaDataProvider,
            'bapaDataProvider' => $bapaDataProvider,            
            'wanitaDataProvider' => $wanitaDataProvider,      
            'lansiaDataProvider' => $lansiaDataProvider,      
            'profesiDataProvider' => $profesiDataProvider,      
            'majelisDataProvider' => $majelisDataProvider,
            'pastoralDataProvider' => $pastoralDataProvider,   
            'diakoniaInternalDataProvider' => $diakoniaInternalDataProvider,   
            'diakoniaEksternalDataProvider' => $diakoniaEksternalDataProvider,   
            'kesaksianDataProvider' => $kesaksianDataProvider,                                       
            'elektronikDataProvider' => $elektronikDataProvider,
            'kendaraanDataProvider' => $kendaraanDataProvider,            
            'tanahDataProvider' => $tanahDataProvider, 
            'bangunanDataProvider' => $bangunanDataProvider,                         
            'modelPhotos' => JemaatPhotosController::findModelOnJemaat($id),
            'porhangerDataProvider' => $porhangerDataProvider,
            'fullTimerDataProvider' => $fullTimerDataProvider,
        ]);
    }

    /**
     * Creates a new Jemaat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = new Jemaat();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jemaat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

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
     * Deletes an existing Jemaat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!(Yii::$app->user->can('delete-jemaat')))
            throw new ForbiddenHttpException;

        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    public function actionListSupers($levelJemaat)
    {
        // get level_jemaat value/tingkat from database
        $level = LevelJemaat::find()->where(['id' => $levelJemaat])->one();
        $upperLevel = LevelJemaat::find()->where(['level' => ($level->level - 1)])->one();

        // get all super id from database Jemaat
        $supersCount = Jemaat::find()->where(['level_jemaat_id' => ($upperLevel->id)])->count();
        $supers = Jemaat::find()->where(['level_jemaat_id' => $upperLevel->id])->all();

        // change query result into html
        if ($supersCount > 0)
        {
            foreach ($supers as $super) {
                echo "<option value='" .$super->id . "'>" . $upperLevel->nama . " " . $super->nama . "</option>";
            }
        }
        else
        {
            echo "<option>Tidak ada data</option>";
        }


    }

    /**
     * Finds the Jemaat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jemaat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jemaat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
