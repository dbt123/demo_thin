<?php

use Illuminate\Database\Seeder;
use App\Admins;
use App\Permission;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dev= Admins::create([
        	'username' => 'dev',
        	'password' => md5('admin'),
        	 'phone'   => '34234234234',
        	 'address' => 'E5 Quỳnh Mai Hai Bà Trưng Hà Nội',
        	  'level'  => 1,
        	  'status' => 1,
        	]);
         $admin= Admins::create([
        	'username' => 'admin',
        	'password' => md5('admin'),
        	 'phone'   => '34234234234',
        	 'address' => 'E5 Quỳnh Mai Hai Bà Trưng Hà Nội',
        	  'level'  => 1,
        	  'status' => 1,
        	]);


         //phan quyen post

         $createpost = Permission::create([
              'name' => 'Đăng bài viết',
              'key'  => str_slug('Đăng bài viết', '_')
         	]);
         $editpost =  Permission::create([
              'name' => 'Sửa bài viết',
              'key'  => str_slug('Sửa bài viết', '_')
         	]);
         $savepost =  Permission::create([
              'name' => 'Lưu bài viết',
              'key'  => str_slug('Lưu bài viết', '_')
         	]);
         $delpost = Permission::create([
              'name' => 'Xóa bài viết',
              'key'  => str_slug('Xóa bài viết', '_')
         	]);
         $createmenupost =  Permission::create([
              'name' => 'Thêm danh mục bài viết',
              'key'  => str_slug('Thêm danh mục bài viết', '_')
         	]);
         $editmenupost =  Permission::create([
              'name' => 'Sửa danh mục bài viết',
              'key'  => str_slug('Sửa danh mục bài viết', '_')
         	]);
         $delmenupost =  Permission::create([
              'name' => 'Xóa danh mục bài viết',
              'key'  => str_slug('Xóa danh mục bài viết', '_')
         	]);
         $quanlytagbaiviet =  Permission::create([
              'name' => 'Quản lý tags bài viết',
              'key'  => str_slug('Quản lý tags bài viết', '_')
         	]);
         // sản phẩm
        $createproduct =  Permission::create([
              'name' => 'Đăng sản phẩm',
              'key'  => str_slug('Thêm sản phẩm', '_')
         	]);
         $editproduct =  Permission::create([
              'name' => 'Sửa sản phẩm',
              'key'  => str_slug('Sửa sản phẩm', '_')
         	]);
         $saveproduct =  Permission::create([
              'name' => 'Lưu sản phẩm',
              'key'  => str_slug('Lưu sản phẩm', '_')
         	]);
         $delproduct = Permission::create([
              'name' => 'Xóa sản phẩm',
              'key'  => str_slug('Xóa sản phẩm', '_')
         	]);
         $createmenuproduct =  Permission::create([
              'name' => 'Thêm danh mục sản phẩm',
              'key'  => str_slug('Thêm danh mục sản phẩm', '_')
         	]);
         $editmenuproduct =  Permission::create([
              'name' => 'Sửa danh mục sản phẩm',
              'key'  => str_slug('Sửa danh mục sản phẩm', '_')
         	]);
         $delmenuproduct =  Permission::create([
              'name' => 'Xóa danh mục sản phẩm',
              'key'  => str_slug('Xóa danh mục sản phẩm', '_')
         	]);
         $quanlytagbaiviet =  Permission::create([
              'name' => 'Quản lý tags sản phẩm',
              'key'  => str_slug('Quản lý tags sản phẩm', '_')
         	]);

         //slide 

         $createslide =  Permission::create([
              'name' => 'Thêm slide',
              'key'  => str_slug('Thêm slide', '_')
         	]);
         $editslide =  Permission::create([
              'name' => 'Sửa slide',
              'key'  => str_slug('Sửa slide', '_')
         	]);
         $delslide =  Permission::create([
              'name' => 'Xóa slide',
              'key'  => str_slug('Xóa slide', '_')
         	]);
       
         //menu

          $createmenu =  Permission::create([
              'name' => 'Tạo menu',
              'key'  => str_slug('Tạo menu', '_')
         	]);
         $editmenu =  Permission::create([
              'name' => 'Sửa menu',
              'key'  => str_slug('Sửa menu', '_')
         	]);
         $delmenu =  Permission::create([
              'name' => 'Xóa menu',
              'key'  => str_slug('Xóa menu', '_')
         	]);

         //layout
         $createLayout =  Permission::create([
              'name' => 'Thêm layout',
              'key'  => str_slug('Thêm layout', '_')
         	]);
         $editlayout =  Permission::create([
              'name' => 'Sửa layout',
              'key'  => str_slug('Sửa layout', '_')
         	]);

         // thanh vien
         $createtv =  Permission::create([
              'name' => 'Thêm thành viên',
              'key'  => str_slug('Thêm thành viên', '_')
         	]);
         $edittv =  Permission::create([
              'name' => 'Sửa thành viên',
              'key'  => str_slug('Sửa thành viên', '_')
         	]);
         $xoatv =  Permission::create([
              'name' => 'Xóa thành viên',
              'key'  => str_slug('Xóa thành viên', '_')
         	]);
         $phanquyentv =  Permission::create([
              'name' => 'Phân quyền thành viên',
              'key'  => str_slug('Phân quyền thành viên', '_')
         	]);
        // lien hệ
        $xemlienhe =  Permission::create([
              'name' => 'Xem liên hệ',
              'key'  => str_slug('Xem liên hệ', '_')
         	]);
         $xoalienhe =  Permission::create([
              'name' => 'Xóa liên hệ',
              'key'  => str_slug('Xóa liên hệ', '_')
         	]);
       $admin->attachPermissions([ $createpost, $editpost,  $savepost,  $delpost, $createmenupost, $editmenupost, $delmenupost,$quanlytagbaiviet, $createproduct, $editproduct, $saveproduct, $delproduct , $createmenuproduct, $editmenuproduct, $delmenuproduct, $quanlytagbaiviet, $createslide,  $editslide,  $delslide, $createmenu, $editmenu, $delmenu, $createLayout,$editlayout, $createtv, $edittv, $xoatv, $phanquyentv, $xemlienhe, $xoalienhe]);
   }
}
