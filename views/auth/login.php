<?php
/** @var $model \App\Models\User */ 
/** @var $this \App\Core\View */
$this->title = 'Login to your account';
?>

<h1>Login Form</h1>

<?php $form = \App\Core\Validation\Form::begin('', 'post') ?>

    <div class="mb-3">
        <?php echo $form->field($model, 'email')->emailField() ?>
    </div>

    <div class="mb-3">
        <?php echo $form->field($model, 'password')->passwordField() ?>
    </div>

    <button type="submit" class="btn btn-primary">Login</button>
<?php echo \App\Core\Validation\Form::end() ?>