<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sensor".
 *
 * @property integer $id
 * @property integer $meteostation_id
 * @property string $type
 * @property string $uri
 *
 * @property Meteostation $meteostation
 */
class Sensor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sensor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['meteostation_id'], 'integer'],
            [['type'], 'string'],
            [['uri'], 'string', 'max' => 255],
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
            'type' => 'Type',
            'uri' => 'Uri',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeteostation()
    {
        return $this->hasOne(Meteostation::className(), ['id' => 'meteostation_id']);
    }

    public function getTemperature()
    {
        if ($this->type == 'openweather') {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $this->uri);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpcode == 200) {
                return preg_replace('/(double\()(.+)(\))/i','$2',json_decode($data)->main->temp );
            }
        } elseif ($this->type == 'temperature') {
            //Получаем от датчика температуру
        }
        return null;
    }
}
