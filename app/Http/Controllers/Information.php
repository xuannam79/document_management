<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeAvatarRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\DepartmentAdmin\UserManagementRequest;
use App\Http\Requests\InformationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Information extends Controller
{
    public function index(){
        return view('information');
    }

    public function changePass(ChangePasswordRequest $request){
        $input = $request->all();
        $oldPass = User::where('id',Auth::user()->id)->first();
        if(Hash::check($input['oldpassword'],$oldPass['password']) == true){
            if ($input['newpassword'] == $input['confirmpassword']){
                User::where('id', Auth::user()->id)->update(['password' => bcrypt($input['newpassword'])]);

                return redirect()->route('information')->with('alert', 'Cập Nhật Thành Công');
            }
        }
        else{
            return redirect()->route('profile')->with('alert', 'Cập Nhật Thất Bại, Mật Khẩu Cũ Không Đúng');
        }

    }

    public function savePicture($input){
        if(isset($input))
        {
            $file = $input;
            $fileExtension = $input->getClientOriginalExtension();
            $newName = 'avatar-'.time().'.'.$fileExtension;
            $path = public_path('images/avatar');
            $input = $newName;
            $file->move($path, $newName);
            return $newName;
        }
    }

    public function ajaxFormEdit(){

        return view('ajax.information_form');
    }

    public function updateInfo(InformationRequest $request){
        $input = $request->all();
        User::where('id', Auth::user()->id)->update(['name' => $input['name'],'birth_date' => $input['birth_date'],'gender' => $input['gender'],'address' => $input['address'],'phone' => $input['phone']]);

        return redirect()->route('profile')->with('alert', 'Cập Nhật Thành Công');
    }

    public function changeAvatar(ChangeAvatarRequest $request){
        $input = $request->avatar;
        $input = $this->savePicture($input);

        User::where('id', Auth::user()->id)->update(['avatar' =>$input]);

        return redirect()->route('profile')->with('alert', 'Cập Nhật Thành Công');
    }
}
