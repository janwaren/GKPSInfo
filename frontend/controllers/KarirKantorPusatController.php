<?php

namespace frontend\controllers;

use Yii;
use frontend\models\KarirKantorPusat;
use frontend\models\KarirKantorPusatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KarirKantorPusatController implements the CRUD actions for KarirKantorPusat model.
 */
class KarirKantorPusatController extends Controller
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
     * Lists all KarirKantorPusat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KarirKantorPusatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single KarirKantorPusat model.
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

    /**
     * Creates a new KarirKantorPusat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!(Yii::$app->user->can('create-update-fulltimer')))
            throw new ForbiddenHttpException;

        $model = new KarirKantorPusat();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new KarirKantorPusat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateFor($fullTimerId)
    {
        if (!(Yii::$app->user->can('create-update-fulltimer')))
            throw new ForbiddenHttpException;

        $model = new KarirKantorPusat();
        $model->full_timer_id = $fullTimerId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->renderAjax('create-for', [
                'model' => $model,
            ]);
        }
    }    

    /**
     * Updates an existing KarirKantorPusat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (!(Yii::$app->user->can('create-update-fulltimer')))
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
     * Updates an existing KarirKantorPusat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateFor($id)
    {
        if (!(Yii::$app->user->can('create-update-fulltimer')))
            throw new ForbiddenHttpException;

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->renderAjax('update-for', [
                'model' => $model,
            ]);
        }
    }    

    /**
     * Deletes an existing KarirKantorPusat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!(Yii::$app->user->can('create-update-fulltimer')))
            throw new ForbiddenHttpException;
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the KarirKantorPusat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KarirKantorPusat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KarirKantorPusat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
