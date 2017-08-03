<?php

namespace frontend\controllers;

use Yii;
use frontend\models\JemaatPhotos;
use frontend\models\JemaatPhotosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * JemaatPhotosController implements the CRUD actions for JemaatPhotos model.
 */
class JemaatPhotosController extends Controller
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
     * Lists all JemaatPhotos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JemaatPhotosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single JemaatPhotos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    private function savePhotoFile($model)
    {
        if (isset($model->photoFile)) {
            $model->photoFile = UploadedFile::getInstance($model, 'photoFile');
            $photoFileName = $model->jemaat_id . '_' . 
                              str_replace(' ', '_', $model->title) .
                             '.' . $model->photoFile->extension;  
            $photoFilePath = 'photo_jemaat/' . $photoFileName;
            $thumbFilePath = 'photo_jemaat/thumbnails/' . $photoFileName;
            $model->photoFile->saveAs($photoFilePath);

            Image::thumbnail($photoFilePath, 160, 160)
              ->save(Yii::getAlias($thumbFilePath), ['quality' => 80]);

            // save the file name on database
            $model->href = $photoFilePath;
            $model->thumbnail = $thumbFilePath;   
            $model->type = $model->photoFile->type;
        }      
    }

    /**
     * Creates a new JemaatPhotos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = new JemaatPhotos();

        if ($model->load(Yii::$app->request->post())) {

            // save the physical file
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
     * Updates an existing JemaatPhotos model.
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

            // save the physical file
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
     * Creates a new JemaatPhotos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateFor($jemaatId)
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = new JemaatPhotos();
        $model->jemaat_id = $jemaatId;

        if ($model->load(Yii::$app->request->post())) {

            // save the physical file
            $this->savePhotoFile($model);
            $model->save();

            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->renderAjax('create-for', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing JemaatPhotos model.
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

            // save the physical file
            $this->savePhotoFile($model);
            $model->save();

            return $this->redirect(Yii::$app->request->referrer);
        } else {
            return $this->renderAjax('update-for', [
                'model' => $model,
            ]);
        }
    }    

    public function actionUploadFor($jemaatId)
    {
        if (!(Yii::$app->user->can('create-update-jemaat')))
            throw new ForbiddenHttpException;

        $model = new JemaatPhotos();
        $model->jemaat_id = $jemaatId;

        $fileName = 'file';
        $uploadPath = './files';

        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);

            //Print file data
            //print_r($file);

            if ($file->saveAs($uploadPath . '/' . $file->name)) {
                //Now save file data to database

                echo \yii\helpers\Json::encode($file);
            }
        } else {
            return $this->renderAjax('upload-for');
        }

        return false;

    }

    /**
     * Deletes an existing JemaatPhotos model.
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
     * Finds the JemaatPhotos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return JemaatPhotos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = JemaatPhotos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public static function findModelOnJemaat($jemaatId)
    {
        if (($model = JemaatPhotos::find()->where('jemaat_id = ' . $jemaatId)->all()) !== null) {
            return $model;
        } else {
            return new JemaatPhotos();
        }    
    }  

}
