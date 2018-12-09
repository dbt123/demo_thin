<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <title>Quản trị website</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta name="_token" content="<?php echo e(csrf_token()); ?>">
  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="<?php echo e(asset('backend/assets/images/logo.png')); ?>">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="<?php echo e(asset('backend/assets/images/logo.png')); ?>">
  
  <!-- style --> 
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/animate.css/animate.min.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/glyphicons/glyphicons.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/font-awesome/css/font-awesome.min.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/material-design-icons/material-design-icons.css')); ?>" type="text/css" />

  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/bootstrap/dist/css/bootstrap.min.css')); ?>" type="text/css" />
  <!-- build:css ../assets/styles/app.min.css -->
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/styles/app.css')); ?>" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/styles/font.css')); ?>" type="text/css" />
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/styles/fonts.css')); ?>" type="text/css" />
  <style type="text/css">
     .navbar-brand img, .navbar-brand svg {
        max-height: 24px;
        vertical-align: 0px;
        display: inline-block;
    }
    .alert{
      font-size: 10pt !important;
      font-family: "Roboto" !important;
    }
  </style>
  <?php echo $__env->yieldContent('css'); ?>
  <script type="text/javascript"> _base_url = "<?php echo e(url('')); ?>"</script>
</head>
<body>
  <div class="app" id="app">
      <div id="aside" class="app-aside modal fade nav-dropdown">
        <div class="left navside dark dk" layout="column">
          <div class="navbar navbar-md no-radius">
               <a class="navbar-brand">
               
                <img src="<?php echo e(asset('backend/assets/images/logo-M.png')); ?>" alt="">
              
                <span class="hidden-folded inline">Admin</span>
              </a>
          </div>
          <?php /* <div class="nav-fold">
            <a href="#/app/page/profile" ui-sref="app.page.profile">
                <span class="pull-left">
                  <img src="<?php echo e(asset('backend/assets/images/a0.jpg')); ?>" alt="..." class="w-40 img-circle">
                </span>
                <span class="clear hidden-folded p-x">
                  <span class="block _500">Admin</span>
                  <small class="block text-muted"><i class="fa fa-circle text-success m-r-sm"></i>online</small>
                </span>
            </a>
          </div> */ ?>
          <div flex class="hide-scroll">
            <nav class="scroll nav-light">
              <?php echo $__env->make('backend.partials.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </nav>
          </div>
          <div flex-no-shrink>
            
          </div>
        </div>
      </div>
<!-- ############ LAYOUT START-->
    <div id="content" class="app-content box-shadow-z0" role="main">
         
          <?php echo $__env->make('backend.partials.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         
          <?php echo $__env->yieldContent('content'); ?>
             <div class="app-footer">
                <?php echo $__env->make('backend.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
          
    </div>
   <!-- ############ LAYOUT END-->
  </div>
  <?php echo $__env->make('backend.partials.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>