<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

use backend\models\Jemaat;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<script>
$(function () {
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  //bootstrap WYSIHTML5 - text editor
  $(".textarea").wysihtml5();
});
</script>

<div class="jemaat-history-form">


    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'tanggal_permulaan_kebaktian')->widget( DatePicker::className(), [
                'inline' => false, 
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]]); ?>
        </div>    

        <div class="col-sm-6">
            <?= $form->field($model, 'tanggal_peresmian')->widget( DatePicker::className(), [
                'inline' => false, 
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'tanggal_patibal_batu_onjolan')->widget( DatePicker::className(), [
                'inline' => false, 
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]]); ?>
        </div>    

        <div class="col-sm-6">
            <?= $form->field($model, 'tanggal_pamongkoton')->widget( DatePicker::className(), [
                'inline' => false, 
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]]); ?>
        </div>
    </div>



      <div class="box box-success collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Narasi
            <small>Sejarah dan Perkembangan Gereja</small>
          </h3>
          <div class="pull-right box-tools">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Tampilkan">
              <i class="fa fa-plus"></i></button>
          </div>          
          <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
            <?= $form->field($model, 'narasi')->textarea(['rows' => 20, 'class' => 'textarea col-sm-12'])->label(false) ?>
        </div>
      </div>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
