<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use backend\models\FullTimer;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKursus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-kursus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_timer_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(FullTimer::find()->orderBy('nama')->all(), 'id', 'nama'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Full Timer'],
            'pluginOptions' => [
                'allowClear' => true
            ],           
        ]
    );
    ?> 

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'nama_kursus')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>
        </div>
    </div><!-- .row -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
