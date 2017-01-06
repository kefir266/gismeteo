<?php

use yii\db\Migration;

class m170106_073831_init extends Migration
{
    public function up()
    {

        $this->createTable('meteostation',
            [
                'id' => 'pk',
                'name' => 'VARCHAR(50) NOT NULL',
                'location_id' => 'int'
            ]);
        $this->createTable('location',
            [
                'id' => 'pk',
                'name' => 'VARCHAR(50) NOT NULL',
                'latitude' => 'float',
                'longitude' => 'float',
                'address' => 'string'
            ]);
        $this->createTable('meteodata',
            [
                'id' => 'pk',
                'meteostation_id' => 'int',
                'timestamp' => 'datetime',
                'temperature'=> 'int',
                'pressure' => 'int',
                'humidity' => 'int',
                'wind_speed' => 'int',
                'wind_direction_x' => 'int',
                'wind_direction_y' => 'int',
            ]);
        $this->createTable('sensor',
            [
                'id' => 'pk',
                'meteostation_id' => 'int',
                'type' => 'ENUM("openweather", "temperature", "pressure") NOT NULL DEFAULT "openweather"',
                'uri' => 'string', //некая универсальная строка подключения в зависимости от типа датчика
            ]
            );

        $this->addForeignKey('fk_meteodata_meteostation','meteodata',['meteostation_id'],'meteostation',['id']);
        $this->addForeignKey('fk_meteostation_location','meteostation',['location_id'], 'location', ['id']);
        $this->addForeignKey('fk_sensor_meteostation', 'sensor', ['meteostation_id'], 'meteostation', ['id']);
    }

    public function down()
    {

        $this->dropTable('sensor');
        $this->dropTable('meteo_data');
        $this->dropTable('location');
        $this->dropTable('mteostation');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
