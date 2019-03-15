<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')  }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')  }}"> 
	<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
	<script type="text/javascript" src=" {{ asset('js/jquery-3.1.0.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Laravel CRUD</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('api/team') }}">Team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('api/player') }}">Player</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('api/tournament') }}">Tournament</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>