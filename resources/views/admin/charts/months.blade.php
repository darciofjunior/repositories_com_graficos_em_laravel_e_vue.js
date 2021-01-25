@extends('adminlte::page')

@section('title', 'Relatório Mensal de Vendas')

@section('content_header')
    <h1>
        Relatório Mensal de Vendas
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
        url: "@chart('months_chart')",
        hooks: new ChartisanHooks()
            .colors(['#ECC94B', '#4299E1'])
            .legend({ position: 'bottom' })
            .title('Vendas por Mês')
            .datasets([{ type: 'bar', fill: false }, 'bar']),
      });
    </script>
  </body>
</html>

@stop