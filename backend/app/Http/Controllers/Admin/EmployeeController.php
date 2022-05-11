<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'direction' => ['in:asc,desc'],
            'field' => ['in:id,name,email,document,job_position,birthday']
        ]);

        $query = Employee::query()
        ->when($request->search, function($q) use ($request){
            $q->where('id', 'LIKE', '%'.$request->search.'%')
                ->orWhere('name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                ->orWhere('document', 'LIKE', '%'.$request->search.'%')
                ->orWhere('birthday', 'LIKE', '%'.$request->search.'%')
                ->orWhere('job_position', 'LIKE', '%'.$request->search.'%');
        })
        ->when($request->has(['field', 'direction']), function($q) use ($request){
            $q->orderBy($request->field, $request->direction);
        })
        ->when(!$request->has(['field', 'direction']), function($q) use ($request){
            $q->orderBy('created_at', 'desc');
        });

        return $query->with('admin')->paginate(10)->withQueryString();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|min:8',
            'document' => 'required|cpf|unique:employees,document',
            'birthday' => 'required|date_format:d/m/Y',
            'job_position' => 'required|min:3',
            'cep' => 'required|formato_cep',
            'street' => 'required',
            'number' => 'required',
            'complement' => 'nullable',
            'neighborhood' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ]);

        $employee = Auth::guard('admins')->user()->employee()->create($request->all());

        return response()->json(['message' => 'Funcionário criado com sucesso!']);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Funcionário Deletado com Sucesso!']);
    }


    public function getCep(Request $request)
    {
        if($request->cep){
            $cep = Str::slug($request->cep, '');
            $response = Http::get('https://viacep.com.br/ws/'.$cep.'/json/');
            return $response->json();
        }

    }

}
