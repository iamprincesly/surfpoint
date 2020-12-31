<?php
namespace App\Core;

use App\Core\Database\DbModel;

/**
 * Class UserModel
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core;
 */
abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}