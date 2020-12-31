<?php

use App\Core\Application;

/**
 * Class AddPhoneToUsersTable
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 */
class AddPhoneToUsersTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $database = Application::$app->database;
        $database->pdo->exec("ALTER TABLE users ADD COLUMN phone VARCHAR(512) NOT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $database = Application::$app->database;
        $database->pdo->exec("ALTER TABLE users DROP COLUMN phone;");
    }
}