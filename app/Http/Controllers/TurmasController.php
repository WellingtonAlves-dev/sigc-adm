<?php

namespace App\Http\Controllers;

use App\Models\Turmas;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TurmasController extends Controller
{   
    public function index(Request $request) {
        $turmas = Turmas::select("id", "turma", "ativo");
        if($request->get("search")) {
            $turmas->where("id", $request->get("search"))
                ->orWhere("turma", "like", "%" .$request->get("search"). "%");
        }
        return view("turmas.index", [
            "turmas" => $turmas->get()
        ]);
    }
    public function saveView($id = null) {
        $data = [];
        if($id) {
            $turma = Turmas::find($id);
            if(empty($turma)) {
                return redirect()->back();
            }
            $data["turma"] = $turma;
        }
        return view("turmas.form", $data);
    }
    public function save(Request $request, $id = null) {
        $request->validate(["turma" => "required"]);
        try {
            if($id) {
                $turma = Turmas::where("id", $id)->firstOrFail();
            } else {
                $turma = new Turmas();
            }
            $turma->turma = strtoupper($request->turma);
            $turma->ativo = empty($request->ativo) ? false : true;
            $turma->save();
            return redirect()->back()->with("save", "{$request->turma} foi salvo com sucesso");
        } catch(Exception $e) {
            return redirect()->back()->withErrors("Ocorreu um erro inesperado. Entre em contato com o adm");
        } 
    }
}
