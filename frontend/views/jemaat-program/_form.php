<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\Jemaat;
use frontend\models\JemaatProgramJenis;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatProgram */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-program-form">

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

    <?= $form->field($model, 'program_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(JemaatProgramJenis::find()->orderBy('nama_program')->all(), 'id', 'nama_program'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Kegiatan'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    );
    ?> 

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
