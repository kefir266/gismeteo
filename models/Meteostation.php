<?php

namespace app\models;

use app\models\interfaces\IMeteostation;
use Yii;

/**
 * This is the model class for table "meteostation".
 *
 * @property integer $id
 * @property string $name
 * @property integer $location_id
 *
 * @property Meteodata[] $meteodatas
 * @property Location $location
 * @property Sensor[] $sensors
 */
class Meteostation extends \yii\db\ActiveRecord implements IMeteostation
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meteostation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['location_id'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'location_id' => 'Location',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeteodatas()
    {
        return $this->hasMany(Meteodata::className(), ['meteostation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSensors()
    {
        return $this->hasMany(Sensor::className(), ['meteostation_id' => 'id']);
    }

    public function getStationID()
    {
        return $this->id;
    }

    //Гетер для name из ActiveRecord имплиментируется
//    public function getName()
//    {
//        return $this->name;
//    }

}
