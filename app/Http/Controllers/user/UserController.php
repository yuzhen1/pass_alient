<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //注册
    public function reg(){
        return view('user/reg');
    }

    public function reg_do(){
        $data =[
            'uname'=>$_POST['user_name'],
            'pwd'=>$_POST['pwd']
        ];
        $str = json_encode($data);
        $method = 'AES-256-CBC';
        $key = 'abcdefg';
        $options = OPENSSL_RAW_DATA;
        $iv = 'd89fb057f6d44r5z';
        $enc_str = openssl_encrypt($str,$method,$key,$options,$iv);
        $after_str = base64_encode($enc_str);
        $url = 'http://pass.api.com/reg';
        $this->curl($url,$after_str);
    }

    //登录
    public function login(){
        return view('user/login');
    }

    public function curl($url,$str){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$str);
        $output = curl_exec($ch);
        print_r($output);
        curl_close($ch);
    }
}
