<?php

use yii\db\Migration;
use yii\db\Schema;

class m160313_113717_employee extends Migration
{
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('employee', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(255)',
            'surname' => Schema::TYPE_STRING . '(255)',
            'patronymic' => Schema::TYPE_STRING . '(255)',
            'phone' => Schema::TYPE_STRING . '(20)',
            'floor' => Schema::TYPE_INTEGER,
            'cabinet' => Schema::TYPE_INTEGER,
            'create_date' => Schema::TYPE_INTEGER
        ], $tableOptions);

        $this->insert('employee', [
            'name' => 'Bill',
            'surname' => 'Gates',
            'patronymic' => ' ',
            'phone' => '+1 (111) 222-22-22',
            'floor' => 1,
            'cabinet' => 1,
            'create_date' => 1457869407
        ]);

        $this->insert('employee', [
            'name' => 'Larry',
            'surname' => 'Page',
            'patronymic' => ' ',
            'phone' => '+1 (222) 333-22-22',
            'floor' => 2,
            'cabinet' => 2,
            'create_date' => 1457869410
        ]);

        $this->insert('employee', [
            'name' => 'Steve',
            'surname' => 'Jobs',
            'patronymic' => ' ',
            'phone' => '+1 (222) 333-22-22',
            'floor' => 3,
            'cabinet' => 3,
            'create_date' => 1457869414
        ]);
    }

    public function down()
    {
        echo "m160313_113717_employee cannot be reverted.\n";

        return false;
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
