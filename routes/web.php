<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FighterController;
use App\Http\Controllers\Admin\CampController;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\TimelineEventController;
use App\Http\Controllers\Admin\TeamMemberController;
 use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\EhfFighterController;
use App\Http\Controllers\Admin\CampFighterApplicationController;
use App\Http\Controllers\Admin\CampStatController;
use App\Http\Controllers\Admin\CoachController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\UpcomingFightController;
use App\Http\Controllers\Admin\DashboardController;


  // FRONTEND
use App\Http\Controllers\Frontend\FrontFighterController;
use App\Http\Controllers\Frontend\CampFrontendController;
use App\Http\Controllers\Frontend\ApplicationController as FrontApplicationController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\EhfRosterController;
use App\Http\Controllers\Frontend\ChallengeRequestFrontendController;
use App\Http\Controllers\Frontend\CampFighterRosterController;
use App\Http\Controllers\Frontend\CoachesController;
use App\Http\Controllers\Frontend\ContactController;


// ✅ HOME PAGE – fighters + camps
Route::get('/', [FrontFighterController::class, 'index'])
    ->name('home');


Route::get('/language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'fa'])) {
        session(['locale' => $lang]);
    }
    return back();
})->name('language.switch');

// ADMIN ROUTES (Protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // ✅ /admin will redirect to /admin/dashboard
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    })->name('home');

    // ✅ /admin/dashboard loads controller (with variables)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ✅ NEW: notifications counts for navbar (works on all pages)
    Route::get('/notif-counts', [DashboardController::class, 'notifCounts'])->name('notif.counts');


    

    Route::resource('fighters', FighterController::class);
    Route::resource('camps', CampController::class);
    

    // 🔹 New: Applications admin
    Route::resource('applications', AdminApplicationController::class)
        ->only(['index', 'show', 'update', 'destroy']);
         // 🔹 About admin editor
    Route::get('about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');
      // 🔹 New: History / Timeline
    Route::resource('timeline-events', TimelineEventController::class)
        ->except(['show']);

    // 🔹 New: EHF Leadership / Team
    Route::resource('team-members', TeamMemberController::class)
        ->except(['show']);
Route::resource('hero-slides', HeroSlideController::class)->except(['show']);
  Route::resource('ehf-fighters', EhfFighterController::class);

  Route::resource('challenge-requests', \App\Http\Controllers\Admin\ChallengeRequestController::class)
    ->only(['index', 'show', 'update', 'destroy']);



Route::resource('camp-applications', CampFighterApplicationController::class)
    ->only(['index','show','edit','update','destroy']);

Route::post('camp-applications/{campApplication}/approve', [CampFighterApplicationController::class, 'approve'])
    ->name('camp-applications.approve');

Route::post('camp-applications/{campApplication}/reject', [CampFighterApplicationController::class, 'reject'])
    ->name('camp-applications.reject');


Route::get('camp-stats', [CampStatController::class, 'edit'])->name('camp-stats.edit');
Route::put('camp-stats', [CampStatController::class, 'update'])->name('camp-stats.update');

Route::post('camp-applications/{campApplication}/approve', [CampFighterApplicationController::class, 'approve'])
    ->name('camp-applications.approve');

Route::post('camp-applications/{campApplication}/reject', [CampFighterApplicationController::class, 'reject'])
    ->name('camp-applications.reject');


Route::resource('coaches', CoachController::class);
Route::post('coaches/{coach}/toggle', [App\Http\Controllers\Admin\CoachController::class, 'toggle'])
    ->name('coaches.toggle');


});
Route::patch('/admin/key-fighters/{id}/toggle-status', 
    [FighterController::class, 'toggleStatus']
)->name('admin.key-fighters.toggle-status');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('contact-messages', [ContactMessageController::class, 'index'])
        ->name('contact-messages.index');

    Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])
        ->name('contact-messages.show');

    Route::delete('contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])
        ->name('contact-messages.destroy');

    Route::post('contact-messages/{contactMessage}/read', [ContactMessageController::class, 'markRead'])
        ->name('contact-messages.read');

    Route::post('contact-messages/{contactMessage}/unread', [ContactMessageController::class, 'markUnread'])
        ->name('contact-messages.unread');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('settings/contact', [SiteSettingController::class, 'edit'])->name('settings.contact');
    Route::post('settings/contact', [SiteSettingController::class, 'update'])->name('settings.contact.update');
});
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Upcoming Fight (single record)
    Route::get('upcoming-fight', [UpcomingFightController::class, 'edit'])->name('upcomingFight.edit');
    Route::post('upcoming-fight', [UpcomingFightController::class, 'update'])->name('upcomingFight.update');

    // Slides
    Route::post('upcoming-fight/slides', [UpcomingFightController::class, 'storeSlide'])->name('upcomingFight.slides.store');
    Route::post('upcoming-fight/slides/{slide}/delete', [UpcomingFightController::class, 'deleteSlide'])->name('upcomingFight.slides.delete');
});
// Laravel Auth routes
require __DIR__.'/auth.php';


// (optional) Separate page just for full schedule
Route::get('/training-camps', [CampFrontendController::class, 'index'])
     ->name('camps.frontend');
     // Fighter application submit
Route::post('/apply', [FrontApplicationController::class, 'store'])
     ->name('front.apply');

//About Front 
Route::get('/about', [PageController::class, 'about'])
    ->name('about');
Route::get('/ehf-fighters', [EhfRosterController::class, 'index'])->name('ehf-fighters');



Route::post('/challenge-requests', [ChallengeRequestFrontendController::class, 'store'])
    ->name('challenge-requests.store');
Route::post('/camp-apply', [\App\Http\Controllers\Frontend\CampApplicationController::class, 'store'])
    ->name('camp.apply');



Route::get('/camp-fighters', [CampFighterRosterController::class, 'index'])
    ->name('camp.fighters');
Route::get('/coaches', [CoachesController::class, 'index'])->name('coaches');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

