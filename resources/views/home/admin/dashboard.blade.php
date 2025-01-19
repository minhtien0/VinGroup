@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <!-- Thống kê danh mục -->
    <div class="col-md-6">
        <div class="card">
            <h3 class="card-header">Thống kê danh mục</h3>
            <div class="card-body">
                <p>Tổng số danh mục cha: {{ $parentCategoriesCount }}</p>
                <p>Tổng số danh mục con: {{ $childCategoriesCount }}</p>
                <p>Tổng số danh mục: {{ $totalCategoriesCount }}</p>
            </div>
        </div>
    </div>

    <!-- Thống kê series -->
    <div class="col-md-6">
        <div class="card">
            <h3 class="card-header">Thống kê series</h3>
            <div class="card-body">
                <p>Tổng số series: {{ $seriesCount }}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Loại series</th>
                            <th>Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seriesByType as $type)
                            <tr>
                                <td>{{ $type->type }}</td>
                                <td>{{ $type->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Biểu đồ -->
<div class="row">
    <div class="col-md-6">
        <canvas id="categoriesChart" width="400" height="200"></canvas>
    </div>
    <div class="col-md-6">
        <canvas id="seriesChart" width="400" height="200"></canvas>
    </div>
</div>

<script>
    // Biểu đồ danh mục
    const ctxCategories = document.getElementById('categoriesChart').getContext('2d');
    const categoriesChart = new Chart(ctxCategories, {
        type: 'bar',
        data: {
            labels: ['Danh mục cha', 'Danh mục con', 'Tổng danh mục'],
            datasets: [{
                label: 'Số lượng',
                data: [{{ $parentCategoriesCount }}, {{ $childCategoriesCount }}, {{ $totalCategoriesCount }}],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        }
    });

    // Biểu đồ series
    const ctxSeries = document.getElementById('seriesChart').getContext('2d');
    const seriesChart = new Chart(ctxSeries, {
        type: 'pie',
        data: {
            labels: @json($seriesByType->pluck('type')),
            datasets: [{
                data: @json($seriesByType->pluck('total')),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
            }]
        }
    });
</script>
@endsection
