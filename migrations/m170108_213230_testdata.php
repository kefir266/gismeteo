<?php

use yii\db\Migration;

class m170108_213230_testdata extends Migration
{
    public function up()
    {

        $this->insert('location',[
            'id' => '1',
            'name' => 'kyiv'
        ]);
        $this->insert('location', [
            'id' => '2',
            'name' => 'donetsk'
        ]);

        $this->insert('meteostation',[
            'id' => '1',
            'name' => 'Kyiv station',
            'location_id' => '1'
        ]);
        $this->insert('meteostation',[
            'id' => '2',
            'name' => 'Donetsk station',
            'location_id' => '2'
        ]);
    }

    public function down()
    {
        $this->delete('meteostation',['id' => '1']);
        $this->delete('meteostation',['id' => '2']);
        $this->delete('location',['id' => '1']);
        $this->delete('location',['id' => '2']);
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
