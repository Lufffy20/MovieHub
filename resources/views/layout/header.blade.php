<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>My Movie Hub</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Your Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>

<!-- Header/Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
  <div class="container">
    <!-- Logo / Brand -->
    <a class="navbar-brand fw-bold text-warning" href="/">🎬 MovieHub</a>

    <!-- Mobile Toggle Button -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Links + Search -->
    <div class="collapse navbar-collapse" id="mainNavbar">
    <!-- Left Menu -->
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
  <li class="nav-item">
    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('movies/Bollywood') ? 'active' : '' }}" href="{{ route('movies.category', 'Bollywood') }}">Bollywood</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('movies/Hollywood') ? 'active' : '' }}" href="{{ route('movies.category', 'Hollywood') }}">Hollywood</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('movies/Web Series') ? 'active' : '' }}" href="{{ route('movies.category', 'Web Series') }}">Web Series</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('movies/Korean Drama') ? 'active' : '' }}" href="{{ route('movies.category', 'Korean Drama') }}">Korean Drama</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ request()->is('movies/Anime') ? 'active' : '' }}" href="{{ route('movies.category', 'Anime') }}">Anime</a>
  </li>
</ul>


      <!-- Search Bar -->
      <form class="d-flex" role="search">
        <input class="form-control me-2 bg-light text-dark" type="search" placeholder="Search movies..." aria-label="Search">
        <button class="btn btn-outline-warning" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
