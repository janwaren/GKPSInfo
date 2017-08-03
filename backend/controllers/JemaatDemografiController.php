<?php

namespace backend\controllers;

use Yii;
use backend\models\JemaatDemografi;
use backend\models\JemaatDemografiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JemaatDemografiController implements the CRUD actions for JemaatDemografi model.
 */
class JemaatDemografiController extends Controller
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
     * Lists all JemaatDemografi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JemaatDemografiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JemaatDemografi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->request->isAjax) {        
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);            
        }

    }

    public function parseAndSaveMayoritas($model) {
        if (!empty($model->mayoritasPekerjaan))
            $model->mayoritas_pekerjaan = implode(", ", $model->mayoritasPekerjaan);
        else
            $model->mayoritas_pekerjaan = '';
        if (!empty($model->mayoritasPendidikan))
            $model->mayoritas_pendidikan = implode(", ", $model->mayoritasPendidikan);
        else
            $model->mayoritas_pendidikan = '';        
        if (!empty($model->mayoritasEkonomi))
            $model->mayoritas_ekonomi = implode(", ", $model->mayoritasEkonomi);
        else
            $model->mayoritas_ekonomi = '';           
        if (!empty($model->mayoritasAgama))
            $model->mayoritas_agama = implode(", ", $model->mayoritasAgama);
        else
            $model->mayoritas_agama = '';             
        if (!empty($model->mayoritasBudaya))
            $model->mayoritas_budaya = implode(", ", $model->mayoritasBudaya);
        else
            $model->mayoritas_budaya = '';               
    }


    /**
     * Creates a new JemaatDemografi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = new JemaatDemografi();

        if ($model->load(Yii::$app->request->post())) {
            
            $this->parseAndSaveMayoritas($model);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JemaatDemografi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
            $this->parseAndSaveMayoritas($model);
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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

        $model = new JemaatDemografi();
        $model->jemaat_id = $jemaatId;

        if ($model->load(Yii::$app->request->post())) {
            
            $this->parseAndSaveMayoritas($model);
            $model->save();

            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->renderAjax('create-for', [
                'model' => $model,
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

        if ($model->load(Yii::$app->request->post())) {
            
            $this->parseAndSaveMayoritas($model);
            $model->save();
            
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->renderAjax('update-for', [
                'model' => $model,
            ]);
        }
    }         

    /**
     * Deletes an existing JemaatDemografi model.
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
     * Finds the JemaatDemografi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JemaatDemografi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JemaatDemografi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public static function findModelOnJemaat($jemaatId)
    {
        if (($model = JemaatDemografi::find()->where('jemaat_id = ' . $jemaatId)->one()) !== null) {
            return $model;
        } else {
            return new JemaatDemografi();
        }    
    }  

}
