<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Jemaat;
use backend\models\LevelJemaat;
use backend\models\JemaatStatus;

use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Jemaat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Get all Level Jemaat, except Sinode (id = 0) -->
    <?= $form->field($model, 'level_jemaat_id')->dropDownList(
            ArrayHelper::map(LevelJemaat::find()->where('id > 0')->all(), 'id', 'nama'),
            [
                'prompt' => 'Pilih Level Jemaat',
                'onchange' => '$.post("index.php?r=jemaat/list-supers&levelJemaat=' . '" + $(this).val(), 
                    function(data) { 
                        $("select#jemaat-super_id").html(data);
                        $("select#jemaat-super_id").select2().trigger("change");
                    }
                );'
            ]

        ); 
    ?>    

    <?= $form->field($model, 'super_id')->widget(
            Select2::classname(), 
            [
                'data' => ArrayHelper::map($model->allSuper, 'id', 'nama'),
                'language' => 'id',
                // 'options' => ['placeholder' => 'Pilih jemaat induk'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]
        );
    ?>    

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>                                                

    <?= $form->field($model, 'status_jemaat_id') -> widget(
            Select2::classname(), 
            [
                'data' => ArrayHelper::map(
                    JemaatStatus::find()->all(),
                    'id', 'status'),
                'language' => 'id',
                'initValueText' => 'Aktif',
                'options' => ['placeholder' => 'Pilih status jemaat'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
