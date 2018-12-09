<?php

use Illuminate\Database\Seeder;
use App\Admins;
use App\Permission;
class AddFrameAndTransition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pvt = Permission::create([
              'name' => 'Phí vận chuyển sản phẩm',
              'key'  => str_slug('Phí vận chuyển sản phẩm', '_')
          ]);
        $td = Permission::create([
              'name' => 'Cấu hình tích điểm sản phẩm',
              'key'  => str_slug('Cấu hình tích điểm sản phẩm', '_')
          ]);
        $chemsp = Permission::create([
              'name' => 'Cấu hình email hết hàng sản phẩm',
              'key'  => str_slug('Cấu hình email hết hàng sản phẩm', '_')
          ]);
        $chem1 = Permission::create([
              'name' => 'Cấu hình email đơn hàng',
              'key'  => str_slug('Cấu hình email đơn hàng', '_')
          ]);
        $ttkh = Permission::create([
              'name' => 'Thông tin khách hàng',
              'key'  => str_slug('Thông tin khách hàng', '_')
          ]);
        
    }
}
