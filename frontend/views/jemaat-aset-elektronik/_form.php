<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetElektronik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-aset-elektronik-form">

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

    <?= $form->field($model, 'nama_alat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah_unit')->textInput() ?>

    <?= $form->field($model, 'kondisi')->dropDownList([ 'Berfungsi Baik' => 'Berfungsi Baik', 'Rusak' => 'Rusak', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
