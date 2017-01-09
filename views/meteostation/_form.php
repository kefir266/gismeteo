<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Meteostation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meteostation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <div class="row">
        <div class="col-md-4"> <?= $form->field($model, 'location_id')->dropDownList([
                \yii\helpers\ArrayHelper::map(\app\models\Meteostation::find()->select('id,name')->each(), 'id', 'name')
            ]) ?>

        </div>
        <div class="col-md-1">
            <?= \yii\bootstrap\Html::a('Add location', ['/location/create'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <div class="row form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
