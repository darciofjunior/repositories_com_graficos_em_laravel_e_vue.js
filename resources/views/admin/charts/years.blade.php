@extends('adminlte::page')

@section('title', 'Relatório Anual de Vendas')

@section('content_header')
    <h1>
        Relatório Anual de Vendas
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="#" class="active">Gráficos</a></li>
    </ol>
@stop

@section('content')
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chartisan example</title>
  </head>
  <body>
    <!-- Chart's container -->
    <div id="chart" style="height: 300px;"></div>
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('years_chart')",
        hooks: new ChartisanHooks()
            .colors(['#FF6961'])
            .legend({ position: 'bottom' })
            .title('Vendas por Ano')
            .datasets([{ type: 'bar', fill: false }, 'bar']),
      });
    </script>
  </body>
</html>

@stop