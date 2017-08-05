<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerRiwayatHidup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-riwayat-hidup-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-sm-6">
                <?= $form->field($model, 'tanggal_lahir')->widget( DatePicker::className(), [                    
                    'inline' => false, 
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]]); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'gereja_baptis')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-sm-6">
                <?= $form->field($model, 'tanggal_baptis')->widget( DatePicker::className(), [
                    'inline' => false, 
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]]); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'gereja_sidi')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-sm-6">
                <?= $form->field($model, 'tanggal_sidi')->widget( DatePicker::className(), [
                    'inline' => false, 
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]]); ?>          
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading">Pernikahan</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'gereja_nikah')->textInput(['maxlength' => true]) ?>
                    </div>

                    <div class="col-sm-6">
                        <?= $form->field($model, 'tanggal_nikah')->widget( DatePicker::className(), [
                            'inline' => false, 
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]]); ?>
                    </div>
                </div>
                <?= $form->field($model, 'nama_pendeta')->textInput(['maxlength' => true]) ?>
            </div>
        </div>  

        <?= $form->field($model, 'kisah_hidup')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
