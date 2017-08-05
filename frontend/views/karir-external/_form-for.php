<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\FullTimer;
use frontend\models\KarirEtcJabatan;
use frontend\models\OrganisasiLuarGkps;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirExternal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karir-external-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'jabatan_id')->widget(
                Select2::classname(), 
                [
                    'data' => ArrayHelper::map(KarirEtcJabatan::find()->orderBy('posisi')->all(), 'id', 'posisi'),
                    'language' => 'id',
                    'options' => ['placeholder' => 'Pilih Jabatan/Posisi', 'tabIndex' => false],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            );
            ?> 
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'external_org_id')->widget(
                Select2::classname(), 
                [
                    'data' => ArrayHelper::map(OrganisasiLuarGkps::find()->orderBy('nama')->all(), 'id', 'fullName'),
                    'language' => 'id',
                    'options' => ['placeholder' => 'Pilih Organisasi', 'tabIndex' => false],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            );
            ?> 
        </div>
    </div><!-- .row -->
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'tahun_mulai')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'tahun_selesai')->textInput(['maxlength' => true]) ?>
        </div>
    </div><!-- .row -->    

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>