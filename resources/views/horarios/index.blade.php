@extends("templates.layout")
@section("content")
<div style="margin-bottom: 10px; width: 100%; display: flex; justify-content: space-evenly">
    <a href="{{url("horarios/".$id_turma)}}" class="primary">Horarios de aula</a>
    <a href="{{url("/turmas")}}" class="primary">Voltar</a>
</div>
<div style="width: 96%">
    <a onclick="diminuirFonte()" style="cursor: pointer">
        <img src="{{asset("img/sigc/diminuir.png")}}" style="height: 17px">
    </a>
    <a onclick="aumentarFonte()" style="cursor: pointer">
        <img src="{{asset("img/sigc/aumentar.png")}}" style="height: 17px">
    </a>
    <a href="{{url("grade/{$id_turma}/download")}}" style="cursor: pointer">
        <img src="{{asset("img/sigc/sheets.png")}}" style="height: 20px"/>
    </a>
</div>
<div style="width: 100%; overflow: scroll;">
    <table class="pure-table" id="tabela" style="width: 100%; font-size: 14px;">
        <tr id="horas_row" style="text-align: center">
            <th>DIAS</th>
            @foreach($horas as $hora)
                <td>
                    {{$hora->hora}}
                </td>
            @endforeach
        </tr>
        <tr id="seg">
            <th>SEGUNDA</th>
            @foreach($horas as $hora)
                <td>
                    <select class="select2" id-hora="{{$hora->id}}" dia-semana="1">
                        <option value="null">Aula Vaga</option>
                        @foreach($professores as $prof)
                            <option value="{{$prof->id}}"
                                @if(isset($horarios[1][$hora->id]) && $horarios[1][$hora->id] == $prof->id)
                                selected
                                @endif
                                >{{$prof->nome}}</option>
                        @endforeach
                    </select>
                </td>
            @endforeach
        </tr>
        <tr id="ter">
            <th>TERÇA</th>
            @foreach($horas as $hora)
            <td>
                <select class="select2" id-hora="{{$hora->id}}" dia-semana="2">
                    <option value="null">Aula Vaga</option>
                    @foreach($professores as $prof)
                        <option value="{{$prof->id}}"
                            @if(isset($horarios[2][$hora->id]) && $horarios[2][$hora->id] == $prof->id)
                            selected
                            @endif
                            >{{$prof->nome}}</option>
                    @endforeach
                </select>
            </td>
            @endforeach
        </tr>
        <tr id="qua">
            <th>QUARTA</th>
            @foreach($horas as $hora)
                <td>
                    <select class="select2" id-hora="{{$hora->id}}" dia-semana="3">
                        <option value="null">Aula Vaga</option>
                        @foreach($professores as $prof)
                            <option value="{{$prof->id}}"
                                @if(isset($horarios[3][$hora->id]) && $horarios[3][$hora->id] == $prof->id)
                                selected
                                @endif
                                >{{$prof->nome}}</option>
                        @endforeach
                    </select>
                </td>
                @endforeach
        </tr>
        <tr id="qui">
            <th>QUINTA</th>
            @foreach($horas as $hora)
                <td>
                    <select class="select2" id-hora="{{$hora->id}}" dia-semana="4">
                        <option value="null">Aula Vaga</option>
                        @foreach($professores as $prof)
                            <option value="{{$prof->id}}"
                                @if(isset($horarios[4][$hora->id]) && $horarios[4][$hora->id] == $prof->id)
                                selected
                                @endif
                                >{{$prof->nome}}</option>
                        @endforeach
                    </select>
                </td>
            @endforeach
        </tr>
        <tr id="sex">
            <th>SEXTA</th>
            @foreach($horas as $hora)
                <td>
                    <select class="select2" id-hora="{{$hora->id}}" dia-semana="5">
                        <option value="null">Aula Vaga</option>
                        @foreach($professores as $prof)
                            <option value="{{$prof->id}}"
                                @if(isset($horarios[5][$hora->id]) && $horarios[5][$hora->id] == $prof->id)
                                selected
                                @endif
                                >{{$prof->nome}}</option>
                        @endforeach
                    </select>
                </td>
            @endforeach
        </tr>
    </table>
</div>
@endsection

@section("script")
<script>
$(document).ready(function() {
    $('.select2').select2();
    $(".select2").on("select2:select", e => {
        let id_turma = "{{$id_turma}}";
        let dia_semana = e.target.getAttribute("dia-semana");
        let id_hora = e.target.getAttribute("id-hora");
        let id_prof = e.target.value;
        //factoryStruct(id_turma, dia_semana, id_hora, id_prof);
        saveHorario(id_turma, dia_semana, id_hora, id_prof);
    })
    setarAulasVagas()
});

function setarAulasVagas() {
    let selects = document.querySelectorAll("select");
    for(select of selects) {
        if(select.value == "null") {
            select.parentElement.style.backgroundColor = "red";
        }
        else {
            select.parentElement.style.backgroundColor = "";
        }
    }
}

function saveHorario(id_turma, dia_semana, id_hora, id_prof) {
    let data = {
        "_token": "{{csrf_token()}}",
        id_turma,dia_semana,id_hora,id_prof
    }
    $.ajax({
        method: "POST",
        url: "{{url('grade/save')}}",
        data: data,
        success: function(res) {
            console.log(res);
            setarAulasVagas()
        },
        error: function(err) {
            alert("Não foi possivel salvar o horario. Entre em contato com o adm");
        }
    })
}

function diminuirFonte() {
    let size = $("#tabela").css("font-size");
    size = size.replace("px", "");
    $("#tabela").css("font-size", (parseInt(size) - 1) + "px");
}

function aumentarFonte() {
    font = $("#tabela")
    let size = font.css("font-size");
    size = size.replace("px", "");
    font.css("font-size", (parseInt(size) + 1) + "px");
}

function factoryStruct(id_turma, dia_semana, id_hora, id_prof) {
    console.log("| ID TURMA | DIA SEMANA | ID HORA | ID PROF |");
    console.log(`* ${id_turma} * ${dia_semana} * ${id_hora} * ${id_prof} *`);
}
</script>
@endsection