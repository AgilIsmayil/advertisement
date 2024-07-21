<?php

namespace App\Http\Controllers\Dashboard\Advertisement;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarStoreRequest;
use App\Models\Advertisement;
use App\Models\AdvertisementPhoto;
use App\SelectData\AdvertisementStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommandController extends Controller
{
    public function approve($id)
    {
        $advertisement = Advertisement::query()
            ->from('advertisements as a')
            ->select(
                'a.id',
                'su.email',

            )
            ->where('a.status', 1)
            ->where('a.id', $id)
            ->join('site_users as su', 'su.id', 'a.created_by')
            ->first();

        if (!$advertisement)
            abort(404);

        Advertisement::query()
            ->where('id', $id)
            ->update([
                'status' => 2,
                'expired_at' => Carbon::now()->addMonth()->format('Y-m-d')
            ]);

        $body = 'Elaniniz derc edildi. Elanin linki: ';

        Mail::send('mail.standart', compact('body'), function ($mail) use ($advertisement) {
            $mail->to($advertisement->email)->subject('Elaniniz tesdiqlendi');
        });

        return redirect()->back();
    }
    public function reject($id)
    {
        $advertisement = Advertisement::query()
            ->from('advertisements as a')
            ->select(
                'a.id',
                'su.email',

            )
            ->where('a.status', 1)
            ->where('a.id', $id)
            ->join('site_users as su', 'su.id', 'a.created_by')
            ->first();

        if (!$advertisement)
            // return to_route('')->with('fail', 'Already approved');
            abort(404);

        Advertisement::query()
            ->where('id', $id)
            ->update([
                'status' => 0,
            ]);

        $body = 'Elaniniz derc edilmedi!';

        Mail::send('mail.standart', compact('body'), function ($mail) use ($advertisement) {
            $mail->to($advertisement->email)->subject('Elaniniz tesdiqlenmedi!');
        });

        return redirect()->back();
    }
}
