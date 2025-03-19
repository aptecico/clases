<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use App\Models\Trabajadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //variable que recibe todo los datos
        $trabajadores=Trabajadores::select('trabajadores.*','departamentos.nombre as departamento')
        ->join('departamentos','departamentos.id','trabajadores.id_departamento')
        ->paginate(10);
        //retornar los valores
        return reponse()->json($trabajadores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validacion de datos 
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellido'=>'required|string|max:100',
            'correo'=>'required|email',
            'telefono'=>'required',
            'id_departamento'=>'required|numeric'
            ];

        $validador=Validator:make($request->input,$campos);

        //verificar validaciones
        if($validador->fails()){
            return response()->json([
                'status'=>false,
                'errors'=>$validador->errors()->all()
            ],400);
        }
        //en caso de salir de la validación
        $trabajadores=new Trabajadores($request->input());
        //Guardar en la base de datos
        $trabajadores->save();
        return response()->json([
                'status'=>true,
                'message'=>'trabajor creado satisfactoriamente'
            ],200);
        //$requestData=$request->all();
        //$requestData=$request->input();
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
