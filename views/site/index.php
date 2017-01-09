<?php

/* @var $this yii\web\View */

$this->title = 'Weather';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome!</h1>

        <p class="lead">This is test assignment for USERSIDE.</p>

    </div>

    <?php foreach ($meteostations as $meteostation) : ?>

        <a href="/site/view?id=<?= $meteostation->id ?>">
            <div class="col-md-4 ">
                <div class="row">
                    <p><b><?= $meteostation->name ?></b></p>

                </div>
                <div class="row">
                    <div class="col-xs-4"><?= $meteostation->location->address ?></div>
                </div>
                <table class="table-bordered">
                    <?php foreach ($meteostation->getSensors()->each() as $sensor): ?>
                    <tr>
                        <?php if (isset($sensor->temperature)): ?>
                            <td class="col-md-1">Температура</td>
                            <td class="col-md-1"> <?= $sensor->temperature ?></td>
                        <?php endif; ?>
                    <tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </a>

    <?php endforeach; ?>


</div>
