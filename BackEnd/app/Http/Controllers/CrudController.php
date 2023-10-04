<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index(){
        $datos=DB::select(" SELECT * from Usuario ");
        return view("Welcome")->with("datos", $datos);
    }

    public function create(Request $request)
    {
        try {
            $sql=DB::insert(" insert into usuario (Rol,NombreUsuario,Correo,Documento,NumeroCelular) values (?,?,?,?,?); ",[
                $request->txtrol,
                $request->txtusuario,
                $request->txtcorreo,
                $request->txtdocumento,
                $request->txtcelular,
            ]);
        } catch (\Throwable $th) {
            $sql=0;
        }

        if ($sql=true) {
            return back()->with("Correcto", "Registro correcto");
        } else {
            return back()->with("Incorrecto", "Error de Registro");
        }
    }

    public function updadate(Request $request){
        try {
            $sql=DB::update(" update usuario set Rol=?, NombreUsuario=?, Correo=?, Documento=?, NumeroCelular=?",[
                $request->txtrol,
                $request->txtusuario,
                $request->txtcorreo,
                $request->txtdocumento,
                $request->txtcelular,
            ]);
        } catch (\Throwable $th) {
            $sql=0;
        }
        if ($sql=true) {
            return back()->with("Correcto", "Modificacion Correcta");
        } else {
            return back()->with("Incorrecto", "Error de Modificacion");
        }
    }

    public function delete($NombreUsuario){
        try {
            $sql=DB::delete(" delete from usuario where NombreUsuario=$NombreUsuario",[
            ]);
        } catch (\Throwable $th) {
            $sql=0;
        }
        if ($sql=true) {
            return back()->with("Correcto", "Usuario Eliminado");
        } else {
            return back()->with("Incorrecto", "Fallo de borrado");
        }
    }
}
