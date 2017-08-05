<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;

use backend\models\FullTimer;
use backend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerPelayanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-pelayanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'jemaat_tahbis_id')->widget(
                    Select2::classname(), 
                    [
                        'data' => ArrayHelper::map(Jemaat::find()->where('level_jemaat_id = 3')->orderBy('nama')->all(), 'id', 'nama'),
                        'language' => 'id',
                        'options' => ['placeholder' => 'Pilih jemaat', 'tabIndex' => false],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]
                );
            ?>    
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'tanggal_tahbis')->widget( DatePicker::className(), [
                'inline' => false, 
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'golongan')->textInput() ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'ruang')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'gaji_terakhir')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'refleksi_pribadi_pelayanan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'pencapaian_pelayanan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'visi_pribadi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'misi_pribadi')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'motto')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
