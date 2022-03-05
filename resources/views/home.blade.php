@extends("templates/layout")

@section("title")
Home
@endsection

<style>
    .opcao {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin: 20px;
        cursor: pointer;
        transition: 0.2s
    }
    .opcao:hover {
        filter: invert()
    }
    .opcao > img {
        height: 150px;
    }
    .opcoes {
        display: flex;
    }
</style>
@section("content")
<div class="opcoes">
    <div class="opcao">
        <img src="{{asset("img/sigc/user.png")}}"/>
        <h3>Usuários</h3>    
    </div>
    <div class="opcao" onclick="window.location.href = '{{url('/professores')}}'">
        <img src="{{asset("img/sigc/professor.png")}}"/>
        <h3>Professores</h3>    
    </div>
    <div class="opcao" onclick="window.location.href = '{{url('/turmas')}}'">
        <img src="{{asset("img/sigc/seminario.png")}}"/>
        <h3>Turmas</h3>    
    </div>
    <div class="opcao">
        <img src="{{asset("img/sigc/ausente.png")}}"/>
        <h3>Ausentes</h3>    
    </div>
</div>
@endsection