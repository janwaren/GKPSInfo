<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatPhotos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-photos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= isset($model->photo_file) ? Html::img($model->thumbnail, ['width' => '200', 'height' => '200']) : ''?>    
    <?= $form->field($model, 'photoFile')->fileInput(); ?>  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
