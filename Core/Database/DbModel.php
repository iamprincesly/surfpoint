<?php
namespace App\Core\Database; 

use App\Core\Model;
use App\Core\Application;

/**
 * Class DbModel
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core;
 */
abstract class DbModel extends Model
{
    abstract public function tableName(): string;
    
    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $stmt = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).")
        VALUES(".implode(',', $params).")");

        foreach ($attributes as $attribute) {
            $stmt->bindValue(":$attribute", $this->{$attribute});
        }

        $stmt->execute();
        return true;
    }

    public function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stmt = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $items) {
            $stmt->bindValue(":$key", $items);
        }

        $stmt->execute();
        return $stmt->fetchObject(static::class);
    }

    public static function prepare($sql)
    {
        return Application::$app->database->pdo->prepare($sql);
    }

}