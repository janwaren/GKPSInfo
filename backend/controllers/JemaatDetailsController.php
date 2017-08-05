<?php

namespace backend\controllers;

use Yii;
use backend\models\JemaatDetails;
use backend\models\JemaatDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JemaatDetailsController implements the CRUD actions for JemaatDetails model.
 */
class JemaatDetailsController extends Controller
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
     * Lists all JemaatDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JemaatDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JemaatDetails model.
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
     * Creates a new JemaatDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = new JemaatDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JemaatDetails model.
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
     * Creates a new JemaatHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateFor($jemaatId)
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = new JemaatDetails();
        $model->jemaat_id = $jemaatId;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->renderAjax('update-for', [
                'model' => $model,
            ]);
        }
    }       

    /**
     * Deletes an existing JemaatDetails model.
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
     * Finds the JemaatDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JemaatDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JemaatDetails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function findModelOnJemaat($jemaatId)
    {
        if (($model = JemaatDetails::find()->where('jemaat_id = ' . $jemaatId)->one()) !== null) {
            return $model;
        } else {
            return new JemaatDetails();
        }    
    }
}
