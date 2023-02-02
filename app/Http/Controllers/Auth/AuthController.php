<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // function home()
    // {
    //     if(Auth::user()->isRole == 'admin')
    //     {
    //         return redirect('admin/dashboard');
    //     }
    //     else
    //     {
    //         return redirect('/admin/user');
    //     }
    // }
    
    function viewRegister()
    {
        return view('auth.register');
    }

    function viewLogin()
    {
        return view('auth.login');
    }

    function viewforgotPassword()
    {
        return view('auth.forgot-password');
    }

    function viewVerifyEmail()
    {
        return view('auth.verify-email');
    }
    
    function viewResetPassword()
    {
        return view('auth.reset-password');
    }

    function register(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            //'terms' => 'required',
        ]);

        if(User::where('email', $request->email)->exists())
        {
            toastr()->error('This email is already registered.', 'Sorry!');            
           return back();
        }

        $user = new User();
        $user->name = $request->fullName;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->save();        
        $email = $request->email;

         //generate a pin number
         $pinNumber = random_int(10000, 99999);

         $verify_email = new VerifyEmail();        
         $verify_email->email = $request->email;
         $verify_email->token = $pinNumber;
         $verify_email->save();

         //sending email with token for verification
        $info = array('pin' => $pinNumber);                

        Mail::send('verify_mail', $info, function($message) use($email){
                $message->to($email)
                        ->subject('Token for email verification.');
        });

        toastr()->success('You are successfully registered. Please check your email and verify.', 'Congrats!');     
        return redirect()->route('viewVerifyEmail')->with(['email' => $email]);
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        //Check email

        $user = User::where('email', $request->email)->first();

        //Check Password
        if (!$user || !Hash::check($request->password, $user->password)) {
            toastr()->error('Inavild credentials', 'Sorry');
            return back();
        }

        Auth::login($user);

        if(Auth::user()->isRole == 'admin')
        {
            return redirect('/admin');
        }

        return redirect('/');

    }

    function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'pin_number' => 'required'
        ]);

        $email = $request->email;
        $verified_user = VerifyEmail::where('email', $request->email)->where('token', $request->pin_number)->first();

        if($verified_user)
        {
            $user = User::where('email', $request->email)->first();
            $user->email_verified_at = date('Y-m-d H:i');
            $user->update();

            $delete = VerifyEmail::where('email', $request->email)->delete();

            toastr()->success('You are a verified user now.', 'Congrats!');     
            return redirect()->route('login');
        }

        toastr()->error('Invalid Pin Number.', 'Sorry!');     
        return view('auth.verify-email',compact('email'));
    }

    function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        $email = $request->email;

        if(!User::where('email', $request->email)->exists())
        {
            toastr()->warning('This email does not exist.', 'Sorry');
            return redirect()->route('forgotPassword');
        }

        // generate a pin number
        $pinNumber = random_int(10000, 99999);

        // delete the email if it exists
        $var = DB::table('password_resets')->where('email', $request->email)->delete();

        // saving data in password reset table
        DB::table('password_resets')->insert(
            array(
                'email' => $request->email,
                'token' => $pinNumber,
            )
        );

        // sending email with pin number
        $info = array('pin' => $pinNumber);                

        Mail::send('forgot_pwd_mail', $info, function($message) use($email){
                $message->to($email)
                        ->subject('OTP to reset password');
        });
        
        return view('auth.reset-password',compact('email'));
        
    }

    function resetPassword(Request $request)
    {
        $request->validate([            
            'email' => 'required',
            'pin_number' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',            
        ]);

        if(DB::table('password_resets')->where('email', $request->email)->where('token', $request->pin_number)->first())
        {
            $user = User::where('email', $request->email)->first();
            $user->password = Hash::make($request->password);
            $user->update();

            DB::table('password_resets')->where('email', $request->email)->delete();

            toastr()->success('You have successfully reset your password.', 'Congrats!');     
            return redirect()->route('login');            
           
        }
        $email = $request->email;
            
        toastr()->error('Invalid Pin Number.', 'Sorry!');     
        return view('auth.reset-password',compact('email'));
    } 

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }    
}
