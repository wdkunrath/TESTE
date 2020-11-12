<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            a{
                cursor:pointer;
            }
            a:hover{
                color:#ff0000 !important;
            }
            .minha-div{
                max-height: 400px !important;
                overflow-y: auto;
                position:relative;
            }
            .minha-div .description{
                background-color:#fff
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">Teste PHP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" href="#"><span class="sr-only">(current)</span></a>
                </div>
            </div>
        </nav>
        <div class="flex-center position-ref full-height mb-5 pb-5">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="mt-5 pt-4 col">
                            <div class="jumbotron jumbotron-fluid">
                                <div class="container">
                                    <h1 class="display-4">{{ $maiorCompra }}</h1>
                                    <p class="lead">Maior Compra Unica 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-sm-6 minha-div">
                            <div class="description sticky-top p-1">
                                <h4>Lista de Clientes</h4>
                                <p>Liste os clientes ordenados pelo menor valor total em compras</p>
                            </div>
                            <ul class="list-group">
                            @foreach ($listClientes as $clientes)
                                <li class="list-group-item">{{ $clientes['nome'] }}</li>
                            @endforeach
                            </ul>
                        </div>
                        <div class="col col-sm-6 minha-div">
                            <div class="description sticky-top p-1">
                                <h4>Lista de Clientes por ano</h4>
                                <p>Liste os clientes que mais realizaram compras no ano passado (2018)</p>
                            </div>
                            <ul class="list-group">
                            @foreach ($listaClienteComprante as $clientes)
                                <li class="list-group-item"><a name="nome" value={{ $clientes['cpf'] }} data-toggle="modal" data-target="#modal">{{ $clientes['nome'] }}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Recomendado</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{$recomendado}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
        <footer class="bg-light text-muted fixed-bottom">
            <div class="container-fluid p-2 p-md-3">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="https://github.com/wdkunrath">GitHub</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://twitter.com/WalzinhaDK">Twitter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.linkedin.com/in/walquiria-d-987bb4105">Linkedin</a>
                    </li>
                    <li>
                        <a class="nav-link disabled" >EM CONSTRUÇÃO.</a>
                    </li>
                </ul>
            </div>
    </footer>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>
