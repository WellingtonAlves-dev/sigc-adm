<table>
    <tr>
        <th>Segunda</th>
        @foreach($horarios as $horario)
            @if($horario->dia_semana == 1)
                <td>
                    <small>{{$horario->turma}}</small><br/>
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
                    <small>{{$horario->turma}}</small><br/>
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
                    <small>{{$horario->turma}}</small><br/>
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
                    <small>{{$horario->turma}}</small><br/>
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
                    <small>{{$horario->turma}}</small><br/>
                    {{$horario->hora}}
                </td>
            @endif
        @endforeach
    </tr>
</table>