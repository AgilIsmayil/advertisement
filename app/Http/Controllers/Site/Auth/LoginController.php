<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Utils\MessageUtil;
use App\Models\SiteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('site.auth.login');
    }

    public function login(Request  $request)
    {
        $userCheck = SiteUser::query()
            ->select('id')
            ->where('email', $request->email)
            ->whereNotNull('email_verified_at')
            ->first();


        if (!$userCheck)
            return to_route('login')->with('fail', MessageUtil::MESSAGE_NOT_FOUND);

        $code = rand(10000, 99999);
        $expired = time() + (60 * 10);



        $user = SiteUser::query()
            ->where('id', $userCheck->id)
            ->update([
                'email_code' => $code,
                'email_code_expired' => $expired,
            ]);

        $subject = "Turbo    email tesdiqleme";
        $body = "Turbo saytina giris ucun kod: $code. <br> Kod 10 deqiqe erzinde etibarlidir";

        Mail::send('mail.standart', compact('body'), function ($mail) use ($request, $subject) {
            $mail->to($request->email)->subject($subject);
        });


        return to_route('login.confirm', $userCheck->id);
    }
    public function loginConfirmPage($user_id)
    {
        $check = SiteUser::query()
            ->whereNotNull('email_code')
            ->whereNotNull('email_code_expired')
            ->where('id', $user_id)
            ->exists();

        if (!$check)
            return to_route('login');

        return view('site.auth.login-confirm', compact('user_id'));
    }
    public function loginConfirm(Request $request, $user_id)
    {
        $check = SiteUser::query()
            ->where('id', $user_id)
            ->where('email_code', $request->code)
            ->first();

        if (!$check)
            return redirect()->back()->with('fail', MEssageUtil::MESSAGE_CODE_WRONG);

        if ($check->email_code_expired < time())
            return redirect()->back()->with('fail', MessageUtil::MESSAGE_CODE_EXPIRED);


        SiteUser::query()
            ->where('id', $user_id)
            ->update([
                'email_code' => null,
                'email_code_expired' => null,
            ]);

        Auth::guard('site')->loginUsingId($user_id);

        return to_route('index');
    }
    public function logout()
    {
        Auth::guard('site')->logout();

        return to_route('index');
    }
}
