@extends("templates/layout")

@section("title")
Professores
@endsection
@section("content")
<div style="width: 100%;display: flex; justify-content: space-evenly; margin-top: 10px;">
    <a class="primary" href="{{url("professores/novo")}}">Novo Professor</a>
    <a class="primary" href="{{url("/")}}">Voltar</a>
</div>
<form method="GET" class="pure-form" style="margin-left: 10px; width: 100%; margin-top: 15px;">
    <input type="text" name="search" value="{{Request::get("search")}}" placeholder="Pesquisar: NOME | RM"/>
    <button class="pure-button"><img src="{{asset("img/sigc/lupa.png")}}" height="16px"/></button>
    <a href="{{url("/professores")}}" class="pure-button"><img src="{{asset("img/sigc/reload.png")}}" height="16px"/></a>
</form>
<div style="height: 300px; width: 100%; overflow: scroll; margin-top: 10px">
    <table class="pure-table" style="width: 100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>RM</th>
                <th>ATIVO</th>
                <th>EDITAR</th>
                <th>HORARIOS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($professores as $prof)
                <tr>
                    <td>{{$prof->id}}</td>
                    <td>{{$prof->nome}}</td>
                    <td>{{$prof->rm}}</td>
                    <td>
                        @php 
                            echo $prof->ativo ? "SIM" : "NÃO"
                        @endphp 
                    </td>
                    <td>
                        <img onclick="window.location.href='{{url('professor/editar/'.$prof->id)}}'" 
                        src="{{asset("img/sigc/pincel.png")}}" style="width: 32px; cursor: pointer;"/>
                    </td>
                    <td>
                        <img onclick="window.location.href='{{url('professor/'.$prof->id.'/aulas')}}'" 
                        src="{{asset("img/sigc/clock.png")}}" style="width: 32px; cursor: pointer;"/>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection