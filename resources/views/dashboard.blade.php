@extends('admino.main')

@section('main-section')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="main-title">
  <p class="font-weight-bold">MOVIE DASHBOARD</p>
</div>

<div class="main-cards">
  <div class="card">
    <div class="card-inner">
      <p class="text-primary">TOTAL MOVIES</p>
      <span class="text-primary font-weight-bold">{{ $totalMovies }}</span>
    </div>
  </div>

  <div class="card">
    <div class="card-inner">
      <p class="text-primary">TOTAL CATEGORIES</p>
      <span class="text-primary font-weight-bold">{{ $totalCategories }}</span>
    </div>
  </div>

  <div class="card">
    <div class="card-inner">
      <p class="text-primary">TOTAL DOWNLOAD LINKS</p>
      <span class="text-primary font-weight-bold">00</span>
    </div>
  </div>

  <div class="card">
    <div class="card-inner">
      <p class="text-primary">MOVIES WITH LOW RATING</p>
      <span class="text-primary font-weight-bold">{{ $lowRatedMovies }}</span>
    </div>
  </div>
</div>

<div class="charts">
  <div class="charts-card">
    <p class="chart-title">🍿 Top 5 Rated Movies</p>
    <canvas id="topRatedMoviesChart" height="230"></canvas>
  </div>

  <div class="charts-card">
    <p class="chart-title">🎬 Movies Uploaded Monthly</p>
    <canvas id="monthlyUploadsChart" height="230"></canvas>
  </div>
</div>

<script>
  // Top 5 Rated Movies Chart (Dynamic)
  const topMovies = @json($topRatedMovies);
  const movieTitles = topMovies.map(movie => movie.title);
  const movieRatings = topMovies.map(movie => movie.imdb_rating);

  const ctx1 = document.getElementById('topRatedMoviesChart').getContext('2d');
  new Chart(ctx1, {
    type: 'bar',
    data: {
      labels: movieTitles,
      datasets: [{
        label: 'IMDb Rating',
        data: movieRatings,
        backgroundColor: ['#6366f1', '#8b5cf6', '#ec4899', '#f59e0b', '#10b981'],
        borderRadius: 10,
        barThickness: 45
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1,
            color: '#374151',
          }
        },
        x: {
          ticks: {
            color: '#374151',
          }
        }
      }
    }
  });

  // Monthly Uploads Chart (Dynamic)
  const monthlyData = @json($monthlyUploads);
  const months = monthlyData.map(item => item.month_name); // Prefer month name like "Jan"
  const movieCounts = monthlyData.map(item => item.count);

  const ctx2 = document.getElementById('monthlyUploadsChart').getContext('2d');
  new Chart(ctx2, {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        label: 'Movies Uploaded',
        backgroundColor: "rgba(75,192,192,0.2)",
        borderColor: "rgba(75,192,192,1)",
        data: movieCounts,
        fill: true
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: true }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            stepSize: 1
          }
        }
      }
    }
  });
</script>

@endsection
