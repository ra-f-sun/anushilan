<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendVerificationCodeEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgetPasswordController extends Controller
{
    public function  mailSubmitPage()
    {
        return view('frontend.reset-password.send-mail');
    }

    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
        ]);
        session()->put('email', $request->email);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 200);
        } else {
            $checkEmail = User::where('email', $request->email)->exists();
            if ($checkEmail) {
                $code = rand(10000, 99999);
                $storeRequestedData = DB::table('password_reset_tokens')->insert([
                    'email' => $request->email,
                    'token' => $code,
                    'created_at' => now()
                ]);

                if ($storeRequestedData) {
                    $sendMail = Mail::to($request->email)->send(new SendVerificationCodeEmail($code));
                    if ($sendMail) {
                        return redirect()->route('submit.otp');
                    } else {
                        return response()->json(['status' => 'failed', 'message' => 'Failed to send email'], 200);
                    }
                } else {
                    return response()->json(['status' => 'failed', 'message' => 'Failed to generate verification code'], 200);
                }
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Your given email is not exist in our records'], 200);
            }
        }
    }

    public function submitOtpPage()
    {
        $email = session()->get('email');
        return view('frontend.reset-password.submit-otp', compact('email'));
    }

    public function checkVerificationCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:255'],
            'token' => ['required'],
        ]);
        session()->put('email', $request->email);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 422);
        }
        $records = DB::table('password_reset_tokens')->where([['email', $request->email], ['token', $request->token]]);
        if ($records->exists()) {
            $difference = Carbon::now()->diffInSeconds($records->first()->created_at);
            if ($difference > 600) {
                return response()->json(['success' => false, 'message' => "Token Expired"], 400);
            }
            DB::table('password_reset_tokens')->where([['email', $request->email], ['token', $request->token]])->delete();

            return redirect()->route('new.password')->with(['email' => $request->email,]);
        } else {

            return redirect()->back()->with('error', 'Invalid!');
        }
    }
    public function newPasswordForm()
    {
        $email = session()->get('email');
        return view('frontend.reset-password.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.exists' => 'The provided email is not registered in our system.',
            'password.min' => 'The password must be at least 8 characters long.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()
                ->with('error', 'User not found.')
                ->withInput();
        }
    
        $user->update([
            'password' => Hash::make($request->password)
        ]);
    
        return redirect()->route('login')
            ->with('success', 'Password reset successful. You can now log in with your new password.');
    }
}
