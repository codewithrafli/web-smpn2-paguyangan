<?php

use App\Http\Controllers\Web\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('banners', \App\Http\Controllers\Web\Admin\BannerController::class);
    Route::get('web-configuration', [\App\Http\Controllers\Web\Admin\WebConfigurationController::class, 'index'])->name('web-configuration');
    Route::put('web-configuration/{id}', [\App\Http\Controllers\Web\Admin\WebConfigurationController::class, 'update'])->name('web-configuration.update');

    Route::resource('galleries', \App\Http\Controllers\Web\Admin\GalleryController::class);
    Route::resource('achievements', \App\Http\Controllers\Web\Admin\AchievementController::class);
    Route::resource('guestbooks', \App\Http\Controllers\Web\Admin\GuestBookController::class);
    Route::post('graduations/import', [\App\Http\Controllers\Web\Admin\GraduationController::class, 'import'])->name('graduations.import');
    Route::resource('graduations', \App\Http\Controllers\Web\Admin\GraduationController::class);
    Route::resource('teachers', \App\Http\Controllers\Web\Admin\TeacherController::class);
    Route::resource('students', \App\Http\Controllers\Web\Admin\StudentController::class);
    Route::resource('news-categories', \App\Http\Controllers\Web\Admin\NewsCategoryController::class);
    Route::resource('news', \App\Http\Controllers\Web\Admin\NewsController::class);
    Route::resource('extracurriculars', \App\Http\Controllers\Web\Admin\ExtracurricularController::class);
});
