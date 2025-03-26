<?php

use App\ContactUS;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\BalanceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ContactUSController;
use App\Http\Controllers\RYR\ClassController;
use App\Http\Controllers\RYR\MemberController;
use App\Http\Controllers\RYR\TeacherController;
use App\Http\Controllers\RYR\AttendanceController;
use App\Http\Controllers\RYR\BlogController;
use App\Http\Controllers\RYR\GalleryController;
use App\Http\Controllers\RYR\ParticipantController;
use App\Http\Controllers\RYR\ScheduleController;
use App\Http\Controllers\RYR\RYRController;

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

Route::middleware('log-user-activity')->group(function () { //audit trail(LogUserActivity.php,Kernel.php)

    Route::get('/portfolio', [IndexController::class, 'index']);


    Route::get('/portfolio1', function () {
        return view('portfolio1');
    })->name('portfolio1');

    // Route::get('/', function () {
    //     return view('ryr/ryr');
    // })->name('ryr');

    Route::get('/', [RYRController::class, 'index'])->name('ryr');
    Route::get('/ryr/about-us', function () {
        return view('ryr/about-us');
    })->name('ryr/about-us');
    Route::get('/ryr/gallery', [GalleryController::class, 'index'])->name('ryr.gallery');
    Route::get('/ryr/blog', [BlogController::class, 'index'])->name('ryr.blog');
    // Route::get('/ryr/blog', function () {
        //     return view('ryr/blog');
    // })->name('ryr/blog');
    Route::get('/ryr/class', function () {
        return view('ryr/class');
    })->name('ryr/class');
    Route::get('/ryr/contact', function () {
        return view('ryr/contact');
    })->name('ryr/contact');
    // Route::get('/ryr/gallery', function () {
    //     return view('ryr/gallery');
    // })->name('ryr/gallery');


    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::get('/dashboard/users/manage', [LoginController::class, 'manage'])->name('manage')->middleware('auth');
    //name('login') wajib biar gk error klo blom login

    Route::get('/dashboard/users/attempt', [LoginController::class, 'attempt'])->name('attempt')->middleware('auth');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/dashboard/users/update', [LoginController::class, 'update'])->middleware('auth');

    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store']); //untuk simpen data yg diregister


    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('/dashboard/features/index', function () {
        return view('/dashboard/features/index');
    })->name('features');

    //audit log
    Route::get('/dashboard/audit/index', [DashboardController::class, 'audit'])->middleware('auth')->name('audit');

    ////////////////Transactions////////////////
    Route::get('/dashboard/transactions/export-pdf', [TransactionController::class, 'exportPDF']);
    Route::get('/dashboard/transactions/index', [TransactionController::class, 'index'])->middleware('auth');
    Route::get('/dashboard/transactions/pending', [TransactionController::class, 'pending'])->middleware('auth');
    Route::get('/dashboard/transactions/create', [TransactionController::class, 'create'])->middleware('auth');
    Route::get('/dashboard/setvalue', [TransactionController::class, 'view_setvalue'])->middleware('auth');
    Route::get('/dashboard/transactions/templates', [TransactionController::class, 'templates'])->middleware('auth');
    Route::resource('/dashboard/transactions', TransactionController::class)->middleware('auth');
    Route::post('/dashboard/transactions/{transaction}/template', [TransactionController::class, 'template_add'])->middleware('auth');
    Route::post('/dashboard/transactions/template', [TransactionController::class, 'template'])->middleware('auth');
    Route::post('/dashboard/transactions/setvalue', [TransactionController::class, 'setvalue'])->middleware('auth');
    Route::post('/dashboard/transactions/{transaction}/approve', [TransactionController::class, 'approve'])->middleware('auth');
    Route::post('/dashboard/transactions/monthlyCron', [TransactionController::class, 'monthlyCron'])->middleware('auth');
    Route::post('/dashboard/templates/{id}/setMonthly', [TransactionController::class, 'setMonthly'])->middleware('auth');
    Route::post('/dashboard/templates/{template}', [TransactionController::class, 'removeTemplate'])->middleware('auth');

    Route::post('/dashboard/clear/transactions', [TransactionController::class, 'clear'])->middleware('auth');
    Route::get('/export-transactions', [TransactionController::class, 'exportTransactions']);
    Route::post('transactions.import', [TransactionController::class, 'import'])->name('transactions.import');


    ////////////////////////////////////

    ////////////////Users////////////////
    Route::get('/dashboard/users/index', [LoginController::class, 'list'])->middleware('auth');
    Route::get('/dashboard/users/edit', [LoginController::class, 'edit'])->middleware('auth');
    Route::get('/dashboard/users/create', [LoginController::class, 'create'])->middleware('auth');
    Route::get('/dashboard/users/{user:id}/edit', [LoginController::class, 'update'])->middleware('auth');
    Route::resource('/dashboard/users', LoginController::class)->middleware('auth');
    ////////////////////////////////////

    ////////////////Balances////////////////
    Route::get('/dashboard/balances/index', [BalanceController::class, 'index'])->middleware('auth');
    Route::get('/dashboard/balances/edit', [BalanceController::class, 'edit'])->middleware('auth');
    Route::get('/dashboard/balances/create', [BalanceController::class, 'create'])->middleware('auth');
    Route::get('/dashboard/balances/move', [BalanceController::class, 'move'])->middleware('auth');
    Route::post('/dashboard/balances/transfer', [BalanceController::class, 'transfer'])->middleware('auth');
    Route::get('/dashboard/balances/{balance:id}/edit', [BalanceController::class, 'update'])->middleware('auth');
    Route::get('/dashboard/balances/{balance:id}/history', [BalanceController::class, 'history'])->middleware('auth');
    Route::resource('/dashboard/balances', BalanceController::class)->middleware('auth');
    Route::get('/export-balances', [BalanceController::class, 'exportBalances']);
    Route::post('import', [BalanceController::class, 'import'])->name('balances.import');
    ////////////////////////////////////

    ////////////////Assets////////////////
    Route::get('/dashboard/assets/index', [AssetController::class, 'index'])->middleware('auth');
    Route::get('/dashboard/assets/edit', [AssetController::class, 'edit'])->middleware('auth');
    Route::get('/dashboard/assets/create', [AssetController::class, 'create'])->middleware('auth');
    Route::get('/dashboard/assets/{asset:id}/edit', [AssetController::class, 'update'])->middleware('auth');
    Route::resource('/dashboard/assets', AssetController::class)->middleware('auth');
    ////////////////////////////////////

    ////////////////Reports////////////////
    Route::get('/dashboard/report/index', [TransactionController::class, 'reportIndex'])->middleware('auth');
    Route::get('/dashboard/report/detail', [TransactionController::class, 'reportDetail'])->middleware('auth');
    Route::get('/dashboard/report/generator', [ReportController::class, 'generatorReport'])->middleware('auth');


    Route::get('/generate-report', [ReportController::class, 'generateReport']);
    Route::get('/generate-active-page-pdf', [ReportController::class, 'generateActivePagePDF']);
    ////////////////////////////////////


    //////////////portfolio///////////////
    Route::get('/dashboard/portfolios/index', [PortfolioController::class, 'index'])->middleware('auth');
    Route::get('/dashboard/portfolios/create', [PortfolioController::class, 'create'])->middleware('auth');
    Route::resource('/dashboard/portfolios', PortfolioController::class)->middleware('auth');
    ////////////////////////////////////

    //////////////features///////////////
    Route::get('/dashboard/features/index', [FeatureController::class, 'index'])->middleware('auth')->name('dashboard.features.index');
    Route::get('/dashboard/features/create', [FeatureController::class, 'create'])->middleware('auth')->name('dashboard.features.create');
    Route::resource('/dashboard/features', FeatureController::class)->middleware('auth');
    /////////////////////////////////////


    ///////////Contact Us///////////
    // Route::get('contact-us', 'ContactUSController@contactUS');
    // Route::post('contact-us', ['as' => 'contactus.store', 'uses' => 'ContactUSController@contactUSPost']);
    Route::get('/dashboard/contactus/index', [ContactUSController::class, 'contactUS'])->middleware('auth')->name('dashboard.contactus.index');
    Route::get('/dashboard/contactus/create', [ContactUSController::class, 'create'])->middleware('auth')->name('dashboard.contactus.create');
    Route::resource('/dashboard/contactus', ContactUSController::class);
    /////////////////////////////////
});

//////////////RYR///////////////
        //Classes
        // Route::get('/dashboard/ryr/classes/index', [ClassController::class, 'index'])->middleware('auth')->name('dashboard.classes.index');
        // Route::get('/dashboard/ryr/classes/create', [ClassController::class, 'create'])->middleware('auth')->name('dashboard.classes.create');
        Route::resource('/dashboard/ryr/classes', ClassController::class)->middleware('auth');
        // Route::put('/dashboard/ryr/classes/{id}/update', [ClassController::class, 'update'])->middleware('auth')->name('dashboard.classes.update');

        //members
        Route::get('/dashboard/ryr/members/index', [MemberController::class, 'index'])->middleware('auth')->name('dashboard.members.index');
        Route::get('/dashboard/ryr/members/create', [MemberController::class, 'create'])->middleware('auth')->name('dashboard.members.create');
        Route::resource('/dashboard/ryr/members', MemberController::class)->middleware('auth');

        //teachers
        Route::get('/dashboard/ryr/teachers/index', [TeacherController::class, 'index'])->middleware('auth')->name('dashboard.teachers.index');
        Route::get('/dashboard/ryr/teachers/create', [TeacherController::class, 'create'])->middleware('auth')->name('dashboard.teachers.create');
        Route::resource('/dashboard/ryr/teachers', TeacherController::class)->middleware('auth');

        //attendances
        Route::get('/dashboard/ryr/attendances/index', [AttendanceController::class, 'index'])->middleware('auth')->name('dashboard.attendances.index');
        Route::get('/dashboard/ryr/attendances/create', [AttendanceController::class, 'create'])->middleware('auth')->name('dashboard.attendances.create');
        Route::resource('/dashboard/ryr/attendances', AttendanceController::class)->middleware('auth');

        //schedules
        Route::get('/dashboard/ryr/schedules/index', [ScheduleController::class, 'index'])->middleware('auth')->name('dashboard.schedules.index');
        Route::get('/dashboard/ryr/schedules/create', [ScheduleController::class, 'create'])->middleware('auth')->name('dashboard.schedules.create');
        Route::get('/dashboard/ryr/schedules/{id}/detail', [ScheduleController::class, 'indexGroup'])->middleware('auth')->name('dashboard.schedules.detail');
        Route::get('/dashboard/ryr/schedules/{id}', [ScheduleController::class, 'detailGroup'])->middleware('auth');
        Route::get('/dashboard/ryr/schedules/{id}/editparticipant', [ScheduleController::class, 'editParticipant'])->middleware('auth')->name('dashboard.ryr.edit');
        Route::put('/dashboard/ryr/schedules/{id}/update', [ScheduleController::class, 'update'])->middleware('auth');
        Route::put('/dashboard/ryr/schedules/{id}/updateParticipant', [ScheduleController::class, 'updateParticipant'])->middleware('auth');
        Route::post('/dashboard/ryr/schedules/{id}/participant', [ScheduleController::class, 'editGroup'])->middleware('auth');
        Route::post('/dashboard/ryr/schedules/{id}/finalize', [ScheduleController::class, 'finalize'])->middleware('auth')->name('dashboard.ryr.finalize');
        Route::post('/dashboard/clear/schedules', [ScheduleController::class, 'clear'])->middleware('auth');
        Route::post('/dashboard/ryr/schedules/{id}/pay', [ScheduleController::class, 'pay'])->middleware('auth');
        Route::delete('/dashboard/ryr/schedules/{id}/delete', [ScheduleController::class, 'deleteGroup'])->middleware('auth');
        Route::resource('/dashboard/ryr/schedules', ScheduleController::class)->middleware('auth');


        //participants
        Route::get('/dashboard/ryr/participants/{id}/index', [ParticipantController::class, 'indexGroup'])->middleware('auth');
        Route::get('/dashboard/ryr/participants/{id}/edit', [ParticipantController::class, 'edit'])->middleware('auth')->name('dashboard.participants.create');
        Route::resource('/dashboard/ryr/participants', ParticipantController::class)->middleware('auth');
        Route::post('/dashboard/ryr/participants/{id}', [ParticipantController::class, 'participantsGroup'])->middleware('auth');
        Route::delete('/dashboard/ryr/participants/{id}/delete', [ParticipantController::class, 'deleteGroup'])->middleware('auth');


        Route::resource('/gallery', GalleryController::class)->middleware('auth');
        Route::resource('/blog', BlogController::class)->middleware('auth');

/////////////ENDRYR/////////////
