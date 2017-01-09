<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Meteostation */

$this->title = 'Create Meteostation';
$this->params['breadcrumbs'][] = ['label' => 'Meteostations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="meteostation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
