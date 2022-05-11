<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:id,name,email,document,job_position,birthday']
        ]);

        $query = Employee::query();

        if ($request->search) {
            $search = request('search');

            $query->where(function($query) use ($search){
                $query->where('id', 'LIKE', '%'.$search.'%')
                      ->orWhere('name', 'LIKE', '%'.$search.'%')
                      ->orWhere('email', 'LIKE', '%'.$search.'%')
                      ->orWhere('document', 'LIKE', '%'.$search.'%')
                      ->orWhere('birthday', 'LIKE', '%'.$search.'%')
                      ->orWhere('job_position', 'LIKE', '%'.$search.'%');
            });
        }

        if ($request->has(['field', 'direction'])) {
            $query->orderBy($request->field, $request->direction);
        }

        return $query->paginate(10)->withQueryString();
    }
}
