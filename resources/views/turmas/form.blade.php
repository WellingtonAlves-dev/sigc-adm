@extends("templates.layout")
@section("content")
    <div style="display: flex; width: 90%; justify-content: end">
        <a href="{{url("/turmas")}}" class="primary">Voltar</a>
    </div>
    <div>
        <form method="POST" class="pure-form pure-form-stacked">
            @csrf
            <div style="display: flex">
                <label>ATIVO</label>
                <input style="margin-left: 5px" name="ativo" type="checkbox" name="ativo"
                @if(Request::is("*/editar/*") && $turma->ativo)
                    checked
                @endif
                />
            </div>
            <label>TURMA</label>
            <input type="text" placeholder="Ex. 3 - ENSINO MÉDIO" name="turma"
            value="{{$turma->turma ?? ""}}"
            />
            <button class="primary">Salvar</button>
        </form>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{$e}}</li>
                @endforeach
            </ul>
        @endif
        @if(Session::has("save"))
            <span style="color: green">{{Session::get("save")}}</span>
        @endif
    </div>
@endsection