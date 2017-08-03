<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use backend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatPorhanger */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-porhanger-form">

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

    <?= $form->field($model, 'nama_porhanger')->textInput(['maxlength' => true]) ?>

    <div class="row">    
        <div class="col-md-6">
            <?= $form->field($model, 'tahun_mulai')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'tahun_selesai')->textInput(['maxlength' => true]) ?>
        </div>        
    </div>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
