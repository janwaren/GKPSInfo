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

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Narasi
            <small>Sejarah dan Perkembangan Gereja</small>
          </h3>
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
