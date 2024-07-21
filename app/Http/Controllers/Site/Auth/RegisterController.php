<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Utils\MessageUtil;
use App\Models\SiteUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function registerPage()
    {
        return view('site.auth.register');
    }

    public function register(RegisterRequest  $request)
    {
        $userCheck = SiteUser::query()
            ->where('email', $request->email)
            ->whereNotNull('email_verified_at')
            ->exists();


        if ($userCheck)
            return to_route('register')->with('fail', MessageUtil::MESSAGE_DUPLICATE_EMAIL);

        $code = rand(10000, 99999);
        $expired = time() + (60 * 10);



        $user = SiteUser::query()
            ->create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'email_code' => $code,
                'email_code_expired' => $expired,
            ]);

        $subject = "Turbo elan email tesdiqleme";
        $body = "Salam $request->name. Qeydiyyatdan kecdiyiniz ucun tesekkur edirik. <br> Hesabi tesdiqlemek ucun kod: $code. <br> Kode 10 deqiqe erzinde etibarlidir";

        Mail::send('mail.standart', compact('body'), function ($mail) use ($request, $subject) {
            $mail->to($request->email)->subject($subject);
        });


        return to_route('register.confirm', $user->id);
    }
    public function registerConfirmPage($user_id)
    {
        $check = SiteUser::query()
            ->whereNull('email_verified_at')
            ->whereNotNull('email_code')
            ->whereNotNull('email_code_expired')
            ->where('id', $user_id)
            ->exists();

        if (!$check)
            return back();

        return view('site.auth.register-confirm', compact('user_id'));
    }
    public function registerConfirm(Request $request, $user_id)
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
                'email_verified_at' => now(),
                'email_code' => null,
                'email_code_expired' => null,
            ]);

        return to_route('index');
    }
}
