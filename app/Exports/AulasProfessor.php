<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Invoice;
use App\Models\Horarios;
use App\Models\Professores;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class AulasProfessor implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id_professor;
    public function __construct($id_professor)
    {
        $this->id_professor = $id_professor;
    }
    public function view() : View
    {
        $id_professor = $this->id_professor;
        $horarios = Horarios::where("id_professor", $id_professor)
            ->leftJoin("turmas", "turmas.id", "=", "horarios.id_turma")
            ->leftJoin("horas_aulas", "horas_aulas.id", "=", "horarios.id_hora")
            ->orderBy("hora")
            ->get();
        return view("export.export_aulas", [
            "horarios" => $horarios
        ]);
    }
}
