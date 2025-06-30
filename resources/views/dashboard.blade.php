@extends('admino.main')

@section('main-section')

<div class="main-title">
  <p class="font-weight-bold">MOVIE DASHBOARD</p>
</div>

<div class="main-cards">
  <div class="card">
    <div class="card-inner">
      <p class="text-primary">TOTAL MOVIES</p>
      <span class="material-icons-outlined text-blue">movie</span>
    </div>
    <span class="text-primary font-weight-bold">249</span>
  </div>

  <div class="card">
    <div class="card-inner">
      <p class="text-primary">TOTAL CATEGORIES</p>
      <span class="material-icons-outlined text-orange">category</span>
    </div>
    <span class="text-primary font-weight-bold">00</span>
  </div>

  <div class="card">
    <div class="card-inner">
      <p class="text-primary">TOTAL DOWNLOAD LINKS</p>
      <span class="material-icons-outlined text-green">cloud_download</span>
    </div>
    <span class="text-primary font-weight-bold">00</span>
  </div>

  <div class="card">
    <div class="card-inner">
      <p class="text-primary">MOVIES WITH LOW RATING</p>
      <span class="material-icons-outlined text-red">report_problem</span>
    </div>
    <span class="text-primary font-weight-bold">00</span>
  </div>
</div>

<div class="charts">
  <div class="charts-card">
    <p class="chart-title">Top 5 Rated Movies</p>
    <div id="bar-chart"></div>
  </div>

  <div class="charts-card">
    <p class="chart-title">Movies Uploaded Monthly</p>
    <div id="area-chart"></div>
  </div>
</div>

@endsection
