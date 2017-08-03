<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\TimePicker;

use backend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKebaktianMinggu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-kebaktian-minggu-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'jam')->textInput() ?>
        </div>    

        <div class="col-sm-6">
            <?= $form->field($model, 'bahasa')->dropDownList([ 'Bahasa Indonesia' => 'Bahasa Indonesia', 'Bahasa Simalungun' => 'Bahasa Simalungun', 'Bahasa Inggris' => 'Bahasa Inggris', ], ['prompt' => 'Pilih Bahasa']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
