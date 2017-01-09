<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sensor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'meteostation_id')->dropDownList([
        \yii\helpers\ArrayHelper::map(\app\models\Meteostation::find()->select('id,name')->each(),'id','name')
    ]) ?>

    <?= $form->field($model, 'type')
        ->dropDownList([
            'openweather' => 'Openweather',
            'temperature' => 'Temperature',
            'pressure' => 'Pressure',
        ],
            ['prompt' => '']) ?>

    <?= $form->field($model, 'uri')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
