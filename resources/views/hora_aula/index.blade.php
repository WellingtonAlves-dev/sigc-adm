@extends("templates.layout")
@section("content")
<div style="width: 90%; display: flex; justify-content: end; margin-bottom: 10px;">
    <a href="{{url("grade/".$id_turma)}}" class="primary">Voltar</a>
</div>
<div>
    <form method="POST" class="pure-form pure-form-stacked" style="margin-bottom: 5px">
        @csrf
        <label>Horario</label>
        <input type="text" id="hora_inicio" name="hora" placeholder="Ex. 07:00" autofocus/>
        <button class="primary">Adicionar</button>
        <br/>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{$e}}</li>
                @endforeach
            </ul>
        @endif
        @if(Session::has("add"))
            <span style="color: green">{{Session::get("add")}}</span>
        @endif
    </form>
</div>
<div style="width: 100%; height: 200px; overflow: scroll">
    <table class="pure-table" style="width: 100%">
        <thead>
            <tr>
                <th>HORA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($horas as $hora)
                <tr>
                    <td>{{$hora->hora}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section("script")
<script>
    VMasker(document.querySelector("#hora_inicio")).maskPattern("99:99");
</script>
@endsection