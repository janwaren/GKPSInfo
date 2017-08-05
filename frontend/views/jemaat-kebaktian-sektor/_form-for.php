<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use frontend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKebaktianSektor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-kebaktian-sektor-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
    		<?= $form->field($model, 'nama_sektor')->textInput(['maxlength' => true]) ?>
        </div>    

        <div class="col-sm-3">
    		<?= $form->field($model, 'hari')->dropDownList([ 'Minggu' => 'Minggu', 'Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu', ], ['prompt' => '']) ?>
        </div>           

        <div class="col-sm-3">
    		<?= $form->field($model, 'jam')->textInput() ?>
        </div>
    </div>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
