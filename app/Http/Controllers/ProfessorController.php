<?php

namespace App\Http\Controllers;

use App\Exports\AulasProfessor;
use App\Models\Horarios;
use App\Models\Professores;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProfessorController extends Controller
{

    public function index(Request $request) {
        $profs = Professores::select("id", "rm", "nome", "ativo");
        if($request->get("search")) {
            $profs->where("nome", "like", "%".$request->get("search")."%")
                ->orWhere("rm", $request->get("search"));
        }
        $profs = $profs->get();
        return view("professores.index", [
            "professores" => $profs
        ]);
    }

    public function aulas($id_professor) {
        $professor = Professores::where("id", $id_professor)->first();
        if(empty($professor)) {
            return redirect()->back();
        }
        $horarios = Horarios::where("id_professor", $id_professor)
            ->leftJoin("turmas", "turmas.id", "=", "horarios.id_turma")
            ->leftJoin("horas_aulas", "horas_aulas.id", "=", "horarios.id_hora")
            ->orderBy("hora")
            ->get();
        return view("professores.aulas", [
            "horarios" => $horarios,
            "professor" => $professor
        ]);
    }

    public function exportAulas($id_professor) {
        $unique_name = "grade_professor".date("Ymdhis") . ".xlsx";
        return Excel::download(new AulasProfessor($id_professor), $unique_name);
    }

    public function saveView($id = null) {
        if($id == null) {
            return view("professores.form");
        }
        $professor = Professores::find($id);
        if(empty($professor)) {
            return redirect()->back();
        }
        return view("professores.form", ["professor" => $professor]);
    }
    public function save(Request $request, $id = null) {
        $request->validate(
            [
                "nome" => "required",
                "rm" => "required",
            ]);
        try {
            if($id != null) {
                $prof = Professores::where("id", $id)->first();
                if(empty($prof)) {
                    return redirect()->back()->withErrors("Nenhum professor foi encontrado");
                }
            }
            else {
                $prof = new Professores();
            }
            $prof->nome = $request->nome;
            $prof->rm = $request->rm;
            $prof->ativo = empty($request->ativo) ? false : true;
            $prof->save();
            return redirect()->back()->with("adicionado", "O professor {$prof->nome} foi salvo com sucesso");
        } catch(Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
