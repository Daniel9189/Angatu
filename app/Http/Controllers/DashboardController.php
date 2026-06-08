<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Product;
use App\Models\User;
use DB;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Override;

class DashboardController extends Controller
{
    
    public function index() 
    {
        $users = User::all()->count();
        
        // Gráfico 1 - usuários        
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
        ->groupBy('ano')
        ->orderBy('ano', 'asc')
        ->get();

        // $ano = [];
        // $total = [];
        
        // Preparar arrays
        // foreach ($usersData as $user) {
        //     $ano[] = $user->ano;
        //     $total[] = $user->total;            
        // }
        
        // Formatar para chartjs
        $userLabel = "'Comparativo de cadastros de usuários'";
        $userAno = $usersData->pluck('ano')->implode(',');
        $userTotal = $usersData->pluck('total')->implode(',');
        

        // Gráfico 2 - categorias
        $catData = Categoria::withCount('products')->get();

        $catNome = $catData->pluck('nome');

        $catTotal = $catData->pluck('products_count');
        
        // dd($usersData);
        
        return view('admin.dashboard', compact('users', 'userLabel', 'userAno', 'userTotal', 'catNome', 'catTotal'));
    }

    public function products() {
        return view('admin.products');
    }
}