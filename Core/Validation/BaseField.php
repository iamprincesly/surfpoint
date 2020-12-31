<?php
namespace App\Core\Validation;

use App\Core\Model;


/**
 * Class BaseField
 * 
 * @author Prince Sly <iamprincesly@gmail.com>
 * @package App\Core\Validation;
 */
abstract class BaseField
{
    public Model $model;
    public string $attribute;

    /**
     * BaseField constructor
     *
     * @param  \App\Core\Model $model
     * @param  mixed $attribute
     * @return void
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf('
            <div class="form-group">
                <label>%s</label>
                %s
                <div class="invalid-feedback">%s</div>
            </div>
        ', 
            $this->model->getLabel($this->attribute), 
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}