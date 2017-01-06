<?php
/**
 * Created by PhpStorm.
 * User: dmitrij
 * Date: 06.01.2017
 * Time: 11:22
 */

namespace app\models\interfaces;


interface IMeteostation
{
    public function getStationID();

    //Гетер для name в ActiveRecord есть
    //public function getName();

    public function getLocation();

    public function getMeteoDatas();
}