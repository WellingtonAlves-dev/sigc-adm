<table>
    <tr>
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
                @foreach($professores as $prof)
                    @if(isset($horarios[1][$hora->id]) && $horarios[1][$hora->id] == $prof->id)
                        {{$prof->nome}}
                    @endif
                @endforeach
            </td>
        @endforeach
    </tr>
    <tr id="ter">
        <th>TERÇA</th>
        @foreach($horas as $hora)
            <td>
                @foreach($professores as $prof)
                    @if(isset($horarios[2][$hora->id]) && $horarios[2][$hora->id] == $prof->id)
                        {{$prof->nome}}
                    @endif
                @endforeach
            </td>
        @endforeach
    </tr>
    <tr id="qua">
        <th>QUARTA</th>
        @foreach($horas as $hora)
            <td>
                @foreach($professores as $prof)
                    @if(isset($horarios[3][$hora->id]) && $horarios[3][$hora->id] == $prof->id)
                        {{$prof->nome}}
                    @endif
                @endforeach
            </td>
        @endforeach
    </tr>
    <tr id="qui">
        <th>QUINTA</th>
        @foreach($horas as $hora)
            <td>
                @foreach($professores as $prof)
                    @if(isset($horarios[4][$hora->id]) && $horarios[4][$hora->id] == $prof->id)
                        {{$prof->nome}}
                    @endif
                @endforeach
            </td>
        @endforeach
    </tr>
    <tr id="sex">
        <th>SEXTA</th>
        @foreach($horas as $hora)
            <td>
                @foreach($professores as $prof)
                    @if(isset($horarios[5][$hora->id]) && $horarios[5][$hora->id] == $prof->id)
                        {{$prof->nome}}
                    @endif
                @endforeach
            </td>
        @endforeach
    </tr>
</table>