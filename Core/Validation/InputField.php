<?php
namespace App\Core\Validation;

use App\Core\Model;


/**
 * Class InputField
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core\Validation;
 */
class InputField extends BaseField
{
    public const TYPE_TEXT = 'text';
    public const TYPE_EMAIL = 'email';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public const TYPE_TEL = 'tel';

    public string $type;
    
    /**
     * InputField constructor
     *
     * @param  \App\Core\Model $model
     * @param  mixed $attribute
     * @return void
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }

    

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function emailField()
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function renderInput(): string
    {
        return sprintf('<input type="%s" name="%s" value="%s" class="form-control%s">',
            $this->type,
            $this->attribute, 
            $this->model->{$this->attribute}, 
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
        );
    }
}