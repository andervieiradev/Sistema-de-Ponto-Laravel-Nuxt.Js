<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function listAll(Request $request)
    {

        $query = Point::query()
        ->whereHas('employee')
        ->orderBy('point_date', 'desc');

        return $query->with('employee.admin')->paginate(20)->withQueryString();
    }

}
