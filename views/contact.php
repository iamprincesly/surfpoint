<?php
/** @var $this \App\Core\View */
/** @var $contact \App\Models\ContactForm */

use App\Core\Validation\Form;
use App\Core\Validation\TextareaField;

$this->title = 'Contact Us';
?>
<h1>Contact Page</h1>

<?php $form = Form::begin('', 'post') ?>
    <div class="mb-3">
        <?php echo $form->field($contact, 'subject') ?>
    </div>
    <div class="mb-3">
        <?php echo $form->field($contact, 'email') ?>
    </div>
    <div class="mb-3">
        <?php echo new TextareaField($contact, 'body') ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>