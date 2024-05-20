<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class RoutesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('routes')->insert([
				'route_name'  => 'login',
				'route_title' => 'Đăng nhập cho Admin'
			]);

		DB::table('routes')->insert([
				'route_name'  => 'home',
				'route_title' => 'Trang Home cho Người dùng'
			]);

		DB::table('routes')->insert([
				'route_name'  => 'AddSanpham',
				'route_title' => 'Thêm sản phẩm'
			]);

//		DB::table('routes')->insert([
//				'route_name'  => 'attendence_index',
//				'route_title' => 'View Điểm Danh'
//			]);
//
//		DB::table('routes')->insert([
//				'route_name'  => 'attendence_save',
//				'route_title' => 'Lưu Kết Quả Điểm Danh'
//			]);
	}
}
