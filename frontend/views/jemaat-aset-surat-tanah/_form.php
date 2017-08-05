<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\EtcJenisSuratTanah;
use frontend\models\JemaatAsetTanah;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetSuratTanah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-aset-surat-tanah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, "jenis_surat_tanah_id")->dropDownList(
        ArrayHelper::map(EtcJenisSuratTanah::find()->orderBy('jenis_surat_tanah')->all(), 'id', 'jenis_surat_tanah'),
        ['prompt' => 'Pilih Jenis Surat Tanah']
    ) ?>

    <?= $form->field($model, 'aset_tanah_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(JemaatAsetTanah::find()->all(), 'id', 'jemaatAndlokasi'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Aset Tanah'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    );
    ?> 

    <?= $form->field($model, 'lokasi_surat_tanah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
