<?php

use App\Http\Controllers\AlunoController;
use App\Models\CategoriaFormacao;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\ServicoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AgendamentoController::class, 'index']);

/*
Route::get('/aluno', [AlunoController::class,'index'])
    ->name('aluno.form');
*/
Route::post(
    'aluno/search',
    [AlunoController::class, 'search']
)
    ->name('aluno.search');
Route::resource(
    'aluno',
    AlunoController::class
);

Route::resource('secretaria', SecretariaController::class);

// Rota de busca (opcional)
Route::get('secretaria/search', [SecretariaController::class, 'search'])->name('secretaria.search');


// Rotas para Agendamentos
Route::resource('agendamento', AgendamentoController::class);

// Rota de busca (opcional)
Route::get('agendamento/search', 'AgendamentoController@search');

// Rotas para Serviços
Route::resource('servico', ServicoController::class);

// Rota de busca (opcional)
Route::get('servico/search', [ServicoController::class, 'search'])->name('servico.search');
