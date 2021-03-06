  <style type="text/css">
  .nav-text{
    font-size: 10pt;
    font-family: 'Roboto';
  }
  .nav-text::first-letter{
    text-transform: uppercase;
  }

</style>
<?php $route_name =  Request::route()->getName(); 

$active = 0;
if($route_name == "layout.add-group" || $route_name == "layout.view"){
  $active = 1;
}
if(in_array($route_name,['dev.slide','dev.list.category','dev.list.category.product','dev.list.category.product.super','admin.config','admin.config.font','admin.config.frame','dev.form','dev.thumbnail','category.product.add','editor.user.add.admin','cate.products.edit'])){
  $active = 2;
}
if(in_array($route_name,['product.create.filter','product.list.product','folder.product.cate','folder.product','order.list','list.transpost','tags.product.list','comments.product.list','list.customer','product.create.product','frame.edit.frame','frame.create.frame','order.add','order.type','order.show','order.search','search.product','list.transpost','product.tags.detail.cate','comments.product.list.done','search.customer','admin.list.category.product','cate.products.detail'])){
  $active = 3;
}
if(in_array($route_name,['posts.add','posts.edit','posts.list','category.add','category.edit','category.detail','category.list','comments.post.list','comments.post.list.done','tags.list','tags.detail.cate'])){
  $active = 4;
}
if(in_array($route_name,['form.manage'])){
  $active = 5;
}if(in_array($route_name,['tu.van'])){
  $active = 10;
}
if(in_array($route_name,['menu.add','menu.list'])){
  $active = 6;
}
if(in_array($route_name,['slide.manage'])){
  $active = 7;
}
if(in_array($route_name,['layout.manage'])){
  $active = 8;
}
if(in_array($route_name,['editor.add','editor.list','editor.edit','editor.user.add'])){
  $active = 9;
}
?>
  <ul class="nav" ui-nav>
   
    <li >
      <a href="<?php echo e(url('quan-tri')); ?>" ui-sref="app.dashboard">
        <span class="nav-icon">
          <i class="material-icons">&#xe3fc;<span ui-include="'<?php echo e(asset('backend/assets/images/i_1.svg')); ?>'"></span></i>
        </span>
        <span class="nav-text">Bảng quản trị</span>
      </a>
    </li>
    <?php if(session('admin')->can('dev')): ?>
    <li <?php if($active ==1): ?> class="active" <?php endif; ?>>
      <a>
        <span class="nav-caret">
          <i class="fa fa-caret-down"></i>
        </span>   
       
        <span class="nav-icon">
          <i class="material-icons">&#xe8e8;<span ui-include="'<?php echo e(asset('backend/assets/images/i_1.svg')); ?>'"></span></i>
        </span>
        <span class="nav-text">DEV Layout</span> 
      </a>
      <ul class="nav-sub">
        <li ui-sref-active="active">
          <a href="<?php echo e(route('layout.add-group')); ?>"><span class="nav-text">Create Group Layout</span></a>
        </li>
         <?php $layout_list = DB::table('group_layouts')->get();?>
        <?php foreach($layout_list as $item): ?>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('layout.view',['id'=>$item->id])); ?>"><span class="nav-text"><?php echo e($item->name); ?></span></a>
        </li>
        <?php endforeach; ?>

      </ul>
    </li>
    <li <?php if($active == 2): ?> class="active" <?php endif; ?>>
      <a>
        <span class="nav-caret">
          <i class="fa fa-caret-down"></i>
        </span>
       
        <span class="nav-icon">
          <i class="material-icons">&#xe8b9;<span ui-include="'<?php echo e(asset('backend/assets/images/i_1.svg')); ?>'"></span></i>
        </span>
        <span class="nav-text">DEV Config</span>
      </a>
      <ul class="nav-sub">
        <li ui-sref-active="active">
          <a href="<?php echo e(route('dev.slide')); ?>"><span class="nav-text">Tạo Slide</span></a>
        </li>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('dev.form')); ?>"><span class="nav-text">Tạo Form</span></a>
        </li>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('admin.config.font')); ?>"><span class="nav-text">Font chữ</span></a>
        </li>
        <!-- <li ui-sref-active="active">
          <a href="<?php echo e(route('dev.list.category.product.super')); ?>"><span class="nav-text">Category Sản phẩm</span></a>
        </li> -->
        <li ui-sref-active="active" >
          <a href="<?php echo e(route('dev.list.category.product')); ?>"><span class="nav-text">Nhóm sản phẩm</span></a>
        </li>
        <li ui-sref-active="active">
           <a href="<?php echo e(route('admin.config.frame')); ?>"><span class="nav-text">Config Thuộc Tính</span></a>
         </li>
         <li ui-sref-active="active">
          <a href="<?php echo e(route('dev.list.category')); ?>"><span class="nav-text">Category Bài viết</span></a>
        </li>
        <?php $idadmin= App\Admins::where('id','>', 1)->first();?>
        <?php if($idadmin): ?>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('editor.user.add.admin')); ?>"><span class="nav-text">Phân quyền cho admin</span></a>
        </li>
        <?php endif; ?>
       
        
        <li ui-sref-active="active">
          <a href="<?php echo e(route('dev.thumbnail')); ?>"><span class="nav-text">Thumbnail ảnh</span></a>
        </li>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('admin.config')); ?>"><span class="nav-text">Thông tin hệ thống</span></a>
        </li>
      </ul>
    </li>
    <?php endif; ?>
     <?php if(session('admin')->can(['them_san_pham', 'sua_san_pham', 'luu_san_pham', 'xoa_san_pham', 'them_danh_muc_san_pham', 'sua_danh_muc_san_pham','xoa_danh_muc_san_pham', 'quan_ly_tags_san_pham','them_thuoc_tinh','sua_thuoc_tinh','xoa_thuoc_tinh','quan_ly_binh_luan_san_pham'])): ?>
    <li <?php if($active == 3): ?> class="active" <?php endif; ?>>
      <a>
        <span class="nav-caret">
          <i class="fa fa-caret-down"></i>
        </span>
       
        <span class="nav-icon">
          <i class="material-icons">&#xe547;</i>
        </span>
        <span class="nav-text">Sản phẩm</span>
      </a>
      <ul class="nav-sub">
        <?php if(session('admin')->can('them_thuoc_tinh') || session('admin')->can('sua_thuoc_tinh') || session('admin')->can('xoa_thuoc_tinh')): ?>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('product.create.filter')); ?>"><span class="nav-text">Thuộc tính</span></a>
        </li>
      <?php endif; ?>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('product.create.feature')); ?>"><span class="nav-text">Đặc tính</span></a>
        </li>
        <li ui-sref-active="active">
        	<!-- phong -->
          <a href="<?php echo e(route('product.list.product')); ?>"><span class="nav-text">Danh sách</span></a>
        </li>
        <li ui-sref-active="active" >
          <a href="<?php echo e(route('folder.product.cate')); ?>"><span class="nav-text">Danh mục</span></a>
        </li>
        <?php if( session('admin')->can('xem_don_hang') || session('admin')->can('them_don_hang')  || session('admin')->can('xoa_don_hang') ||  session('admin')->can('xu_li_don_hang') ): ?>
        <li ui-sref-active="active" >
          <a href="<?php echo e(route('admin.list.category.product')); ?>"><span class="nav-text">Nhóm sản phẩm</span></a>
        </li>
        <li ui-sref-active="active" >
          <a href="<?php echo e(route('order.list')); ?>"><span class="nav-text">Đơn hàng</span></a>
        </li>
        <?php endif; ?>
        <?php if(session('admin')->can('phi_van_chuyen_san_pham')): ?>
        <li ui-sref-active="active" >
          <a href="<?php echo e(route('list.transpost')); ?>"><span class="nav-text">Vận chuyển</span></a>
        </li>
        <?php endif; ?>
         <?php if(session('admin')->can('quan_ly_binh_luan_san_pham')): ?>
           <li ui-sref-active="active" >
            <a href="<?php echo e(route('comments.product.list')); ?>"><span class="nav-text">Comment</span></a>
          </li> 
        <?php endif; ?>
         <?php if(session('admin')->can('thong_tin_khach_hang')): ?>
        <li ui-sref-active="active">
          <a href="<?php echo route('list.customer'); ?>"><span class="nav-text">Khách Hàng</span></a>
        </li>
        <?php endif; ?>
      </ul>
    </li>
    <?php endif; ?>

     <?php if(session('admin')->can(['dang_bai_viet', 'sua_bai_viet', 'xoa_bai_viet', 'luu_bai_viet', 'them_danh_muc_bai_viet', 'sua_danh_muc_bai_viet','xoa_danh_muc_bai_viet', 'quan_ly_tags_bai_viet','quan_ly_binh_luan_bai_viet'])): ?>
    <li <?php if($active == 4): ?> class="active" <?php endif; ?>>
      <a>
        <span class="nav-caret">
          <i class="fa fa-caret-down"></i>
        </span>
       
        <span class="nav-icon">
          <i class="material-icons">&#xe873;</i>
        </span>
        <span class="nav-text">Bài viết</span>
      </a>
        <ul class="nav-sub">
        
          <li ui-sref-active="active">
            <a href="<?php echo e(route('posts.list')); ?>" ><span class="nav-text">Danh sách </span></a>
          </li>
          
          <?php if(session('admin')->can('quan_ly_tags_bai_viet')): ?>
           <li ui-sref-active="active" >
            <a href="<?php echo e(route('tags.list')); ?>"><span class="nav-text">Tags</span></a>
          </li> 
          <?php endif; ?>
         
          
          <li ui-sref-active="active" >
            <a href="<?php echo e(route('category.list')); ?>"><span class="nav-text">Danh mục</span></a>
          </li>
          <?php if(session('admin')->can('quan_ly_binh_luan_bai_viet')): ?>
             <li ui-sref-active="active" >
              <a href="<?php echo e(route('comments.post.list')); ?>"><span class="nav-text">Comment</span></a>
            </li> 
          <?php endif; ?>
        </ul>
    </li>
    <?php endif; ?>
    <?php if(session('admin')->can(['xem_lien_he'])): ?>
    <li <?php if($active == 10): ?> class="active" <?php endif; ?>>
      <a>
        <span class="nav-caret">
          <i class="fa fa-caret-down"></i>
        </span>
       
        <span class="nav-icon">
          <i class="material-icons">&#xe0cf;</i>
        </span>
        <span class="nav-text">Form</span>
      </a>
        <ul class="nav-sub">
             <li ui-sref-active="active">
            <a href="<?php echo e(Route('tu.van')); ?>"><span class="nav-text">Tư vấn</span></a>
          </li>
        </ul>
    </li>
    <?php endif; ?>
     <?php if(session('admin')->can(['tao_menu', 'sua_menu', 'xoa_menu'])): ?>
    <li <?php if($active == 6): ?> class="active" <?php endif; ?>>
      <a>
        <span class="nav-caret">
          <i class="fa fa-caret-down"></i>
        </span>
       
        <span class="nav-icon">
          <i class="material-icons">&#xe5d2;</i>
        </span>
        <span class="nav-text">Menu</span>
      </a>
      <ul class="nav-sub">
       <?php if(session('admin')->can('tao_menu')): ?>
          <li ui-sref-active="active">
            <a href="<?php echo e(route('menu.add')); ?>"><span class="nav-text">Tạo menu</span></a>
          </li>
        <?php endif; ?>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('menu.list')); ?>" ><span class="nav-text">Danh sách menu</span></a>
        </li>
      </ul>
    </li>
    <?php endif; ?>
     <?php if(session('admin')->can(['them_slide', 'sua_slide', 'xoa_slide'])): ?>
    <li <?php if($active == 7): ?> class="active" <?php endif; ?>>
      <a>
        <span class="nav-caret">
          <i class="fa fa-caret-down"></i>
        </span>
       
        <span class="nav-icon">
          <i class="material-icons">&#xe40b;</i>
        </span>
        <span class="nav-text">Slide</span>
      </a>
      <ul class="nav-sub">
        <?php $slide_list = App\Slide::getListSlide();?>
        <?php foreach($slide_list as $item): ?>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('slide.manage',['id'=>$item->id])); ?>"><span class="nav-text"><?php echo e($item->name); ?></span></a>
        </li>
        <?php endforeach; ?>
      </ul>
    </li>
    <?php endif; ?>
     <?php if(session('admin')->can(['tao_layout', 'sua_slide', 'xoa_slide'])): ?>
    <li <?php if($active == 8): ?> class="active" <?php endif; ?>>
      <a>
        <span class="nav-caret">
          <i class="fa fa-caret-down"></i>
        </span>
        <span class="nav-icon">
          <i class="material-icons">&#xe051;</i>
        </span>
        <span class="nav-text">Layout</span>
      </a>
      <ul class="nav-sub">
        <?php $layout_list = DB::table('group_layouts')->get();?>
        <?php foreach($layout_list as $item): ?>
        <?php if(session('admin')->can('sua_layout')): ?>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('layout.manage',['id'=>$item->id])); ?>"><span class="nav-text"><?php echo e($item->name); ?></span></a>
        </li>
        <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </li>
    <?php endif; ?>
    <?php if(session('admin')->can(['them_thanh_vien', 'sua_thanh_vien', 'phan_quyen_thanh_vien','xoa_thanh_vien'])): ?>
    <li  <?php if($active == 9): ?> class="active" <?php endif; ?>>
      <a href="#">
      <span class="nav-caret">
          <i class="fa fa-caret-down"></i>
      </span>
      <span class="nav-icon"><i class="material-icons">&#xe7ef;</i></span>
      <span class="nav-text">Phân Quyền</span>
      </a>
      <ul class="nav-sub">
      <?php if(session('admin')->can('them_thanh_vien')): ?>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('editor.add')); ?>"><span class="nav-text">Thêm Thành Viên</span></a>
        </li>
      <?php endif; ?>
        <li ui-sref-active="active">
          <a href="<?php echo e(route('editor.list')); ?>" ><span class="nav-text">Danh sách Thành Viên</span></a>
        </li>
      </ul>
    </li>
    <?php endif; ?>
    <li class="no-bg">
      <a href="<?php echo e(route('admin.edit')); ?>">
      <span class="nav-icon"><i class="material-icons">&#xe853;</i></span>
      <span class="nav-text">Cá nhân</span>
      </a>
    </li>
    <?php if(session('admin')->level < 2): ?>
    <li class="no-bg">
      <a href="<?php echo e(route('admin.system.edit')); ?>">
      <span class="nav-icon"><i class="material-icons">&#xe39e;</i></span>
      <span class="nav-text">Hệ Thống</span>
      </a>
    </li>
    <?php endif; ?>
    <li class="no-bg"><a href="<?php echo e(url(route('quan-tri/dang-xuat'))); ?>"><span class="nav-icon"><i class="material-icons"></i></span> <span class="nav-text">Đăng xuất</span></a></li>
  </ul>