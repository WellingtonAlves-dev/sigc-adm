@extends("templates.layout")
@section("title")
Novo Professor
@endsection
@section("content")
    <div style="width: 70%;display: flex; justify-content: end;">
        <a class="primary" href="{{url("professores")}}">Voltar</a>
    </div>
    <form class="pure-form pure-form-stacked" method="POST">
        @csrf
        <div style="display: flex;">
            <label>Ativo</label>
            <input name="ativo" type="checkbox" style="margin-left: 10px"
            @if(Request::is("*/editar/*") && $professor->ativo)
                checked
            @endif
            />
        </div>
        <label>Nome</label>
        <input type="text" name="nome" placeholder="Ex. Sidnei Paixão"
            @if(Request::is("*/editar/*"))
                value={{$professor->nome}}
            @endif
        />
        <label>RM</label>
        <input type="number" name="rm" placeholder="Ex. 06562"
            @if(Request::is("*/editar/*"))
                value={{$professor->rm}}
            @endif
        />
        <button class="primary">Salvar</button>
    </form>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $erro)
                <li>{{$erro}}</li>
            @endforeach
        </ul>
    @endif
    @if(Session::has("adicionado"))
        <div style="color: green; margin-top: 5px;">
            {{Session::get("adicionado")}}
        </div>
    @endif
@endsection