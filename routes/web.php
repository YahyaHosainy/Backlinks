<?php

use App\Http\Controllers\CanvasUiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubPagesController;
use App\Http\Controllers\EmailTestController;
use App\Http\Controllers\PaypalPaymentController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\BlogBladeController;
use App\Http\Controllers\PeriodicJobsController;
use App\Http\Livewire\AddFunds;
use App\Http\Livewire\AdminGenralSeo;
use App\Http\Livewire\ApiSettings;
use App\Http\Livewire\Customers;
use App\Http\Livewire\DotEnvModification\DotEnvModification;
use App\Http\Livewire\EmailSettings;
use App\Http\Livewire\GtmSettings;
use App\Http\Livewire\MakeOrder;
use App\Http\Livewire\OrderForm;
use App\Http\Livewire\PaymentHistory;
use App\Http\Livewire\PaymentMethods;
use App\Http\Livewire\Reports;
use App\Http\Livewire\ServicePrices;
use App\Http\Livewire\UserDashboard;
use App\Http\Controllers\CannibalizationFetcher;
use App\Http\Controllers\SociLoginController;
use App\Mail\FundsAdded;
use App\Mail\OrderCompleted;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use JacobBennett\Http2ServerPush\Middleware\AddHttp2ServerPush;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// Home page routes
Route::get('/', [HomeController::class, 'index'])->name('welcome')->middleware(AddHttp2ServerPush::class);
Route::get('/cannibalization-fetcher', [CannibalizationFetcher::class, 'view'])->name('cannibalizationFetcher');
Route::get('/faq', [SubPagesController::class, 'faq'])->name('faq')->middleware(AddHttp2ServerPush::class);
Route::get('/terms-of-use', [SubPagesController::class, 'terms_of_use'])->name('terms_of_use')->middleware(AddHttp2ServerPush::class);
Route::get('/privacy-policy', [SubPagesController::class, 'privacy_policy'])->name('privacy_policy')->middleware(AddHttp2ServerPush::class);
Route::get('/services', [SubPagesController::class, 'services'])->name('services')->middleware(AddHttp2ServerPush::class);
Route::get('/about', [SubPagesController::class, 'about'])->name('about')->middleware(AddHttp2ServerPush::class);
Route::get('/contact-us', [SubPagesController::class, 'contact_us'])->name('contact_us')->middleware(AddHttp2ServerPush::class);
Route::get('/premium-sites', [SubPagesController::class, 'premium_sites'])->name('premium_sites')->middleware(AddHttp2ServerPush::class);
// Route::get('/send-email', [EmailTestController::class, 'send'])->name('send');
Route::get('/thanks-page', [SubPagesController::class, 'thanks_page'])->name('thanks_page')->middleware(AddHttp2ServerPush::class);
Route::get('/already-have-account', [SubPagesController::class, 'already_have_account'])->name('already_have_account')->middleware(AddHttp2ServerPush::class);
//register route
Route::post('/register-new-user', [AuthController::class, 'register'])->name('register-new-user')->middleware(AddHttp2ServerPush::class);
//delete unactive customers
Route::get('/delete-unactive-customers', [PeriodicJobsController::class, 'deleteUnactiveCustomers'])->name('delete-unactive-customers')->middleware(AddHttp2ServerPush::class);
Route::get('/restore-unactive-customers', [PeriodicJobsController::class, 'restoreDeletedCustomers'])->name('restore-unactive-customers')->middleware(AddHttp2ServerPush::class);

// Jetstream's Dashboard Route
Route::middleware(['auth:sanctum', 'verified', AddHttp2ServerPush::class])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// User Dashboard Routes
Route::prefix('/user/dashboard')->middleware(['auth:sanctum', 'verified', AddHttp2ServerPush::class ])->group(function() {
   Route::get('/', [UserDashboard::class, 'render'])->name('user-dashboard');
   Route::get('/prices', [ServicePrices::class, 'render'])->name('service-prices');
   Route::get('/add-funds', [AddFunds::class, 'render'])->name('add-funds');
   Route::get('/make-order', [MakeOrder::class, 'render'])->name('make-order');
   Route::get('/reports', [Reports::class, 'render'])->name('reports');
   Route::get('/payment-history', [PaymentHistory::class, 'render'])->name('payment-history');
   Route::get('/payment-methods', [PaymentMethods::class, 'render'])->name('payment-methods');
   Route::get('/customers', [Customers::class, 'render'])->name('customers');
   Route::get('/api-settings', [ApiSettings::class, 'render'])->name('api-settings');
   Route::get('/gtm-settings', [GtmSettings::class, 'render'])->name('gtm-settings');
   Route::get('/general-seo', [AdminGenralSeo::class, 'render'])->name('general-seo');
   Route::get('/email-settings', [EmailSettings::class, 'render'])->name('email-settings');
});

Route::get('/google/redirect', [SociLoginController::class, 'redirect'])->name('google-login');
Route::get('/google/callback', [SociLoginController::class, 'callback']);

Route::post('/cannibalization-fetcher-finish-work', [CannibalizationFetcher::class, 'finishWork']);

Route::middleware(['auth:sanctum', 'verified', AddHttp2ServerPush::class ])->group(function(){
    Route::post('/cannibalization-fetcher-websites', [CannibalizationFetcher::class, 'websites']);
    Route::post('/cannibalization-fetcher-cannibalize', [CannibalizationFetcher::class, 'cannibalize']);
});

// Payment routes
Route::middleware(['auth:sanctum', 'verified', AddHttp2ServerPush::class])->group(function() {
    // Payment with PayPal routes
    Route::post('charge', [PaypalPaymentController::class, 'charge'])->name('charge');
    Route::get('paymentsuccess', [PaypalPaymentController::class, 'payment_success']);
    Route::get('paymenterror', [PaypalPaymentController::class, 'payment_error']);

    // Payment with Stripe routes
    Route::post('stripe-charge', [StripePaymentController::class, 'charge'])->name('stripe-charge')->middleware(AddHttp2ServerPush::class);

    // Payment Invoices route
    Route::get('download-invoice/{id}', [StripePaymentController::class, 'invoice'])->name('download-invoice')->middleware(AddHttp2ServerPush::class);
});

// Article Categories back-end routes
Route::post('/getCategories',[OrderForm::class, 'getArticleCategories'])->name('getCategories')->middleware(AddHttp2ServerPush::class);

// Route::prefix('blog-spa')->group(function () {
//     Route::prefix('api')->group(function () {
//         Route::get('posts', [CanvasUiController::class, 'getPosts']);
//         Route::get('posts/{slug}', [CanvasUiController::class, 'showPost'])
//              ->middleware('Canvas\Http\Middleware\Session')
//              ->name('show-one-post');

//         Route::get('tags', [CanvasUiController::class, 'getTags']);
//         Route::get('tags/{slug}', [CanvasUiController::class, 'showTag']);
//         Route::get('tags/{slug}/posts', [CanvasUiController::class, 'getPostsForTag']);

//         Route::get('topics', [CanvasUiController::class, 'getTopics']);
//         Route::get('topics/{slug}', [CanvasUiController::class, 'showTopic']);
//         Route::get('topics/{slug}/posts', [CanvasUiController::class, 'getPostsForTopic']);

//         Route::get('users/{id}', [CanvasUiController::class, 'showUser']);
//         Route::get('users/{id}/posts', [CanvasUiController::class, 'getPostsForUser']);
//     });

//     Route::get('/{view?}', [CanvasUiController::class, 'index'])
//          ->where('view', '(.*)')
//          ->name('canvas-ui');
// });



Route::prefix('blog')->middleware(AddHttp2ServerPush::class)->group(function () {
    Route::get('/', [BlogBladeController::class, 'index'])->name('show-all-posts-blade');
    Route::get('posts/{slug}', [BlogBladeController::class, 'showPost'])->name('show-one-post-blade');
    Route::get('tags/{slug}/posts', [BlogBladeController::class, 'getPostsForTag'])->name('show-posts-for-tag-blade');
    Route::get('topics/{slug}/posts', [BlogBladeController::class, 'getPostsForTopic'])->name('show-posts-for-topic-blade');
    Route::get('users/{id}/posts', [BlogBladeController::class, 'getPostsForUser'])->name('show-posts-for-user-blade');
});

// Route to fill api_services & api_extras table
Route::get('fill-api-data', [HomeController::class, 'fill'])->middleware(AddHttp2ServerPush::class);;

// THIS ROUTE IS TO TEST ORDER COMPLETE NOTIFICATION ON THE FIRST REPORT
/*Route::get('/send', function () {
    $userEmail = Report::first()->user->email;
    $reportStatus = Report::first()->status;

    // Send User Notification to inform him if the order is completed
    if (strcmp($reportStatus, 'Completed') == 0) {
        Mail::to($userEmail)->send(new OrderCompleted(Report::first()));
    }
});*/


// this routes for redirecting spammy links to the home page with 301
Route::get('/custom-page.php', function () {
    return redirect()->to('/',301);
} );

Route::get('/custom-page', function () {
    return redirect()->to('/',301);
} );
Route::get('/link-building-blog ', function () {
    return redirect()->to('/',301);
} );
Route::get('/buy-links ', function () {
    return redirect()->to('/',301);
} );

Route::get('/blog-management', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/blog-dashboard');
})->name('blog-dashboard');


Route::get('/testmeplease', [\App\Http\Livewire\ReportsPollingBloc::class, 'fetchReports']);
