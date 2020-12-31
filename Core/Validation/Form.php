<?php
namespace App\Core\Validation;

use App\Core\Validation\InputField;


/**
 * Class Form
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core\Validation;
 */
class Form
{

    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field($model, $attribute)
    {
        return new InputField($model, $attribute);
    }
}