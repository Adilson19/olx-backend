<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AdvertisesController;
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

/*
    Rota de Utilidade
    [x]- /ping - Responde com Pong

    - Rotas de Configuracao geral
    [x] - /states - Listar os estados
    [x] - /categories - Listar as categorias do sistema

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
