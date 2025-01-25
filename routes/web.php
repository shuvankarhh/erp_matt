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
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\TimeZoneController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PricelistController;
use App\Http\Controllers\SaleQuoteController;
use App\Http\Controllers\UserImageController;
use App\Http\Controllers\ContactTagController;
use App\Http\Controllers\CustomFormController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\SaleInvoiceController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\SiteContactController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RaferrerInfoController;
use App\Http\Controllers\ReferrerInfoController;
use App\Http\Controllers\TicketSourceController;
use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\ContactSourceController;
use App\Http\Controllers\EmailTemplateController;
use App\Http\Controllers\LinkedServiceController;
use App\Http\Controllers\PipelineStageController;
use App\Http\Controllers\MaterialsandEquipmentController;
use App\Http\Controllers\SalesPipelineController;
use App\Http\Controllers\SolutionImageController;
use App\Http\Controllers\ProjectSettingController;
use App\Http\Controllers\WebsiteSettingController;
use App\Http\Controllers\CompanySettingsController;
use App\Http\Controllers\CustomAuth\AuthController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\SupportPipelineController;
use App\Http\Controllers\CustomeFromFieldController;
use App\Http\Controllers\ProjectSubModuleController;
use App\Http\Controllers\StorageProvidersController;
use App\Http\Controllers\LinkedServiceTypeController;
use App\Http\Controllers\SalesPipelineStageController;
use App\Http\Controllers\LinkedServiceSubTypeController;
use App\Http\Controllers\SupportPipelineStageController;
use App\Http\Controllers\CustomAuth\VerifyEmailController;
use App\Http\Controllers\CustomAuth\ResetPasswordController;
use App\Http\Controllers\CustomAuth\ForgotPasswordController;
use App\Http\Controllers\CustomAuth\ResetForgotPasswordController;
use App\Http\Controllers\MakeSafeController;

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
    // website-settings
    Route::get('/website-settings', [WebsiteSettingController::class, 'edit'])->name('website-settings.edit');
    Route::put('/website-settings-update', [WebsiteSettingController::class, 'update'])->name('website-settings.update');
    Route::resource('/profile', ProfileController::class);
    route::post('/change-password/{id}', [ProfileController::class, 'change_password'])->name('change_password');

    // tags
    Route::resource('tags', TagController::class);

    // contact tags
    Route::resource('contact_tags', ContactTagController::class);

    // contacts sources
    Route::resource('contact-sources', ContactSourceController::class);

    //email template
    Route::resource('email-templates', EmailTemplateController::class);

    Route::resource('emails', EmailController::class);
    Route::match(['get', 'post'], '/emails', [EmailController::class, 'index'])->name('emails.index');
    // Route::get('/email', [EmailController::class, 'index'])->name('email.index');
    Route::post('/email/contacts', [EmailController::class, 'fetchContacts'])->name('email.fetch');
    Route::post('/email/send', [EmailController::class, 'sendEmail'])->name('email.send');


    //customer accounts
    Route::resource('customer-accounts', CustomerAccountController::class);
    Route::post('/customer-accounts/sent-email/{id}', [CustomerAccountController::class, 'sentEmail'])->name('sentEmail');
    route::get('/customer-accounts/add-organization', [CustomerAccountController::class, 'add_organization'])->name('add_organization');
    route::get('/customer-accounts/edit-organization/{organization}', [CustomerAccountController::class, 'edit_organization'])->name('edit_organization');
    route::put('/customer-accounts/update-organization/{organization}', [CustomerAccountController::class, 'update_organization'])->name('update_organization');

    //contacts
    Route::get('contact/export', [ContactController::class, 'export'])->name('contacts-export');
    Route::resource('contacts', ContactController::class);
    Route::post('/get-contact-details', [CustomerAccountController::class, 'getContactDetails'])->name('get_contact_details');

    // organizations
    Route::resource('/organizations', OrganizationController::class);

    // industries
    Route::resource('industries', IndustryController::class);

    //sales
    Route::resource('sales-pipelines', SalesPipelineController::class);
    Route::resource('sales-pipeline-stages', SalesPipelineStageController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('invoices', InvoiceController::class);
    Route::resource('sale-invoices', SaleInvoiceController::class);
    Route::resource('sale-quotes', SaleQuoteController::class);

    // quotes
    Route::resource('quotes', QuoteController::class);

    // fetch quote solutions
    Route::get('/fetch/quote/{id}/solutions', [QuoteController::class, 'fetchQuoteSolutions'])->name('fetch.quote.solutions');

    // fetch invoice solutions
    Route::get('/fetch/invoice/{id}/solutions', [InvoiceController::class, 'fetchInvoiceSolutions'])->name('fetch.invoice.solutions');

    // fetch sale solutions
    Route::get('/fetch/sale/{id}/solutions', [SaleController::class, 'fetchSaleSolutions'])->name('fetch.sale.solutions');

    Route::post('get-pipeline-stage', [SaleController::class, 'getPipelineStage'])->name('get_pipeline_stage');
    Route::get('/pipeline/{pipeline}/stages', [SaleController::class, 'getStages'])->name('pipeline.stages');
    Route::get('/timezone/search', [SaleController::class, 'searchTimezones'])->name('timezone.search');
    Route::get('/fetch/solutions', [SaleController::class, 'fetchSolutions'])->name('fetch.solutions');
    Route::get('/invoice/{id}/download', [SaleController::class, 'downloadInvoice'])->name('sale.invoice.download');

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
    Route::get('get-sales', [TicketController::class, 'searchSales'])->name('search-sales');

    //Task
    route::resource('tasks', TaskController::class);
    Route::get('get-ticket', [TaskController::class, 'searchTickets'])->name('search-ticket');

    //support
    // route::resource('support-settings', SupportSettingsController::class);
    route::resource('support-pipelines', SupportPipelineController::class);
    route::resource('support-pipeline-stages', SupportPipelineStageController::class);

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

    // projects
    route::resource('projects', ProjectController::class);
    Route::post('/tasks/{id}/complete', [ProjectController::class, 'markComplete']);

    route::resource('materials-equipment', MaterialsandEquipmentController::class);

    // make safes
    route::resource('make-safes', MakeSafeController::class);
    // Route::get('/projects/{project}/make-safes/create', [MakeSafeController::class, 'create'])->name('make_safes.create');
    // Route::post('/projects/{project}/make-safes', [MakeSafeController::class, 'store'])->name('make_safe.store');


    // project settings
    route::resource('project-settings', ProjectSettingController::class);

    // referrer infos
    Route::resource('referrer-infos', ReferrerInfoController::class);

    // project types
    Route::resource('project-types', ProjectTypeController::class);
    Route::get('/project-types/{project_type}/getServiceTypes', [ProjectTypeController::class, 'getServiceTypes'])->name('getServiceTypes');


    // service types
    Route::resource('service-types', ServiceTypeController::class);

    // price lists
    Route::resource('price-lists', PricelistController::class);

    // linked service types
    Route::resource('linked-service-types', LinkedServiceTypeController::class);

    // linked service sub types
    Route::resource('linked-service-sub-types', LinkedServiceSubTypeController::class);


    // site Contacts
    route::resource('site-contacts', SiteContactController::class);

    // Communication
    route::resource('communications', CommunicationController::class);


    // linkedService
    route::resource('linked-services', LinkedServiceController::class);
    Route::post('get-sub-type', [CommonController::class, 'getsubTypes'])->name('getsubTypes');

    //custom form
    route::resource('custom-form', CustomFormController::class);
    route::put('custom-form-setting//{form_id}', [CustomFormController::class, 'updateFromSettings'])->name('updateFromSettings');

    Route::post('/save-drop-zone', [CustomFormController::class, 'dropstore']);
});

Route::GET('/user_images/{file_name}', [UserImageController::class, 'user_images'])->name('user_images');


Route::GET('/froms/{from_name}', [CustomFormController::class, 'custom_show'])->name('custom_show');
Route::Post('/from-submit/{from_name}', [CustomFormController::class, 'form_store'])->name('form_store');

// Below part is for testing. Remove it for production
Route::resource('/test', TestController::class);
