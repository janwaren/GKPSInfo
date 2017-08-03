<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\Jemaat;
use frontend\models\JemaatKategorialKegiatan;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKategorial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-kategorial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jemaat_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(Jemaat::find()->orderBy('nama')->all(), 'id', 'nama'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Jemaat'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    );
    ?> 

    <?= $form->field($model, 'kegiatan_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(JemaatKategorialKegiatan::find()->orderBy('nama_kegiatan')->all(), 'id', 'nama_kegiatan'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Kegiatan'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    );
    ?>     

    <?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hari')->dropDownList([ 'Minggu' => 'Minggu', 'Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'jadwal')->dropDownList([ 'Mingguan' => 'Mingguan', '2-Mingguan' => '2-Mingguan', 'Bulanan' => 'Bulanan', '2-Bulanan' => '2-Bulanan', '3-Bulanan' => '3-Bulanan', '4-Bulanan' => '4-Bulanan', '6-Bulanan' => '6-Bulanan', 'Tahunan' => 'Tahunan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'jam')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
