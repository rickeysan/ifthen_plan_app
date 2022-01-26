<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        logger('PfofileControllerのindexです');
        $user_info = User::where('id',Auth::id())->get();
        // dd($user_info);
        return view('/profile',compact('user_info'));
    }

    public function update(Request $request, $id) {
        logger('PrifileControllerのupdateメソッドです');
        $validate_rule = [
            'name'=>'required',
            'email'=>'required | email',
            'image' => 'file|image|mimes:png,jpeg',
            'introduction'=>'max:256',
        ];
        $this->validate($request,$validate_rule);
        $param = $request->all();
        // dd($upload_image);
        // dd($param);
        unset($param['_method']);
        unset($param['_token']);
        $upload_image = $param['image'];

        // dd($user);
        
        if($upload_image) {
            logger('画像がアップロードされました');
			//アップロードされた画像を保存する
			$path = $upload_image->store('uploads',"public");
			//画像の保存に成功したらDBに記録する
			if($path){
                logger('画像の保存に成功しました');
                logger($path);
                $param['file_name'] = $upload_image->getClientOriginalName();
                $param['file_path'] = $path;
			}
		}
        $user = User::find(Auth::id());
        $user->fill($param)->save();


        return redirect('home');
    }

}
