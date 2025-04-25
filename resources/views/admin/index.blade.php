@extends('layouts._includes.Admin.body')

@section('conteudo')
<div class="right_col" role="main">
    <div class="row tile_count">
        <div class="col-md-2 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> Usuários</span>
            <div class="count">{{ $totalUsuarios }}</div>
            <span class="count_bottom">Total de usuários</span>
        </div>

        <div class="col-md-2 tile_stats_count">
            <span class="count_top"><i class="fa fa-tasks"></i> Tarefas</span>
            <div class="count">{{ $totalTarefas }}</div>
            <span class="count_bottom">Tarefas criadas</span>
        </div>

        <div class="col-md-2 tile_stats_count">
            <span class="count_top"><i class="fa fa-calendar-check-o"></i> Presenças</span>
            <div class="count">{{ $totalPresencas }}</div>
            <span class="count_bottom">Registradas</span>
        </div>

        <div class="col-md-2 tile_stats_count">
            <span class="count_top"><i class="fa fa-calendar-times-o"></i> Faltas</span>
            <div class="count">{{ $totalFaltas }}</div>
            <span class="count_bottom">Acumuladas</span>
        </div>

        <div class="col-md-2 tile_stats_count">
            <span class="count_top"><i class="fa fa-clock-o"></i> Atrasos</span>
            <div class="count">{{ $totalAtrasos }}</div>
            <span class="count_bottom">Detectados</span>
        </div>

        <div class="col-md-2 tile_stats_count">
            <span class="count_top"><i class="fa fa-commenting"></i> Justificativas</span>
            <div class="count">{{ $totalJustificativas }}</div>
            <span class="count_bottom">Enviadas</span>
        </div>
    </div>

    <!-- GRÁFICOS -->
    <div class="row mt-4">
        <!-- Gráfico de Linha -->
        <div class="col-md-6">
            <h4>Gráfico de Linha: Frequência Semanal</h4>
            <canvas id="graficoLinhaFrequencia" height="150"></canvas>
        </div>

        <!-- Gráfico de Pizza -->
        <div class="col-md-6">
            <h4>Gráfico de Pizza: Total da Semana</h4>
            <canvas id="graficoPizzaFrequencia" height="150"></canvas>
        </div>
    </div>

    <!-- Ranking de Presenças -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h4>Ranking: Mais Presenças</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Total de Presenças</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rankingPresencas as $item)
                        <tr>
                            <td>{{ optional($item->usuario)->vc_nome }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Ranking de Atrasos -->
        <div class="col-md-6">
            <h4>Ranking: Mais Atrasos</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Total de Atrasos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rankingAtrasos as $item)
                        <tr>
                            <td>{{ optional($item->tarefaUsuario->usuario ?? null)->vc_nome }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($labels) !!};
    const presencas = {!! json_encode($presencas) !!};
    const faltas = {!! json_encode($faltas) !!};

    // Gráfico de Linha
    new Chart(document.getElementById('graficoLinhaFrequencia').getContext('2d'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Presenças',
                    data: presencas,
                    borderColor: '#2ecc71',
                    backgroundColor: 'rgba(46, 204, 113, 0.2)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Faltas',
                    data: faltas,
                    borderColor: '#e74c3c',
                    backgroundColor: 'rgba(231, 76, 60, 0.2)',
                    tension: 0.3,
                    fill: true
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: {
                    display: true,
                    text: 'Frequência semanal (Linha)'
                }
            }
        }
    });

    // Gráfico de Pizza (total geral da semana)
    const totalPresencas = presencas.reduce((a, b) => a + b, 0);
    const totalFaltas = faltas.reduce((a, b) => a + b, 0);

    new Chart(document.getElementById('graficoPizzaFrequencia').getContext('2d'), {
        type: 'pie',
        data: {
            labels: ['Presenças', 'Faltas'],
            datasets: [{
                data: [totalPresencas, totalFaltas],
                backgroundColor: ['#2ecc71', '#e74c3c']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: {
                    display: true,
                    text: 'Total de Frequência (Pizza)'
                }
            }
        }
    });
</script>
@endpush
