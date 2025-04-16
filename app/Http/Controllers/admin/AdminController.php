<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;
use App\Models\Frequencia;
use App\Models\Tarefa;
use App\Models\TarefaUsuario;
use App\Models\Atraso;
use App\Models\JustificativaFalta;
use App\Models\JustificativaAtraso;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Contadores
        $totalUsuarios = Usuario::count();
        $totalTarefas = Tarefa::count();
        $totalPresencas = Frequencia::where('vc_tipo', 'presente')->count();
        $totalFaltas = Frequencia::where('vc_tipo', 'falta')->count();
        $totalAtrasos = Atraso::count();
        $totalJustificativas = JustificativaFalta::count() + JustificativaAtraso::count();

        // Gráfico de frequência (exemplo estático, pode ser adaptado com Carbon para dinamismo)
        $labels = ['Seg', 'Ter', 'Qua', 'Qui', 'Sex'];
        $presencas = [12, 19, 3, 5, 2];
        $faltas = [2, 3, 4, 1, 5];

        // Ranking de usuários mais presentes e mais atrasados
        $rankingPresencas = Frequencia::select('it_id_usuario', DB::raw('count(*) as total'))
            ->where('vc_tipo', 'presente')
            ->groupBy('it_id_usuario')
            ->orderByDesc('total')
            ->with('usuario')
            ->take(5)
            ->get();

        $rankingAtrasos = Atraso::select('it_id_tarefa_usuario', DB::raw('count(*) as total'))
            ->groupBy('it_id_tarefa_usuario')
            ->orderByDesc('total')
            ->with('tarefaUsuario.usuario')
            ->take(5)
            ->get();

        return view('admin.index', compact(
            'totalUsuarios',
            'totalTarefas',
            'totalPresencas',
            'totalFaltas',
            'totalAtrasos',
            'totalJustificativas',
            'labels',
            'presencas',
            'faltas',
            'rankingPresencas',
            'rankingAtrasos'
        ));
    }

}