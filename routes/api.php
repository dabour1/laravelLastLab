<?php
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use Laravel\Socialite\Facades\Socialite;




Route::group(['middleware' => ['web']], function () {
    Route::get('login/github', function () {
        return Socialite::driver('github')->redirect();
    });


Route::get('login/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();
 
    //   $user = User::where('github_id', $githubUser->id)->first();

    //   if (!$user) {
         
    //       $user = User::create([
    //           'name' => $githubUser->name,
    //           'email' => $githubUser->email,
    //           'github_id' => $githubUser->id,
             
    //       ]);
    //   }
  
    //   $token = $user->createToken('GitHub Token')->plainTextToken;

     
    //   return response()->json(['token' => $token]);
});


});


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    }) ;
    Route::get('/students',[ApiController::class,"index"] );
Route::post('/students',[ApiController::class,'store'] );
 Route::get('/students/{student}',[ApiController::class,'show'] );
Route::patch('/students/{student}',[ApiController::class,'update'] );
 Route::delete('/students/{student}', [ApiController::class,'destroy'] );
    
});
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');




 Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});