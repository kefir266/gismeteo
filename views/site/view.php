<div>
    <div class="col-md-8 ">
        <div class="row">
            <p><b><?= $meteostation->name ?></b></p>

        </div>
        <div class="row">
            <div class="col-xs-4"><?= $meteostation->location->address ?></div>
        </div>
        <table class="table-bordered">
            <thead>
                <tr><th colspan="2">Сенсоры</th></tr>
            </thead>
            <?php foreach ($meteostation->getSensors()->each() as $sensor): ?>

                    <tr>
                        <?php if (isset($sensor->temperature)): ?>
                            <td class="col-md-1">Температура</td>
                            <td class="col-md-1">
                                <a href="/sensor/view?id=<?= $sensor->id ?>"><?= $sensor->temperature ?> C°</a>
                            </td>
                        <?php else: ?>
                            <td class="col-md-1">Температура</td>
                            <td class="col-md-1"> N/A</td>
                        <?php endif; ?>
                    <tr>

            <?php endforeach; ?>
        </table>
        <?= \yii\bootstrap\Html::a('Добавить датчик', ['/sensor/create'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>