<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\FullTimer;
use frontend\models\KarirEtcJabatan;
use frontend\models\OrganisasiKepanitiaan;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirKepanitiaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karir-kepanitiaan-form">

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
        <div class="col-sm-4">
            <?= $form->field($model, 'posisi_id')->dropDownList(
                ArrayHelper::map(KarirEtcJabatan::find()->orderBy('posisi')->all(), 'id', 'posisi'),
                ['prompt' => 'Pilih Posisi']
            ) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'kepanitiaan_id')->dropDownList(
                ArrayHelper::map(OrganisasiKepanitiaan::find()->orderBy('nama')->all(), 'id', 'fullName'),
                ['prompt' => 'Pilih Penempatan']
            ) ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>
        </div>                            
    </div><!-- .row -->  

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
