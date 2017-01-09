<?php

use yii\db\Migration;

class m170109_142515_sensor extends Migration
{
    public function up()
    {

        $this->insert('sensor',[
            'id' => '1',
            'meteostation_id' => '1',
            'type' => 'openweather',
            'uri' => 'http://api.openweathermap.org/data/2.5/weather?APPID=520518df453088872bf79e7da79ea317&q=Kyiv'
        ]);

        $this->insert('sensor',[
            'id' => '2',
            'meteostation_id' => '2',
            'type' => 'openweather',
            'uri' => 'http://api.openweathermap.org/data/2.5/weather?APPID=520518df453088872bf79e7da79ea317&q=Donetsk'
        ]);

    }

    public function down()
    {
        $this->delete('sensor',['id' => '1']);
        $this->delete('sensor',['id' => '2']);
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
