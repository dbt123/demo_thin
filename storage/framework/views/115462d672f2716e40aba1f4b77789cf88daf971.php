<style type="text/css">
  .alert{
    font-size: 10pt !important;
    font-family: "Roboto" !important;
  }
</style>
<?php if($errors->any()): ?>
<div class="alert alert-danger alert-dismissable margin5">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Error:</strong> 
    <ul>
      <?php foreach($errors->all() as $error): ?>
        <li><?php echo e($error); ?></li>
      <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Success:</strong> <?php echo $message; ?>

</div>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
<div class="alert alert-danger alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error:</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>

<?php if($message = Session::get('warning')): ?>
<div class="alert alert-warning alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Warning:</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>

<?php if($message = Session::get('info')): ?>
<div class="alert alert-info alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Info:</strong> <?php echo e($message); ?>

</div>
<?php endif; ?>
