<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class SmsVerificationController extends Controller
{
    public function showSmsVerifyForm()
    {
        return view('auth.sms-verify');
    }

    public function sendSmsCode(Request $request)
    {
        $request->validate([
            'phone' => ['regex:/^(0[789]0|0[1-9][0-9]{0,3})?[0-9]{4}?[0-9]{4}$/'],
            // 'phone' => 'required|string|max:20',
        ]);
        $phone = '+81' . substr($request->phone, 1);
        // dd($phone);
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio_number = env('TWILIO_PHONE_NUMBER');

        $client = new Client($sid, $token);

        try {
            $verificationCode = rand(100000, 999999);
            Session::put('sms_verification_code', $verificationCode);
            Session::put('sms_phone_number', $request->phone);
            $message = "PLO会員認証番号：".$verificationCode."\nこの番号を登録画面に入力して下さい。";
            // dd($message);
            $client->messages->create(
                $phone,
                [
                    'from' => $twilio_number,
                    'body' => $message
                ]
            );
            Session::flash('status', 'PLO会員認証コードを' . $request->phone . 'に送信しました。');
        } catch (\Exception $e) {
            return back()->withErrors(['phone' => 'SMSを送信できませんでした: ' . $e->getMessage()]);
        }

        return back()->with('success', 'PLO会員認証コードを携帯電話に送信しました。');
    }

    public function verifySmsCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|digits:6',
        ]);

        $storedCode = Session::get('sms_verification_code');
        $phoneNumber = Session::get('sms_phone_number');

        if ($request->code == $storedCode) {
            Session::forget('sms_verification_code');
            Session::put('sms_verified', true);

            return redirect()->route('register')->with('success', '携帯電話番号の認証が完了しました。PLO会員登録を続けて下さい。');
        } else {
            return back()->withErrors(['code' => '認証コードが間違っています。再度入力して下さい。']);
        }
    }
}
