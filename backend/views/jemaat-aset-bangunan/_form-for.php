<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\bootstrap\Modal;

use backend\models\EtcJenisBangunan;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetBangunan */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">
$(function() {
    $('.btn-update-create-ajax').click(function() {
        $('#modalUpdateAjax').modal('show')
            .find('#modalUpdateContentAjax')
            .load($(this).attr('value'));       
    });
}); 

$(function() {
    $('.btn-create-ajax').click(function() {
        $('#modalAddAjax').modal('show')
            .find('#modalAddContentAjax')
            .load($(this).attr('value'));           
    });
});     
</script>

<div class="jemaat-aset-bangunan-form">

    <?php
        Modal::begin([
                'header' => '<h4>Tambah</h4>',
                'id' => 'modalAddAjax',
                'size' => 'modal-lg',
                'options' => [
                    'tabindex' => false
                ]
            ]);
        echo "<div id='modalAddContentAjax'></div>";
        Modal::end();
    ?>   

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'jenis_bangunan_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(EtcJenisBangunan::find()->orderBy('jenis_bangunan')->all(), 'id', 'jenis_bangunan'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Jenis Bangunan'],
            'pluginOptions' => [
                'allowClear' => true
            ],
            'addon' => [
                'append' => [
                    'content' => Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                        'value' => Url::to('index.php?r=etc-jenis-bangunan/create-ajax'), 
                        'class' => 'btn btn-primary btn-create-ajax', 
                        'title' => 'Tambah baru', 
                        'data-toggle' => 'tooltip'
                    ]),
                    'asButton' => true
                ]
            ],             
        ]);
    ?>     

    <?= $form->field($model, 'luas_bangunan')->textInput() ?>

    <?= $form->field($model, 'jumlah_unit')->textInput() ?>

    <?= $form->field($model, 'kondisi')->dropDownList([ 'Permanen' => 'Permanen', 'Semi Permanen' => 'Semi Permanen', 'Darurat' => 'Darurat', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
