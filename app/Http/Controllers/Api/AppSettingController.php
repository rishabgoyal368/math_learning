<?php

namespace App\Http\Controllers\Api;
use Validator;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AppSetting;
class AppSettingController extends Controller
{
    public function index(Request $request){
    	$data = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'type'      => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 200);
        }

        try {
            $app_setting = AppSetting::where('type',$data['type'])->get()->toArray();
            $response['code'] = 200;
            $response['data'] = $app_setting;
            $response['message'] = "App-Setting";
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            $response['code'] = 404;
            $response['status'] = $e->getMessage();
            $response['message'] = "missing parameters";
        }
        return $response;
    }
}
