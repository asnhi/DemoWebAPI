<?php
declare(strict_types=1);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Application\Actions\Game\ShowGame;
use App\Application\Actions\Game\CreateGame;
use App\Application\Actions\Game\DeleteGame;

use App\Application\Actions\Genre\ShowGenre;
use App\Application\Actions\Genre\CreateGenre;
use App\Application\Actions\Genre\DeleteGenre;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/game', [GameController::class, 'index']);

// Route::get('/game', function (Request $request) {
//     return view('welcome');
// });

// Route::get('game', GameController::class);
//Vì 1 lần route rất nhiều phương thức nên sử dụng hàm only để giới hạn
// Route::resource('game', GameController::class)->only(['index', 'show']);

// //Hoặc sử dụng hết ngoại trừ ...
// Route::resource('game', GameController::class)->except(['delete']);

//Route::resource('genre',GenreController::class)->only(['index','show']);
// Route::resource('genre', GenreController::class);

Route::middleware('api')->group(function () {
    // Route::get('game/{id}', function ($id) {
    //     // Xử lý logic để lấy thông tin về game có id là $id
    //     return Show::handle($id);
    // });
    // Route::get('game', [Show::class, 'handle']);

    
    Route::prefix('game')->group(function () {

        Route::get('', [ShowGame::class, 'handle']);
        Route::get('favorate', [ShowGame::class, 'showFavorate']); 
        Route::get('favorate-top', [ShowGame::class, 'showTopFavorate']);
        Route::get('detail/{id}', [ShowGame::class, 'showDetail']);

        Route::post('', [CreateGame::class, 'handle']);
        Route::delete('{id}', [DeleteGame::class, 'handle']); 
    });

    Route::prefix('genre')->group(function () {
        Route::get('', [ShowGenre::class, 'handle']);
        // Route::get('favorate', [Show::class, 'showFavorate']);   //Hiện các sản phẩm được yêu 
        // Route::get('top-favorate', [Show::class, 'showTopFavorate']);
        Route::get('detail/{id}', [ShowGenre::class, 'showgameOfGenre']);
        Route::post('', [CreateGenre::class, 'handle']);
        Route::delete('{id}', [DeleteGenre::class, 'handle']); 
    });
});
