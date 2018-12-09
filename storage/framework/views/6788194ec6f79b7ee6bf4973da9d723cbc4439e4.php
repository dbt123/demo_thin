
<?php $__env->startSection('title', $post->title); ?>
<?php $__env->startSection('meta'); ?>
<meta property="og:image" content="<?php if($post->img): ?><?php echo e(asset($post->img)); ?><?php endif; ?>" />
<meta property="og:url"           content="<?php echo e(Route('blog', ['slug'=>$post->slug, 'id'=>$post->id])); ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<?php echo e($post->name); ?>" />
<meta property="og:description"   content="<?php echo e($post->description); ?>" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .navbar-fixed-top{position: relative;background: #3399ff !important}
    .navbar-fixed-top .container{height: 60px}
    .content{padding: 30px 0px 50px 0px}
    p{margin:0 0 10px;}
    .title_lq{margin-bottom: 20px:}
    .ls_post{border-radius: 10px;padding: 40px 30px;background: #3399ff;box-shadow: 10px 10px 15px #595959}
    .blot_tit{font-size: 17pt;font-family: Roboto Bold;position: relative;left: 10px}
    .ls_post li{list-style-type: circle;padding: 20px 0px;border-bottom: 1px solid }
    .blot_tit::before{content: "";position: absolute;height: 3px;width:20px;top: 12px;background: #000;left: -30px}
    .ls_post a{padding: 5px 10px;font-size: 14pt}

</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if($post->img): ?>
<section class="mgtb15">
    <div class="container">
        <img style="width:100%;border-radius: 4px"  src="<?php echo e(asset($post->img)); ?>" >
    </div>
</section>
<?php endif; ?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="t-b"><?php echo e($post->title); ?></h1>
                <div class="mgtb30">

                    <?php echo $content[0]->content; ?>

                </div>
            </div>
            <div class="col-md-4 ">
                <div class="ls_post">
                    <p class="blot_tit">Bài viết gần đây</p>
                    <div class="mgtb20">
                        <ul>
                        <?php foreach($list as $item): ?>
                            <?php if($item->id != $id): ?>
                                <li><a href="<?php echo e(Route('blog', ['id'=>$item->id, 'slug' =>$item->slug])); ?>"><?php echo e($item->title); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>