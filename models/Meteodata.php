<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meteodata".
 *
 * @property integer $id
 * @property integer $meteostation_id
 * @property string $timestamp
 * @property integer $temperature
 * @property integer $pressure
 * @property integer $humidity
 * @property integer $wind_speed
 * @property integer $wind_direction_x
 * @property integer $wind_direction_y
 *
 * @property Meteostation $meteostation
 */
class Meteodata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meteodata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meteostation_id', 'temperature', 'pressure', 'humidity', 'wind_speed', 'wind_direction_x', 'wind_direction_y'], 'integer'],
            [['timestamp'], 'safe'],
            [['meteostation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Meteostation::className(), 'targetAttribute' => ['meteostation_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'meteostation_id' => 'Meteostation ID',
            'timestamp' => 'Timestamp',
            'temperature' => 'Temperature',
            'pressure' => 'Pressure',
            'humidity' => 'Humidity',
            'wind_speed' => 'Wind Speed',
            'wind_direction_x' => 'Wind Direction X',
            'wind_direction_y' => 'Wind Direction Y',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeteostation()
    {
        return $this->hasOne(Meteostation::className(), ['id' => 'meteostation_id']);
    }
}
