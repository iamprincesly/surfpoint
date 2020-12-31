<?php
/** @var $model \App\Models\User */ 
/** @var $this \App\Core\View */
$this->title = 'Register an account';
?>
<h1>Registration Form</h1>

<?php $form = \App\Core\Validation\Form::begin('', 'post') ?>
    <div class="row mb-3">
        <div class="col">
            <?php echo $form->field($model, 'firstname') ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastname') ?>
        </div>
    </div>

    <div class="mb-3">
        <?php echo $form->field($model, 'email')->emailField() ?>
    </div>

    <div class="mb-3">
        <?php echo $form->field($model, 'password')->passwordField() ?>
    </div>
    
    <div class="mb-3">
        <?php echo $form->field($model, 'confirmPassword')->passwordField() ?>
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
<?php echo \App\Core\Validation\Form::end() ?>