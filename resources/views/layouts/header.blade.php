<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('agendamento.index') }}">Easy Agenda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('agendamento.index') }}">Agendamentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('aluno.index') }}">Alunos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('secretaria.index') }}">Secretarias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('servico.index') }}">Serviços</a>
            </li>
        </ul>
    </div>
</nav>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Easy Agenda</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php?controller=home&action=index">Home <span class="sr-only">(Página atual)</span></a>
            <a class="nav-item nav-link" href="index.php?controller=agendamentos&action=index">Agenda</a>
            <a class="nav-item nav-link" href="index.php?controller=servicos&action=index">Serviços</a>
            <a class="nav-item nav-link" href="index.php?controller=secretarias&action=index">Secretárias</a>
            <a class="nav-item nav-link" href="index.php?controller=login&action=logout">Logout</a>
        </div>
    </div>
</nav> -->