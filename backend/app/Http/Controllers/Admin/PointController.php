<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Point;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PointController extends Controller
{
    public function listAll(Request $request)
    {

        $query = Point::query()
        ->whereHas('employee')
        ->orderBy('point_date', 'desc');

        return $query->with('employee.admin')->paginate(20)->withQueryString();
    }

    public function listPoint(Request $request)
    {

        $adminId = Auth::guard('admins')->user()->id;
        $start_date = $request->start_date ? Carbon::parse($request->start_date)->startOfDay() : Carbon::today()->startOfDay();
        $end_date = $request->end_date ? Carbon::parse($request->end_date)->endOfDay() : Carbon::today()->endOfDay();

        return DB::select("
            SELECT
                a.id AS id,
                a.point_date AS point_date,
                b.name AS name,
                b.job_position AS job,
                b.birthday AS birthday,
                c.name AS admin
            FROM `points` `a`
                    INNER JOIN `employees` `b` ON `a`.`employee_id` = `b`.`id`
                    INNER JOIN `admins` `c` ON `b`.`admin_id` = `c`.`id`
                    WHERE `c`.`id` = ".$adminId."
                    AND `a`.`point_date` BETWEEN '".$start_date."' AND '".$end_date."'
        ");


    }

}
