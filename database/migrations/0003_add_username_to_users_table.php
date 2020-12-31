<?php

use App\Core\Application;

/**
 * Class AddUsernameToUsersTable
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 */
class AddUsernameToUsersTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $database = Application::$app->database;
        $database->pdo->exec("ALTER TABLE users ADD COLUMN username VARCHAR(512) NOT NULL;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $database = Application::$app->database;
        $database->pdo->exec("ALTER TABLE users DROP COLUMN username;");
    }
}