<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\TimeZoneController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserImageController;
use App\Http\Controllers\ContactTagController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TicketSourceController;
use App\Http\Controllers\ContactSourceController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\PipelineStageController;
use App\Http\Controllers\SalesPipelineController;
use App\Http\Controllers\SolutionImageController;
use App\Http\Controllers\TicketSettingsController;
use App\Http\Controllers\WebsiteSettingController;
use App\Http\Controllers\CompanySettingsController;
use App\Http\Controllers\CustomAuth\AuthController;

use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\SupportPipelineController;
use App\Http\Controllers\SupportSettingsController;

use App\Http\Controllers\CustomeFromFieldController;
use App\Http\Controllers\ProjectSubModuleController;
use App\Http\Controllers\StorageProvidersController;
use App\Http\Controllers\SupportPipelineStageController;
use App\Http\Controllers\CustomAuth\VerifyEmailController;


use App\Http\Controllers\CustomAuth\ResetPasswordController;
use App\Http\Controllers\CustomAuth\ForgotPasswordController;
use App\Http\Controllers\CustomAuth\ResetForgotPasswordController;


use App\Http\Controllers\CustomFormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->middleware('guest')->name('home');
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::get('/registration', [AuthController::class, 'registration'])->middleware('guest')->name('registration');

// UiController
Route::get('/icons/mingcute', [UiController::class, 'showMingcute'])->name('icons.mingcute');
Route::get('/icons/feather', [UiController::class, 'showFeather'])->name('icons.feather');
Route::get('/icons/material-symbols', [UiController::class, 'showMaterialSymbols'])->name('icons.material-symbols');


Route::post('/registration_store', [AuthController::class, 'registration_store'])->middleware('guest')->name('registration_store');
Route::post('/login-validation', [AuthController::class, 'store'])->middleware('guest')->name('login_validation');
Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');
Route::resource('/reset-password', ResetPasswordController::class)->middleware('auth')->names('reset_password');
Route::resource('/forgot-password', ForgotPasswordController::class)->middleware('guest')->names('forgot_password');
Route::resource('/verify-email', VerifyEmailController::class)->middleware('guest')->names('verify_email');
Route::resource('/reset-forgot-password', ResetForgotPasswordController::class)->middleware('guest')->names('reset_forgot_password');

Route::post('/set-timezone', TimeZoneController::class)->name('set_timezone');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/upload-profile-photo', [DashboardController::class, 'upload_profile_photo'])->name('upload_profile_photo');
    Route::post('/delete-confirmation-modal', [CommonController::class, 'delete_confirmation_modal'])->name('delete_confirmation_modal');
    Route::post('/delete-confirmation-big-modal', [CommonController::class, 'delete_confirmation_big_modal'])->name('delete_confirmation_big_modal');
    Route::put('/make-notifications-seen', [NotificationController::class, 'make_notifications_seen'])->name('make_notifications_seen');
    Route::resource('/users', UserController::class);
    Route::get('/website-settings', [WebsiteSettingController::class, 'edit'])->name('website_settings');
    Route::put('/website-settings-update', [WebsiteSettingController::class, 'update'])->name('website_settings_update');
    Route::resource('/profile', ProfileController::class);
    route::post('/change-password/{id}', [ProfileController::class, 'change_password'])->name('change_password');

    //customer
    Route::resource('email-template', EmailTemplateController::class);

    // tags
    Route::resource('tags', TagController::class);

    // contact_tags
    Route::resource('contact_tags', ContactTagController::class);

    // contacts sources
    Route::resource('contact-sources', ContactSourceController::class);

    //email template
    Route::resource('email-template', EmailTemplateController::class);

    Route::resource('email', EmailController::class);

    //customer accounts
    Route::resource('customer-accounts', CustomerAccountController::class);
    Route::post('/customer-accounts/sent-email/{id}', [CustomerAccountController::class, 'sentEmail'])->name('sentEmail');
    route::get('/customer-accounts/edit-organization/{id}', [CustomerAccountController::class, 'edit_organization'])->name('edit_organization');
    route::post('/customer-accounts/update-organization/{id}', [CustomerAccountController::class, 'update_organization'])->name('update_organization');

    //contacts
    Route::get('contact/export', [ContactController::class, 'export'])->name('contacts-export');
    Route::resource('contacts', ContactController::class);
    Route::post('/get-contact-details', [CustomerAccountController::class, 'getContactDetails'])->name('get_contact_details');

    // organizations
    Route::resource('/organizations', OrganizationController::class);

    // industries
    Route::resource('industries', IndustryController::class);

    //sales
    Route::resource('pipelines', SalesPipelineController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('pipeline-stages', PipelineStageController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('quotes', QuoteController::class);
    Route::post('get-pipeline-stage', [SaleController::class, 'getPipelineStage'])->name('get_pipeline_stage');

    //company
    Route::resource('company-settings', CompanySettingsController::class);
    Route::get('staffs/export', [StaffController::class, 'export'])->name('staffs-export');
    Route::get('staffs/import/view', [StaffController::class, 'importView'])->name('staff-import-view');
    Route::post('staffs/import', [StaffController::class, 'import'])->name('staffs-import');
    Route::resource('/staffs', StaffController::class);

    Route::resource('teams', TeamController::class);
    Route::resource('/designations', DesignationController::class);
    Route::resource('/storage-providers', StorageProvidersController::class);

    //Solution
    route::resource('solutions', SolutionController::class);
    route::get('/solution-images/{id}', [SolutionImageController::class, 'show'])->name('solution_images');


    //Ticket
    route::resource('tickets', TicketController::class);
    route::resource('ticket-sources', TicketSourceController::class);
    route::resource('ticket-settings', TicketSettingsController::class);
    Route::get('get-sales', [TicketController::class, 'searchSales'])->name('search-sales');

    //Task
    route::resource('tasks', TaskController::class);
    Route::get('get-ticket', [TaskController::class, 'searchTickets'])->name('search-ticket');


    //support
    route::resource('support-settings', SupportSettingsController::class);
    route::resource('support-pipeline', SupportPipelineController::class);
    route::resource('support-pipeline-stage', SupportPipelineStageController::class);

    //select2 -> state, city, contact, organization, staffs,solutions, solution-price
    Route::post('get-states', [CommonController::class, 'getStates'])->name('getStates');
    Route::post('get-cities', [CommonController::class, 'getCities'])->name('getCities');
    Route::get('get-contact', [ContactController::class, 'searchContact'])->name('search-contact');
    Route::get('get-timezones', [TimezoneController::class, 'searchTimezone'])->name('get-timezones');
    Route::get('get-organization', [OrganizationController::class, 'searchOrganization'])->name('search-organization');
    Route::get('get-staffs', [SaleController::class, 'searchStaff'])->name('search-staffs');
    Route::get('get-solutions', [SolutionController::class, 'searchSolution'])->name('search-solution');
    Route::post('get-solution-price', [SaleController::class, 'getSolutionPrice'])->name('get-solution-price');
    Route::post('get-solution-price-edit', [SaleController::class, 'getSolutionPriceEdit'])->name('get-solution-price-edit');
    Route::post('get-invoice-solution-price-edit', [InvoiceController::class, 'getSolutionPriceEdit'])->name('get-invoice-solution-price-edit');
    Route::post('get-quote-solution-price-edit', [QuoteController::class, 'getSolutionPriceEdit'])->name('get-quote-solution-price-edit');



    // project
    route::resource('custom-sub-module', ProjectSubModuleController::class);
    route::resource('custome-from-field', CustomeFromFieldController::class);



    //custom form
    
    route::resource('custom-form', CustomFormController::class);

    Route::post('/save-drop-zone', [CustomFormController::class, 'dropstore']);
});

Route::GET('/user_images/{file_name}', [UserImageController::class, 'user_images'])->name('user_images');


// Below part is for testing. Remove it for production
Route::resource('/test', TestController::class);
