<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  <!-- Montserrat Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/style1.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  @stack('styles')
</head>
<body>
  <div class="grid-container">

    <!-- Header -->
    <header class="header">
      <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
      </div>
      <div class="header-left">
        <!-- <span class="material-icons-outlined">search</span> -->
      </div>
      <div class="header-right">
        <span class="material-icons-outlined">notifications</span>
        <span class="material-icons-outlined">email</span>
        <span class="material-icons-outlined">account_circle</span>
      </div>
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar">
      <div class="sidebar-title">
        <div class="sidebar-brand">
          <span class="material-icons-outlined">inventory</span>MovieHub
        </div>
        <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
      </div>

      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <a href="{{ url('/dashboard') }}" target="_self">
            <span class="material-icons-outlined">dashboard</span> Dashboard
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="{{ url('/create') }}">
            <span class="material-icons-outlined">inventory_2</span> Add new Movies 
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="{{ url('/showmovies') }}">
            <span class="material-icons-outlined">fact_check</span> Our Movies
          </a>
        </li>
        <!-- <li class="sidebar-list-item">
          <a href="#">
            <span class="material-icons-outlined">add_shopping_cart</span> Purchase Orders
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="#">
            <span class="material-icons-outlined">shopping_cart</span> Sales Orders
          </a>
        </li> -->
        <li class="sidebar-list-item">
          <a href="{{ url('/reports') }}">
            <span class="material-icons-outlined">poll</span> Reports
          </a>
        </li>
        <li class="sidebar-list-item">
          <a href="{{ url('/settings') }}">
            <span class="material-icons-outlined">settings</span> Settings
          </a>
        </li>
      </ul>
    </aside>
    <!-- End Sidebar -->

    <!-- Main Content -->
    <main class="main-container p-4">
      @yield('main-section')
    </main>
    <!-- End Main Content -->
  </div>
</body>
</html>
