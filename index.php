<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Usuários</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="assets/logo.jpg" alt="PetShop Logo" style="height: 70px; border-radius: 50%;"> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(Página atual)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=novo">Novo Usúario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=listar">Editar Usúarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=agenda">Agenda dos pets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=agendar-criar">Agendar</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <?php
                include("config.php");
                switch (@$_REQUEST["page"]) {
                    case "novo":
                        include("novo-usuario.php");
                        break;
                    case "listar":
                        include("listar-usuario.php");
                        break;
                    case "salvar":
                        include("crud-controle-usuario.php");
                        break;
                    case "editar":
                        include("editar-usuario.php");
                        break;
                    case "excluir":
                        include("crud-controle-usuario.php");
                        break;
                    case "agendar-salvar":
                        include("crud-agenda.php");
                        break;
                    case "agendar-criar":
                        include("agendar-criar.php");
                        break;
                    case "editar-agenda":
                        include("editar-agenda.php");
                        break;
                    case "agenda":
                        include("agenda.php");
                        break;
                    case "excluir-agenda":
                        include("crud-agenda.php");
                        break;
                    default:
                        include("home.php");
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>