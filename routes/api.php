<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('getCurrentUser',[App\Http\Controllers\MainController::class, 'getCurrentLoggedUser']);
Route::get('currentUserInfo',[App\Http\Controllers\MainController::class, 'getCurrentLoggedUserwithId']);
Route::get('users',[App\Http\Controllers\MainController::class, 'all_user']);
Route::post('loginUser', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logoutUser', [App\Http\Controllers\MainController::class, 'logout'])->middleware('auth:sanctum');
Route::post('registerUser', [App\Http\Controllers\MainController::class, 'register_user']);
Route::post('forgetPassword','App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('reset_password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset_password']);
Route::post('verifyUser', 'App\Http\Controllers\Auth\VerificationController@resend');
Route::post('confirmPassword','App\Http\Controllers\Auth\ResetPasswordController@reset');
Route::post('two_factor_auth', [App\Http\Controllers\MainController::class, 'otpVerify']);
Route::post('update_password', [App\Http\Controllers\MainController::class, 'update_password']);

Route::post('editProfile/{id}',[App\Http\Controllers\MainController::class, 'updateProfile']);
Route::get('update_status/{id}',[App\Http\Controllers\Auth\LoginController::class, 'update_status']);
Route::post('deleteUser/{id}',[App\Http\Controllers\MainController::class, 'deleteUser']);
Route::post('deactivateProfile',[App\Http\Controllers\MainController::class, 'deactivateProfile']);
Route::post('changeAccountStatus/{status}/{id}',[App\Http\Controllers\MainController::class, 'changeUserStatus']);   
Route::post('formSubmit',[App\Http\Controllers\MainController::class, 'formSubmit']);

Route::get('verify_email/{id}',[App\Http\Controllers\LoginController::class, 'verify_email']);


//Role Controller Start Here 
Route::post('addrole',[App\Http\Controllers\RoleController::class, 'store']);
Route::get('roles',[App\Http\Controllers\RoleController::class, 'index']);
Route::post('deleteRole/{uuid}',[App\Http\Controllers\RoleController::class, 'destroy']);
Route::get('editRole/{uuid}',[App\Http\Controllers\RoleController::class, 'edit']);
Route::post('updateRole/{uuid}',[App\Http\Controllers\RoleController::class, 'update']);
Route::post('activeRole/{uuid}',[App\Http\Controllers\RoleController::class, 'activeRole']);
Route::post('deactiveRole/{uuid}',[App\Http\Controllers\RoleController::class, 'deactiveRole']);
Route::post('ShowRole/{uuid}',[App\Http\Controllers\RoleController::class, 'ShowRole']);
Route::post('HideRole/{uuid}',[App\Http\Controllers\RoleController::class, 'HideRole']);
Route::get('Register_roles',[App\Http\Controllers\RoleController::class, 'Register_roles']);
Route::get('getTableColumns/{table}',[App\Http\Controllers\RoleController::class, 'getTableColumns']);
Route::post('createTableColumns',[App\Http\Controllers\RoleController::class, 'createTableColumns']);
Route::get('getalltables',[App\Http\Controllers\RoleController::class, 'getalltables']);




// Location Controller Start Here 
Route::post('addlocation',[App\Http\Controllers\LocationController::class, 'store']);
Route::get('locations',[App\Http\Controllers\LocationController::class, 'index']);
Route::post('deleteLocations/{uuid}',[App\Http\Controllers\LocationController::class, 'destroy']);
Route::get('editLocation/{uuid}',[App\Http\Controllers\LocationController::class, 'edit']);
Route::post('updateLocation/{uuid}',[App\Http\Controllers\LocationController::class, 'update']);

//Compnay Controller Start Here

Route::post('addcompany',[App\Http\Controllers\CompanyController::class, 'store']);
Route::get('companies',[App\Http\Controllers\CompanyController::class, 'index']);
Route::post('deleteCompany/{uuid}',[App\Http\Controllers\CompanyController::class, 'destroy']);
Route::get('editCompany/{uuid}',[App\Http\Controllers\CompanyController::class, 'edit']);
Route::post('updateCompany/{uuid}',[App\Http\Controllers\CompanyController::class, 'update']);
Route::post('upload',[App\Http\Controllers\CompanyController::class, 'upload']);



//Room Controller Start Here

Route::post('addrooms',[App\Http\Controllers\RoomController::class, 'store']);
Route::get('fetch_locations/{uuid}',[App\Http\Controllers\LocationController::class, 'fetch_related_locations']);
Route::get('rooms',[App\Http\Controllers\RoomController::class, 'index']);
Route::post('deleteRooms/{uuid}',[App\Http\Controllers\RoomController::class, 'destroy']);
Route::get('editRooms/{uuid}',[App\Http\Controllers\RoomController::class, 'edit']);
Route::post('updateRooms/{uuid}',[App\Http\Controllers\RoomController::class, 'update']);


// Feature Controller Start Here

Route::post('addfeature',[App\Http\Controllers\FeatureController::class, 'store']);
Route::get('feature',[App\Http\Controllers\FeatureController::class, 'index']);
Route::post('deleteFeature/{uuid}',[App\Http\Controllers\FeatureController::class, 'destroy']);
Route::get('editFeature/{uuid}',[App\Http\Controllers\FeatureController::class, 'edit']);
Route::post('updateFeature/{uuid}',[App\Http\Controllers\FeatureController::class, 'update']);