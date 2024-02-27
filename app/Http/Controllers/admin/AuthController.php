<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            return redirect('dashboard');

        }else{
        return view('admin.auth.login');

        }
        return view('admin.login');
        return view('admin.auth.login');
    }

    public function customLogin(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        // $result = admin::where(['email'=>$email,'password'=>$password])->get();
        $result = User::where(['email'=>$email])->first();
        if($result)
        {
            if(Hash::check($request->post('password'),$result->password))
           {
             $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID', $result->id);
            return redirect('dashboard');
        }else{
            return back()->with('fail','Incorrect password');
            return redirect('admin');
        }

        }else{
            return back()->with('fail','Incorrect email or password');
            return redirect('admin');
        }
    }
    public function dashboard()
    {
            return view('admin.index');
    }
    //    public function createNew()
    // {

    //     $eBook = new User;
    //     $eBook->email = 'contactdilshadali@drdrehab.com';
    //     $eBook->password = Hash::make('DPTucpt@2024');
    //     $eBook->save();
    //     return redirect('E_book');
    // }


    // public function signOut(Request $request) {
    //     $request->session()->flush();
    //     Auth:: logout();

    //     return Redirect('admin')->with('success','Logout success');
    // }
}
