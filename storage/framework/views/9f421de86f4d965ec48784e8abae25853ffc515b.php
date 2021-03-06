<?php $__env->startSection('title', $category->name); ?>
<?php $__env->startSection('meta'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style type="text/css">
    .navbar-fixed-top{position: relative;background: #3399ff !important}
    .navbar-fixed-top .container{height: 60px}
    .content{padding: 30px 0px 50px 0px}
    p{margin:0 0 10px;}
    .title_lq{margin-bottom: 20px:}
    .ls_post{border-radius: 10px;padding: 40px 30px;background: #f4f4f4;box-shadow: 6px 6px 7px #ccc}
    .blot_tit{font-size: 17pt;font-family: Roboto Bold;position: relative;left: 10px}
    .ls_post li{list-style-type: circle;padding: 20px 0px;border-bottom: 1px solid }
    .blot_tit::before{content: "";position: absolute;height: 3px;width:20px;top: 12px;background: #000;left: -30px}
    .ls_post a{padding: 5px 10px;font-size: 14pt}
    .mgtb30 ul, .mgtb30 ol{padding-left: 40px}
    .img-block, .title-block{float: left;}
    .header img{width: 100%}
    .header-title{font-size: 16px;text-transform: uppercase;}
    .img-block{width:40%;float: left;}
    .contet-block{width:60%;float: left;padding-left: 15px}
    .contet-block > .title{margin-bottom: 5px;max-height: 46px;overflow: hidden;font-size: 12px;text-transform: uppercase;}
    .contet-block > p{max-height: 92px;overflow: hidden;}
    .item{border-top: 1px solid #ccc}
    @media(max-width:767px){
        .contet-block > p{max-height: 50px;}
        .item{padding-bottom: 20px;padding-top: 20px}
    }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <?php $postS = $items[0];?>
                <div class="header">
                    <a href="<?php echo e(Route('blog', ['id' => $postS->id, 'slug' => $postS->slug])); ?>">
                        <div class="">
                            <img src="<?php echo e($postS->img? $postS->img: 'https://i-thethao.vnecdn.net/2018/11/08/455934564790583259382368098246-8657-4407-1541685910_500x300.jpg'); ?>">
                        </div>
                        <h1 class="mgtb20 header-title"><?php echo e($postS->title); ?></h1>
                    </a>
                </div>
                <?php foreach($items as $post): ?>
                    <?php if($items[0] != $post): ?>
                    <?php $date = new DateTime($post->created_at);?>
                    <div class="content item" style="">
                        <div class="img-block">
                            <a href="<?php echo e(Route('blog', ['id' => $post->id, 'slug' => $post->slug])); ?>"><img src="<?php echo e($post->img? $post->img: 'https://i-thethao.vnecdn.net/2018/11/08/455934564790583259382368098246-8657-4407-1541685910_500x300.jpg'); ?>"></a>
                        </div>
                        <div class="contet-block">
                            <i style="color: #595959;font-size: 8pt"><?php echo e($date->format('d/m/Y ')); ?></i>
                            <h3 class="title" style=""><a href="<?php echo e(Route('blog', ['id' => $post->id, 'slug' => $post->slug])); ?>"><?php echo e($post->title); ?></a></h3>
                            <p><?php echo e($post->description); ?></p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="ls_post">
                    <p class="blot_tit">Bài viết gần đây</p>
                    <div class="mgtb20">
                        <ul>
                        <?php if($posts): ?>
                            <?php foreach($posts as $item): ?>
                                <li><a href="<?php echo e(Route('blog', ['id'=>$item->id, 'slug' =>$item->slug])); ?>"><?php echo e($item->title); ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>