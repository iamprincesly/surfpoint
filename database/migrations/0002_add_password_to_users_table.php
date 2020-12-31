<?php

use App\Core\Application;

/**
 * Class AddPasswordToUsersTable
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 */
class AddPasswordToUsersTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $database = Application::$app->database;
        $database->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $database = Application::$app->database;
        $database->pdo->exec("ALTER TABLE users DROP COLUMN password;");
    }
}