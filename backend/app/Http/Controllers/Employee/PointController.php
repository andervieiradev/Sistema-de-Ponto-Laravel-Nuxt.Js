<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Point;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PointController extends Controller
{

    function index(Request $request)
    {
        $points = Auth::guard('employees')->user()->point()->whereDate('point_date', $request->point_date ? Carbon::parse($request->point_date) : Carbon::today())->get();

        if(!$points){
            return response()->json(['message' => 'Ops.. Aconteceu algum erro!'], 400);
        }

        return $points;
    }

    public function store(Request $request)
    {

        $countPointsDaily = Auth::guard('employees')->user()->point()->whereDate('point_date', Carbon::today())->count();

        if($countPointsDaily >= 4){
            return response()->json(['message' => 'Limite de Pontos Diário Atingido'], 406);
        }

        $point = Auth::guard('employees')->user()->point()->create([
            'point_date' => Carbon::now()
        ]);

        return response()->json([
            'message' => 'Ponto Cadastrado Com Sucesso!',
            'point' => Point::find($point->id)
        ]);
    }
}
