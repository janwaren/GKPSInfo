<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\JemaatKategorialBidang;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKategorialKegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-kategorial-kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_kegiatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategorial_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(JemaatKategorialBidang::find()->orderBy('kategorial_bidang')->all(), 'id', 'kategorial_bidang'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Kategori'],
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
