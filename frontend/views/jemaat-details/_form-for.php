<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <div id="sectionAlamat" class="panel panel-primary">
      <div class="panel-heading">                        
            <h4 class="panel-title pull-left">Alamat</h4>
            <div class="clearfix"></div>            
        </div>
        <div class="panel-body">    

            <div class="row">
                <div class="col-sm-12">
                    <?= $form->field($model, 'alamat_jalan')->textInput(['maxlength' => true]) ?>
                </div>    
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'alamat_desa_kelurahan')->textInput(['maxlength' => true]) ?>
                </div>    
                <div class="col-sm-6">
                    <?= $form->field($model, 'alamat_kecamatan')->textInput(['maxlength' => true]) ?>            
                </div>                
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'alamat_kota_kabupaten')->textInput(['maxlength' => true]) ?>
                </div>    
                <div class="col-sm-4">
                    <?= $form->field($model, 'alamat_provinsi')->textInput(['maxlength' => true]) ?>       
                </div>                
                <div class="col-sm-2">
                    <?= $form->field($model, 'alamat_kodepos')->textInput(['maxlength' => true]) ?>                    
                </div>
            </div>


        </div>
    </div>

    <div id="sectionContact" class="panel panel-primary">
      <div class="panel-heading">                        
            <h4 class="panel-title pull-left">Kontak</h4>
            <div class="clearfix"></div>            
        </div>
        <div class="panel-body">    

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>
                </div>    
                <div class="col-sm-6">
                    <?= $form->field($model, 'fax')->textInput(['maxlength' => true]) ?>
                </div>                
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>    
                <div class="col-sm-6">
                    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
                </div>                
            </div>
        </div>    
      
    </div>

    <div id="sectionGeoLoc" class="panel panel-primary">
      <div class="panel-heading">                        
            <h4 class="panel-title pull-left">Peta Lokasi</h4>
            <div class="clearfix"></div>            
        </div>
        <div class="panel-body">        
            <div id="map" style="height:300px;" class="col-sm-12"></div>
        </div>    
      
    </div>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
      function initMap() {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 3, lng: 99},
          scrollwheel: false,
          zoom: 8
        });
      }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAblpOwgo0AvpiJJQSmqKjvVKoVwOgpgvA&callback=initMap"
    async defer>
        
</script>
