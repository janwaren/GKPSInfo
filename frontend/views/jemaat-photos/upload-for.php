<?php

use yii\helpers\Html;
use kato\DropZone;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatPhotos */

$this->title = 'Upload Foto-Foto';
$this->params['breadcrumbs'][] = ['label' => 'Foto-foto', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-photos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DropZone::widget([
       'options' => [
           'maxFilesize' => '2',
       ],
       'clientEvents' => [
           'complete' => "function(file){console.log(file)}",
           'removedfile' => "function(file){alert(file.name + ' is removed')}",
           'addedfile' => "function(){}$('#caption-form').dialog('open')}",
       ],
   ]); 
   ?>

</div>
