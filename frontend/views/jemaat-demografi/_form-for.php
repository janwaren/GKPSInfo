<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;


use frontend\models\Jemaat;
use frontend\models\EtcPekerjaan;
use frontend\models\EtcPendidikan;
use frontend\models\EtcKelasEkonomi;
use frontend\models\EtcAgama;
use frontend\models\EtcBudaya;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatDemografi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-demografi-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-sm-4">
        <?= $form->field($model, 'mayoritasPekerjaan')->widget(
          Select2::classname(), 
          [
            'data' => ArrayHelper::map(EtcPekerjaan::find()->orderBy('nama_pekerjaan')->all(), 'nama_pekerjaan', 'nama_pekerjaan'),
            'language' => 'id',
            'maintainOrder' => true,
            'options' => ['placeholder' => 'Pilih Pekerjaan', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'tokenSeparators' => [', '],
            ],
          ]);
        ?>   

      </div>

      <div class="col-sm-8">
          <?= $form->field($model, 'keterangan_pekerjaan')->textarea(['rows' => 6]) ?>
      </div>
    </div><!-- .row -->

    <div class="row">
      <div class="col-sm-4">
        <?= $form->field($model, 'mayoritasPendidikan')->widget(
          Select2::classname(), 
          [
            'data' => ArrayHelper::map(EtcPendidikan::find()->orderBy('jenjang_pendidikan')->all(), 'jenjang_pendidikan', 'jenjang_pendidikan'),
            'language' => 'id',
            'maintainOrder' => true,
            'options' => ['placeholder' => 'Pilih Pendidikan', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'tokenSeparators' => [', '],
            ],
          ]);
        ?>   
      </div>
      <div class="col-sm-8">
          <?= $form->field($model, 'keterangan_pendidikan')->textarea(['rows' => 6]) ?>
      </div>
    </div><!-- .row -->

    <div class="row">
      <div class="col-sm-4">
        <?= $form->field($model, 'mayoritasEkonomi')->widget(
          Select2::classname(), 
          [
            'data' => ArrayHelper::map(EtcKelasEkonomi::find()->orderBy('kelas_ekonomi')->all(), 'kelas_ekonomi', 'kelas_ekonomi'),
            'language' => 'id',
            'maintainOrder' => true,
            'options' => ['placeholder' => 'Pilih Kelas Ekonomi', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'tokenSeparators' => [', '],
            ],
          ]);
        ?>   
      </div>
      <div class="col-sm-8">
          <?= $form->field($model, 'keterangan_ekonomi')->textarea(['rows' => 6]) ?>
      </div>
    </div><!-- .row -->

    <div class="row">
      <div class="col-sm-4">
        <?= $form->field($model, 'mayoritasAgama')->widget(
          Select2::classname(), 
          [
            'data' => ArrayHelper::map(EtcAgama::find()->orderBy('nama_agama')->all(), 'nama_agama', 'nama_agama'),
            'language' => 'id',
            'maintainOrder' => true,
            'options' => ['placeholder' => 'Pilih Agama', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'tokenSeparators' => [', '],
            ],
          ]);
        ?>           
      </div>
      <div class="col-sm-8">
          <?= $form->field($model, 'keterangan_agama')->textarea(['rows' => 6]) ?>
      </div>
    </div><!-- .row -->

    <div class="row">
      <div class="col-sm-4">
        <?= $form->field($model, 'mayoritasBudaya')->widget(
          Select2::classname(), 
          [
            'data' => ArrayHelper::map(EtcBudaya::find()->orderBy('nama_budaya')->all(), 'nama_budaya', 'nama_budaya'),
            'language' => 'id',
            'maintainOrder' => true,
            'options' => ['placeholder' => 'Pilih Budaya', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'tags' => true,
                'tokenSeparators' => [', '],
            ],
          ]);
        ?>          
      </div>
      <div class="col-sm-8">
          <?= $form->field($model, 'keterangan_budaya')->textarea(['rows' => 6]) ?>
      </div>
    </div><!-- .row -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
