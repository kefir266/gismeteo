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
                <a href="sensor/view?id=<?= $sensor->id?>"> <td class="col-md-1">Температура</td>
                <td class="col-md-1"> <?= $sensor->temperature ?></td>
                </a>
                <?php endif; ?>
            <tr>
                <?php endforeach; ?>
        </table>
    </div>
</div>