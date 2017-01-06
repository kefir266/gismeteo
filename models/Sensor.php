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
}
