<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AdvertisesController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
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

Route::get('/ping', function():JsonResponse{return response()->json(['Pong' => true]);});

Route::get('/states', [StatesController::class, 'index']);
Route::get('/categories', [CategoriesController::class, 'index']);

Route::post('user/signup', [UserController::class, 'signup']);
Route::post('user/signin', [UserController::class, 'signin']);
Route::get('user/me', [UserController::class, 'me'])->middleware('auth:sanctum');

/*
    Rota de Utilidade
    [x]- /ping - Responde com Pong

    - Rotas de Configuracao geral
    [x] - /states - Listar os estados
    [x] - /categories - Listar as categorias do sistema
    [x]- Criar as Seeders para o estado e categorias.


    Mensagens de Erro devem conter
    error: Mensagem descritiva do erro, exemplo:
    {
        error: 'Usuario invalido'
    }
    
    sucesso:
    Deve conter um campo "error" com o valor nulo ou vazio, exemplo:
    {
        error: ''
    }

    Rotas de Autenticacao * Autenticacao via TOKEN
    []- /user/signin --- Login
    []- /user/signup --- Registro de usuario
    []- /user/me ---  informacoes do usuario logado

    

    - Rotas de Advertises
    [] - /ad/list - Listar todos os anuncios
    [] - /ad/:id - Dados de um anuncio unico
    [] - /ad/add - Adicionar um novo anuncio
    [] - /ad/:id(PUT) - Alterar um anuncio publicado
    [] - /ad/:id/:image(Deletar a imagem de um anuncio)
*/
