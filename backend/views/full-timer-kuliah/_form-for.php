<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use backend\models\FullTimer;
use backend\models\EtcUniversitas;
use backend\models\EtcStrata;
use backend\models\EtcGelar;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKuliah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-kuliah-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'universitas_id')->dropDownList(
                ArrayHelper::map(EtcUniversitas::find()->orderBy('nama')->all(), 'id', 'nama'),
                ['prompt' => 'Pilih Universitas']
            ) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'tahun_masuk')->textInput(['maxlength' => true]) ?>
        </div>
    </div><!-- .row -->
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'strata_id')->dropDownList(
                ArrayHelper::map(EtcStrata::find()->orderBy('nama')->all(), 'id', 'nama'),
                ['prompt' => 'Pilih Strata']
            ) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'gelar_id')->dropDownList(
                ArrayHelper::map(EtcGelar::find()->orderBy('singkatan')->all(), 'id', 'singkatan'),
                ['prompt' => 'Pilih Gelar']
            ) ?>
        </div>
    </div><!-- .row -->

    <?= $form->field($model, 'judul_thesis')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
