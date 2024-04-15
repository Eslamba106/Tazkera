<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\SupportRequest;

class SupportTeamController extends Controller
{

    public function store(SupportRequest $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::SUPPORT);
        }

        return redirect()->back()->withErrors(
            [
                'loginError' => 'خطأ في البريد الالكتروني او كلمة المرور . من فضلك حاول مرة اخري',
            ]
        );
    }


    public function destroy(Request $request)
    {
        Auth::guard('support_team')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // public function login(SupportRequest $request){
    //     // dd($request);
    //     if(auth()->guard('support_team')->attempt(['email'=>$request->input('email') , 'password'=>$request->input('password')])){
    //         return redirect()->route('support.dashboard');
    //     };

        
    //     // return redirect()->route('login-page');
    //     return back()->withErrors([
    //         'loginError' => 'خطأ في البريد الالكتروني او كلمة المرور . من فضلك حاول مرة اخري',
    //     ]);
    // }
    // public function logout(){
    //     auth()->logout();
    //     return redirect()->route('login');
    // }
}
