<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>{{$title}}</title>
</head>
<body style="padding-bottom: 50px">
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url()}}">
                <img src="{{url('src/public/img/php-logo.png')}}" class="img-fluid" style="width: 100px;height:60px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url()}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("pessoas")}}">Pessoas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("accounts")}}">Contas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url("transactions")}}">Movimentação</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
{{if $_messages && count($_messages)}}
<div class="container">
    {{foreach from=$_messages item=$m}}
        <div class="alert alert-{{$m.type}} my-2">
            {{$m.text}}
        </div>
    {{/foreach}}
</div>
{{/if}}
