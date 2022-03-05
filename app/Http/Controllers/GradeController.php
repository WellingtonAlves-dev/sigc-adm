<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use App\Models\HorasAula;
use App\Models\Professores;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HorariosTurma;
use App\Models\Turmas;

class GradeController extends Controller
{
    public function index($id_turma) {
        $horas = HorasAula::select("*")
        ->where("id_turma", $id_turma)
        ->orderBy("hora", "asc")->get();
        $professores = Professores::select("*")
        ->where("ativo", true)->get();

        $horarios = Horarios::where("id_turma", $id_turma)->get();
        $n_horarios = [];
        //adicionar o dia das semanas
        foreach($horarios as $hora) {
            $n_horarios[$hora->dia_semana] = [];
        }
        //adicionar os horarios
        foreach($horarios as $hora) {
            $n_horarios[$hora->dia_semana][$hora->id_hora] =$hora->id_professor;
        }
        return view("horarios.index", [
            "id_turma" => $id_turma,
            "horas" => $horas,
            "professores" => $professores,
            "horarios" => $n_horarios
        ]);
    }

    public function downloadExcel($id_turma) {
        $unique_name = "grade_".date("Ymdhis") . ".xlsx";
        return Excel::download(new HorariosTurma($id_turma), $unique_name);
    }

    public function save(Request $request) {
        try {
            $id_turma = $request->id_turma;
            $dia_semana = ($request->dia_semana > 5 || $request->dia_semana < 1) ? 1 : $request->dia_semana;
            $id_hora = $request->id_hora;
            $id_professor = $request->id_prof;
            $horario = Horarios::where("id_turma", $id_turma)
                ->where("dia_semana", $dia_semana)
                ->where("id_hora", $id_hora)->first();
            if($id_professor == "null") {
                $horario->delete();
                return response("Horario deletado com sucesso");
            } else if(empty($horario)) {
                $horario = new Horarios();
                $horario->id_turma = $id_turma;
                $horario->dia_semana = $dia_semana;
                $horario->id_professor = $id_professor;
                $horario->id_hora = $id_hora;
            } else {
                $horario->id_professor = $id_professor;
            }
            $horario->save();
            return response("Horario salvo com sucesso");
        } catch(Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
