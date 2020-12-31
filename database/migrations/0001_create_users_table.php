<?php

use App\Core\Application;

/**
 * Class CreateUsersTable
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 */
class CreateUsersTable
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $database = Application::$app->database;
        $SQL = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            firstname VARCHAR(255) NOT NULL,
            lastname VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        $database->pdo->exec($SQL);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $database = Application::$app->database;
        $SQL = "DROP TABLE users;";
        $database->pdo->exec($SQL);
    }
}