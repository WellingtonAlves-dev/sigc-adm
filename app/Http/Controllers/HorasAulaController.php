<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use App\Models\HorasAula;
use App\Models\Professores;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Validator;

class HorasAulaController extends Controller
{
    public function index($id_turma) {
        $horas = HorasAula::select("*")
            ->where("id_turma", $id_turma)
            ->orderBy("hora", "asc")->get();
        return view("hora_aula.index",[
            "id_turma" => $id_turma, 
            "horas" => $horas,]);
    }
    public function save(Request $request, $id_turma,$id = null) {
        $request->validate(["hora" => "required"]);
        try {
            if($id) {
                $hora = HorasAula::find($id);
            } else {
                $hora = new HorasAula();
            }
            $hora->id_turma = $id_turma;
            $hora->hora = $request->hora;
            $hora->save();
            return redirect()->back()->with("add", "Horario salvo com sucesso");
        } catch(Exception $e) {
            return response($e->getMessage());
        }
    }
}
