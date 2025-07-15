@extends('admino.main')

@section('main-section')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="main-title">
  <p class="font-weight-bold">📊 Movie Reports</p>
</div>

<div class="main-cards grid grid-cols-2 gap-6 mb-6">
  <div class="card p-4 shadow bg-white rounded">
    <p class="text-gray-700">Total Movies</p>
    <h2 class="text-xl font-bold">{{ $totalMovies }}</h2>
  </div>

  <div class="card p-4 shadow bg-white rounded">
    <p class="text-gray-700">Total Categories</p>
    <h2 class="text-xl font-bold">{{ $totalCategories }}</h2>
  </div>

  <div class="card p-4 shadow bg-white rounded">
    <p class="text-gray-700">Missing Download Links</p>
    <h2 class="text-xl font-bold">{{ $missingDownloads }}</h2>
  </div>

  <div class="card p-4 shadow bg-white rounded">
    <p class="text-gray-700">Low Rated Movies (IMDb &lt; 5)</p>
    <h2 class="text-xl font-bold">{{ $lowRatedMovies }}</h2>
  </div>

  <div class="card p-4 shadow bg-white rounded">
    <p class="text-gray-700">Top Category</p>
    <h2 class="text-xl font-bold">
  {{ $topCategory ? $topCategory->name : 'N/A' }}
  ({{ $topCategory ? $topCategory->movies_count : 0 }} Movies)
</h2>

  </div>
</div>

<div class="charts-card bg-white p-6 rounded shadow mt-6">
  <p class="chart-title text-lg font-semibold text-center mb-4">🎞️ Movies Per Category</p>
  <canvas id="categoryChart" height="250"></canvas>
</div>

<script>
  const categoryData = @json($chartData);

  const catLabels = categoryData.map(item => item.name);
  const catCounts = categoryData.map(item => item.count);

  const ctx = document.getElementById('categoryChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: catLabels,
      datasets: [{
        label: 'Movies Count',
        data: catCounts,
        backgroundColor: '#3b82f6',
        borderRadius: 8,
        barThickness: 40
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
          ticks: { stepSize: 1 }
        }
      }
    }
  });
</script>

@endsection
