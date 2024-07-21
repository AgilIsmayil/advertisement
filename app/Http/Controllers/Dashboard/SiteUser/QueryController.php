<?php

namespace App\Http\Controllers\Dashboard\SiteUser;

use App\Http\Controllers\Controller;
use App\Models\SiteUser;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index()
    {
        $users =  SiteUser::query()
            ->whereNotNull('email_verified_at')
            ->paginate(10);

        return view('dashboard\siteUser\index', compact('users'));
    }
    public function reportMonthly()
    {
        $data = SiteUser::query()
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('CoUNT(id) as count')

            )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
        $month = [];
        $values = [];

        foreach ($data as $datum) {
            // $datum->month = $this->getMonthById($datum->month);
            $dateObj = \DateTime::createFromFormat('!m', $datum->month);
            $datum->month = $dateObj->format('F');

            $month[] = $datum->month;
            $values[] = $datum->count;
        }



        return view('dashboard.siteUser.monthly-report', compact('month', 'values'));
    }

    private function getMonthBYId($monthId)
    {
        switch ($monthId) {
            case 5:
                return "May";
            case 6:
                return "Iyun";
            case 7:
                return "Iyul";
        }
    }
}
