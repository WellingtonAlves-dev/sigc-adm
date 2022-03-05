@extends("templates.layout")
@section("title")
Turmas
@endsection
@section("content")
    <div style="display: flex; justify-content: space-evenly; width: 100%; margin-top: 30px;">
        <a href="{{url("/turmas/nova")}}" class="primary">Nova Turma</a>
        <a href="{{url("/")}}" class="primary">Voltar</a>
    </div>
    <div style="width: 99%; margin-top: 30px;">
        <form method="GET" class="pure-form">
            <input name="search" placeholder="Pesquisar: TURMA | ID" value="{{Request::get("search") ?? ""}}"/>
            <button class="pure-button"><img src="{{asset("img/sigc/lupa.png")}}" style="height: 14px"></button>
            <a href="{{url("/turmas")}}" class="pure-button"><img src="{{asset("img/sigc/reload.png")}}" style="height: 14px"></a>
        </form>
    </div>
    <div style="height: 300px; width: 100%; overflow: scroll; margin-top: 10px">
        <table class="pure-table" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TURMA</th>
                    <th>ATIVO</th>
                    <th>EDITAR</th>
                    <th>HORARIOS</th>
                    <th>COORDENADORES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                    <tr>
                        <td>{{$turma->id}}</td>
                        <td>{{$turma->turma}}</td>
                        <td>{{$turma->ativo ? "SIM" : "NÃO"}}</td>
                        <td>
                            <img 
                            onclick="window.location.href = '{{url('/turmas/editar/'.$turma->id)}}'"
                            src="{{asset("img/sigc/pincel.png")}}" style="height: 32px; cursor: pointer;"/>
                        </td>
                        <td>
                            <img 
                            onclick="window.location.href = '{{url('grade/'.$turma->id)}}'"
                            src="{{asset("img/sigc/clock.png")}}" style="height: 32px; cursor: pointer;"/>
                        </td>
                        <td>
                            <img 
                            onclick="window.location.href = '#'"
                            src="{{asset("img/sigc/coordenador.png")}}" style="height: 32px; cursor: pointer;"/>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>        

</div>
@endsection