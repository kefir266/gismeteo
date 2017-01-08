<?php
/**
 * Created by PhpStorm.
 * User: dmitrij
 * Date: 08.01.2017
 * Time: 22:26
 */

namespace app\commands;


use app\models\Meteostation;
use yii\console\Controller;
use yii\helpers\Console;

class StationsController extends Controller
{

    public function options($actionID)
    {
        return ['view', 'edit', 'create'];
    }

    public function actionIndex()
    {
        $exitStatus = Controller::EXIT_CODE_ERROR;
        $meteostations = Meteostation::find()->each();

        foreach ($meteostations as $meteostation) {
            $station = $this->ansiFormat($meteostation->name.' \n', Console::BG_GREEN);
            $this->stdout( $meteostation->name.' \n', Console::BG_GREEN) ;
            $exitStatus = Controller::EXIT_CODE_NORMAL;
        }
        return $exitStatus;
    }

    public function actionView($id)
    {
        $meteostation = Meteostation::findOne($id);
        $this->stdout( $meteostation->name);
        return Controller::EXIT_CODE_NORMAL;
    }

}