<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AppSetting;

class AppSettingController extends Controller
{
	public function index()
	{
		// $type = 1;
		$app_setting = AppSetting::first();
		return view('Admin.app_setting.list', compact('app_setting'));
	}

	public function add(Request $request)
	{
		if ($request->isMethod('post')) {
			$data = $request->all();
			$add_app_setting = AppSetting::Create($data);
			return redirect('admin/app-setting')->with('success', 'Data Added Successfully.');

			// $check_if_exists = AppSetting::where('type',$data['type'])->first();
			// if($check_if_exists == null){
			//     $add_app_setting = AppSetting::Create($data);
			// 	if($add_app_setting){
			// return redirect('admin/app-setting')->with('success', 'Data Added Successfully.');
			// 	}else{
			// 		return redirect('admin/app-setting')->with('error','CommonError');
			// 	}
			// }else{
			//     return redirect()->back()->with('error','Data is already added');
			// }
		}
		return view('Admin.app_setting.form');
	}

	public function edit(Request $request, $id)
	{
		if ($request->isMethod('post')) {
			$data = $request->all();
			unset($data['_token']);
			$add_app_setting = AppSetting::where('id', $id)->first();
			$add_app_setting->max_number = $data['max_number'];
			$add_app_setting->table_number = $data['table_number'];
			if ($add_app_setting->save()) {
				return redirect()->back()->with('success', 'Data Edited Successfully.');
			} else {
				return redirect('admin/app-setting')->with('error', 'CommonError');
			}
		}
		$app_setting_details = AppSetting::where('id', $id)->first();
		return view('Admin.app_setting.form', compact('app_setting_details'));
	}

	public function delete($id)
	{
		$delete = AppSetting::where('id', $id)->delete();
		if ($delete) {
			return redirect()->back()->with('success', 'Data Deleted successfully');
		} else {
			return redirect('admin/category')->with('error', 'CommonError');
		}
	}

	public function change_type(Request $request)
	{
		$data = $request->all();
		$type = $data['type_id'];
		$resp = [];
		if (!empty($type)) {
			$app_setting = AppSetting::where('type', $type)->first();
			if (!empty($app_setting)) {
				$resp['status'] = 'true';
				$resp['data'] 	= $app_setting;
			} else {
				$resp['status'] = 'false';
				$resp['msg']	=  'No Record Found';
			}
		} else {
			$resp['status'] = 'false';
			$resp['msg']	=  'Type not found';
		}
		return $resp;
	}
}
