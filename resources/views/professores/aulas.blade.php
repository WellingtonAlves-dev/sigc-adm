@extends("templates.layout")
@section("content")
<div style="display: flex; width: 95%; justify-content: end; margin-bottom: 5px;">
    <a class="primary" href="{{url("/professores")}}">Voltar</a>
</div>
<div style="width: 90%">
    <a href="{{url("professor/export/".$professor->id)}}">
        <img src="{{asset("img/sigc/sheets.png")}}" style="height: 28px"/>
    </a>
</div>
<div style="overflow: scroll; width: 100%">
    <table class="pure-table" style="width: 100%; text-align: center">
        <tr>
            <th>Segunda</th>
            @foreach($horarios as $horario)
                @if($horario->dia_semana == 1)
                    <td>
                        <small><a href="{{url("/grade/{$horario->id_turma}")}}">{{$horario->turma}}</a></small><br/>
                        {{$horario->hora}}
                    </td>
                @endif
            @endforeach
        </tr>
        <tr>
            <th>Terça</th>
            @foreach($horarios as $horario)
                @if($horario->dia_semana == 2)
                    <td>
                        <small><a href="{{url("/grade/{$horario->id_turma}")}}">{{$horario->turma}}</a></small><br/>
                        {{$horario->hora}}
                    </td>
                @endif
            @endforeach
        </tr>
        <tr>
            <th>Quarta</th>
            @foreach($horarios as $horario)
                @if($horario->dia_semana == 3)
                    <td>
                        <small><a href="{{url("/grade/{$horario->id_turma}")}}">{{$horario->turma}}</a></small><br/>
                        {{$horario->hora}}
                    </td>
                @endif
            @endforeach
        </tr>
        <tr>
            <th>Quinta</th>
            @foreach($horarios as $horario)
                @if($horario->dia_semana == 4)
                    <td>
                        <small><a href="{{url("/grade/{$horario->id_turma}")}}">{{$horario->turma}}</a></small><br/>
                        {{$horario->hora}}
                    </td>
                @endif
            @endforeach
        </tr>
        <tr>
            <th>Sexta</th>
            @foreach($horarios as $horario)
                @if($horario->dia_semana == 5)
                    <td>
                        <small><a href="{{url("/grade/{$horario->id_turma}")}}">{{$horario->turma}}</a></small><br/>
                        {{$horario->hora}}
                    </td>
                @endif
            @endforeach
        </tr>
    </table>
</div>
@endsection