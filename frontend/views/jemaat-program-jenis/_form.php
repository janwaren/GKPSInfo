<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use frontend\models\JemaatProgramBidang;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatProgramJenis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-program-jenis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_program')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'program_bidang_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(JemaatProgramBidang::find()->orderBy('nama_bidang')->all(), 'id', 'nama_bidang'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Bidang'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    );
    ?>  

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
