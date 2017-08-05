<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKebaktianMinggu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-kebaktian-minggu-form">

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
