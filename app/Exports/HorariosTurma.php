<?php

namespace App\Exports;
use App\Models\HorasAula;
use App\Models\Professores;
use App\Models\Horarios;
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class HorariosTurma implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id_turma;
    public function __construct($id_turma)
    {
        $this->id_turma = $id_turma;
    }
    public function view() : View
    {
        $id_turma = $this->id_turma;
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
        return view("export.horarios_turma", [
            "id_turma" => $id_turma,
            "horas" => $horas,
            "professores" => $professores,
            "horarios" => $n_horarios
        ]);
    }
}
