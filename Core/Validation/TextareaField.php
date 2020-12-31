<?php
namespace App\Core\Validation;


/**
 * Class TextareaField
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core\Validation;
 */
class TextareaField extends BaseField
{
    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" class="form-control%s">%s</textarea>',
        $this->attribute, 
        $this->model->hasError($this->attribute) ? ' is-invalid' : '',
        $this->model->{$this->attribute}, 
        );
    }
}