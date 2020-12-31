<?php
/** @var $exception \Exception */
/** @var $this \App\Core\View */
$this->title = $exception->getMessage();
?>
<h4><?php echo $exception->getCode() ?></h4>
<h3><?php echo $exception->getMessage() ?></h3>