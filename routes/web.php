<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BannerAndTitleController;
use App\Http\Controllers\AppointmentInfoController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\BajiChallengeController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FieldAgentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MemberProcedureController;
use App\Http\Controllers\PaymentNumberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileTabsController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RecruiterCompanyController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\Trash\StateTrashController;
use App\Http\Controllers\WebsiteSettingsController;
use App\Http\Controllers\WithdrawController;

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


/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------
*/


Route::get('/', [FrontendController::class, 'index'])->name('front.page');
Route::get('/user-profile', [FrontendController::class, 'profile'])->name('user.profile');
Route::get('/user-deposit', [FrontendController::class, 'deposit'])->name('user.deposit');
Route::get('/user-baji-chalenge', [FrontendController::class, 'bajiChalenge'])->name('user.bajiChalenge');
Route::get('/user-promotion', [FrontendController::class, 'promotion'])->name('user.promotion');
Route::get('/services-details/{id}', [WebsiteController::class, 'tech_web_services_details'])->name('services.details');
Route::get('/recruiter-page', [WebsiteController::class, 'tech_web_recruiter_details'])->name('recruiter.details');
Route::get('/memberprocedure-page', [WebsiteController::class, 'tech_web_memberprocedure_details'])->name('memberprocedure.details');
Route::get('/property-details/{id}', [WebsiteController::class, 'tech_web_property_details'])->name('property.details');
// Route::get('/state-details/{state_slug}', [WebsiteController::class, 'tech_web_state_details'])->name('state.details');
// Route::get('/division-details/{id}', [WebsiteController::class, 'tech_web_division_details'])->name('division.details');
Route::get('/all-services', [WebsiteController::class, 'tech_web_all_services'])->name('services');
Route::get('/all-properties', [WebsiteController::class, 'tech_web_all_properties'])->name('properties');
Route::get('/about-page', [WebsiteController::class, 'tech_web_about_page'])->name('about.page');
Route::get('/mission_vission-page', [WebsiteController::class, 'tech_web_mission_vission_page'])->name('mission_vission.page');
Route::get('/career-page', [WebsiteController::class, 'tech_web_career_page'])->name('career.page');
Route::get('/career-details/{id}', [WebsiteController::class, 'tech_web_career_details'])->name('career.details');
Route::get('/team-page', [WebsiteController::class, 'tech_web_team_page'])->name('team.page');
Route::get('/management-page', [WebsiteController::class, 'tech_web_management_page'])->name('management.page');
Route::get('/testimonial-page', [WebsiteController::class, 'testimonial_page'])->name('testimonial.page');
Route::get('/appointment-page', [WebsiteController::class, 'tech_web_appointment_page'])->name('appointment.page');
Route::get('/package-page', [WebsiteController::class, 'tech_web_package_page'])->name('package.page');
Route::get('/blogs-page', [WebsiteController::class, 'tech_web_blogs_page'])->name('blogs.page');
Route::get('/blogs-details/{id}', [WebsiteController::class, 'tech_web_blogs_details'])->name('blogs.details');
Route::get('/contacts', [WebsiteController::class, 'tech_web_contacts'])->name('contacts');
Route::get('/gallery-page', [WebsiteController::class, 'tech_web_gallery_page'])->name('gallery.page');
Route::get('/video-gallery-page', [WebsiteController::class, 'tech_web_video_gallery_page'])->name('video.gallery.page');
Route::post('/store-apply', [WebsiteController::class, 'tech_web_store_apply'])->name('store.apply');
Route::post('/appointment', [WebsiteSettingsController::class, 'tech_web_appointment'])->name('appointment');


//appointment end

//appointment start
Route::post('/contact', [WebsiteSettingsController::class, 'tech_web_contact'])->name('contact');
//appointment end

// Deposit
Route::resource('deposit', DepositController::class)->only('store')->middleware('auth');
Route::post('/validate-deposit-form', [DepositController::class, 'validateDepositForm']);

Route::resource('deposit', DepositController::class)->except('store')->middleware('is_super_admin');
Route::get('deposit-history', [DepositController::class, 'history'])->name('deposit.history')->middleware('is_super_admin');

Route::put('/deposit-status-status/{id}', [DepositController::class, 'updateDepositStatus'])->name('updateDepositStatus');

// withdrawal
Route::resource('withdraw', WithdrawController::class)->only('store')->middleware('auth');
Route::resource('withdraw', WithdrawController::class)->except('store')->middleware('is_super_admin');
Route::get('withdraw-history', [WithdrawController::class, 'history'])->name('withdraw.history')->middleware('is_super_admin');

Route::put('/withdraw-status-status/{id}', [WithdrawController::class, 'updateWithdrawStatus'])->name('updateWithdrawStatus');



Auth::routes();


/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------
*/
Route::prefix('user')->name('user.')->middleware(['auth'])->group(function () {
    Route::get('/transaction-record', [ProfileTabsController::class, 'transaction'])->name('transaction');

    Route::post('/claim-reward/{id}', [BajiChallengeController::class, 'claim_reward'])->name('claimReward');
});

Route::prefix('superadmin')->name('superadmin.')->middleware(['auth','is_super_admin'])->group(function () {

    Route::resource('manage-user', ManageUserController::class);
    Route::get('/admin-list', [ManageUserController::class, 'admin'])->name('admin');
    Route::get('/admin2-list', [ManageUserController::class, 'admin2'])->name('admin2');
    Route::get('/agent-list', [ManageUserController::class, 'agent'])->name('agent');
    Route::get('/agent-list/{id}', [ManageUserController::class, 'agentCommissionDetails'])->name('agentCommissionDetails');
    Route::get('/customer-list/{id}', [ManageUserController::class, 'customerCommissionDetails'])->name('customerCommissionDetails');
    Route::get('/user-status{id}', [ManageUserController::class, 'userStatus'])->name('userStatus');

    Route::resource('baji-challenge', BajiChallengeController::class);

    Route::resource('payment-number', PaymentNumberController::class)->only('index','store');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

//service start
Route::get('/add-services', [ServiceController::class, 'tech_web_add_services'])->name('add.services')->middleware('is_admin');
Route::post('/store-services', [ServiceController::class, 'tech_web_store_services'])->name('store.services')->middleware('is_admin');
Route::get('/edit-services/{id}', [ServiceController::class, 'tech_web_edit_services'])->name('edit.services')->middleware('is_admin');
Route::post('/update-services', [ServiceController::class, 'tech_web_update_services'])->name('update.services')->middleware('is_admin');
//service end

//property start
Route::get('/add-property', [PropertyController::class, 'tech_web_add_property'])->name('add.property')->middleware('is_admin');
Route::post('/store-property', [PropertyController::class, 'tech_web_store_property'])->name('store.property')->middleware('is_admin');
Route::get('/edit-property/{id}', [PropertyController::class, 'tech_web_edit_property'])->name('edit.property')->middleware('is_admin');
Route::post('/update-property', [PropertyController::class, 'tech_web_update_property'])->name('update.property')->middleware('is_admin');
//property end

//career start
Route::get('/add-career', [CareerController::class, 'tech_web_add_career'])->name('add.career')->middleware('is_admin');
Route::post('/store-career', [CareerController::class, 'tech_web_store_career'])->name('store.career')->middleware('is_admin');
Route::get('/edit-career/{id}', [CareerController::class, 'tech_web_edit_career'])->name('edit.career')->middleware('is_admin');
Route::post('/update-career', [CareerController::class, 'tech_web_update_career'])->name('update.career')->middleware('is_admin');
//career end

//photo gallery start
Route::get('/add-gallery', [GalleryController::class, 'tech_web_add_gallery'])->name('add.gallery')->middleware('is_admin');
Route::post('/store-gallery', [GalleryController::class, 'tech_web_store_gallery'])->name('store.gallery')->middleware('is_admin');
Route::get('/edit-gallery/{id}', [GalleryController::class, 'tech_web_edit_gallery'])->name('edit.gallery')->middleware('is_admin');
Route::post('/update-gallery', [GalleryController::class, 'tech_web_update_gallery'])->name('update.gallery')->middleware('is_admin');
//photo gallery end

//video gallery start
Route::get('/add-video-gallery', [GalleryController::class, 'tech_web_add_video_gallery'])->name('add.video.gallery')->middleware('is_admin');
Route::post('/store-video-gallery', [GalleryController::class, 'tech_web_store_video_gallery'])->name('store.video.gallery')->middleware('is_admin');
Route::get('/edit-video-gallery/{id}', [GalleryController::class, 'tech_web_edit_video_gallery'])->name('edit.video.gallery')->middleware('is_admin');
Route::post('/update-video-gallery', [GalleryController::class, 'tech_web_update_video_gallery'])->name('update.video.gallery')->middleware('is_admin');
//video gallery end

//about start
Route::get('/add-about', [AboutController::class, 'tech_web_add_about'])->name('add.about')->middleware('is_admin');
Route::post('/store-about', [AboutController::class, 'tech_web_store_about'])->name('store.about')->middleware('is_admin');
Route::get('/edit-about/{id}', [AboutController::class, 'tech_web_edit_about'])->name('edit.about')->middleware('is_admin');
Route::post('/update-about', [AboutController::class, 'tech_web_update_about'])->name('update.about')->middleware('is_admin');
//about end

//team start
Route::get('/add-team', [TeamController::class, 'tech_web_add_team'])->name('add.team')->middleware('is_admin');
Route::post('/store-team', [TeamController::class, 'tech_web_store_team'])->name('store.team')->middleware('is_admin');
Route::get('/edit-team/{id}', [TeamController::class, 'tech_web_edit_team'])->name('edit.team')->middleware('is_admin');
Route::post('/update-team', [TeamController::class, 'tech_web_update_team'])->name('update.team')->middleware('is_admin');
//team end

//testimonial start
Route::get('/add-testimonial', [TestimonialController::class, 'tech_web_add_testimonial'])->name('add.testimonial')->middleware('is_admin');
Route::post('/store-testimonial', [TestimonialController::class, 'tech_web_store_testimonial'])->name('store.testimonial')->middleware('is_admin');
Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'tech_web_edit_testimonial'])->name('edit.testimonial')->middleware('is_admin');
Route::post('/update-testimonial', [TestimonialController::class, 'tech_web_update_testimonial'])->name('update.testimonial')->middleware('is_admin');
//testimonial end

//Appointment info start
Route::get('/add-appointment-info', [AppointmentInfoController::class, 'tech_web_add_appointment_info'])->name('add.appointment.info')->middleware('is_admin');
Route::post('/store-appointment-info', [AppointmentInfoController::class, 'tech_web_store_appointment_info'])->name('store.appointment.info')->middleware('is_admin');
Route::get('/edit-appointment-info/{id}', [AppointmentInfoController::class, 'tech_web_edit_appointment_info'])->name('edit.appointment.info')->middleware('is_admin');
Route::post('/update-appointment-info', [AppointmentInfoController::class, 'tech_web_update_appointment_info'])->name('update.appointment.info')->middleware('is_admin');
//Appointment info end


//package start
Route::get('/add-package', [PackageController::class, 'tech_web_add_package'])->name('add.package')->middleware('is_admin');
Route::post('/store-package', [PackageController::class, 'tech_web_store_package'])->name('store.package')->middleware('is_admin');
Route::get('/edit-package/{id}', [PackageController::class, 'tech_web_edit_package'])->name('edit.package')->middleware('is_admin');
Route::post('/update-package', [PackageController::class, 'tech_web_update_package'])->name('update.package')->middleware('is_admin');
//package end

//Blogs start
Route::get('/add-blogs', [BlogController::class, 'tech_web_add_blogs'])->name('add.blogs')->middleware('is_admin');
Route::post('/store-blogs', [BlogController::class, 'tech_web_store_blogs'])->name('store.blogs')->middleware('is_admin');
Route::get('/edit-blogs/{id}', [BlogController::class, 'tech_web_edit_blogs'])->name('edit.blogs')->middleware('is_admin');
Route::post('/update-blogs', [BlogController::class, 'tech_web_update_blogs'])->name('update.blogs')->middleware('is_admin');
//Blogs end

//Management start
Route::get('/add-management', [ManagementController::class, 'tech_web_add_management'])->name('add.management')->middleware('is_admin');
Route::post('/store-management', [ManagementController::class, 'tech_web_store_management'])->name('store.management')->middleware('is_admin');
Route::get('/edit-management/{id}', [ManagementController::class, 'tech_web_edit_management'])->name('edit.management')->middleware('is_admin');
Route::post('/update-management', [ManagementController::class, 'tech_web_update_management'])->name('update.management')->middleware('is_admin');
//Management end

//Banner and Tile
Route::post('/store-banner-title', [BannerAndTitleController::class, 'tech_web_store_banner_tile'])->name('store.banner.title');
Route::get('/edit-banner-title/{id}', [BannerAndTitleController::class, 'tech_web_edit_banner_tile'])->name('edit.banner.title');
Route::post('/update-banner-title/{id}', [BannerAndTitleController::class, 'tech_web_update_banner_tile'])->name('update.banner.title');
//Banner and title

//Logo start
Route::post('/store-logo', [WebsiteSettingsController::class, 'tech_web_store_logo'])->name('store.logo');
//Logo end

//links start
Route::post('/store-links', [WebsiteSettingsController::class, 'tech_web_store_links'])->name('store.links');
//Links end

//counter start
Route::post('/store-counter', [WebsiteSettingsController::class, 'tech_web_store_counter'])->name('store.counter');
//counter end

//footer start
Route::post('/store-footer', [WebsiteSettingsController::class, 'tech_web_store_footer'])->name('store.footer');

//footer end

//banner start
Route::post('/store-main-banner', [WebsiteSettingsController::class, 'tech_web_store_main_banner'])->name('store.main.banner');
Route::get('/edit-main-banner/{id}', [WebsiteSettingsController::class, 'tech_web_edit_main_banner'])->name('edit.main.banner');
Route::post('/update-main-banner/{id}', [WebsiteSettingsController::class, 'tech_web_update_main_banner'])->name('update.main.banner');
//banner end




//general settings start
Route::get('/general-settings', [GeneralController::class, 'tech_web_general_settings'])->name('general.settings');
//general settings end

//profile settings start
Route::get('/profile-settings', [GeneralController::class, 'tech_web_profile_settings'])->name('profile.settings');
Route::post('/update-profile', [GeneralController::class, 'tech_web_update_profile'])->name('update.profile');
//profile settings end


//State start
Route::get('state/trash', [StateTrashController::class, 'trash'])
    ->name('state.trash')->middleware('is_admin');
Route::get('state/{state_slug}/restore', [StateTrashController::class, 'restore'])
    ->name('state.restore')->middleware('is_admin');
Route::delete('state/{state_slug}/forcedelete', [StateTrashController::class, 'forceDelete'])
    ->name('state.forcedelete')->middleware('is_admin');
Route::resource('state', StateController::class)->middleware('is_admin');
//State end

//division start
Route::get('/add-division', [DivisionController::class, 'tech_web_add_division'])->name('add.division')->middleware('is_admin');
Route::post('/store-division', [DivisionController::class, 'tech_web_store_division'])->name('store.division')->middleware('is_admin');
Route::get('/edit-division/{id}', [DivisionController::class, 'tech_web_edit_division'])->name('edit.division')->middleware('is_admin');
Route::post('/update-division', [DivisionController::class, 'tech_web_update_division'])->name('update.division')->middleware('is_admin');
//division end

//apply start
Route::get('/add-apply', [ApplyController::class, 'tech_web_add_apply'])->name('add.apply')->middleware('is_admin');
Route::get('/view-apply/{id}', [ApplyController::class, 'tech_web_view_apply'])->name('view.apply')->middleware('is_admin');
Route::get('/edit-apply/{id}', [ApplyController::class, 'tech_web_edit_apply'])->name('edit.apply')->middleware('is_admin');
Route::post('/update-apply', [ApplyController::class, 'tech_web_update_apply'])->name('update.apply')->middleware('is_admin');
//apply end

//faq start
Route::get('/add-faq', [FaqController::class, 'tech_web_add_faq'])->name('add.faq')->middleware('is_admin');
Route::post('/store-faq', [FaqController::class, 'tech_web_store_faq'])->name('store.faq')->middleware('is_admin');
Route::get('/edit-faq/{id}', [FaqController::class, 'tech_web_edit_faq'])->name('edit.faq')->middleware('is_admin');
Route::post('/update-faq', [FaqController::class, 'tech_web_update_faq'])->name('update.faq')->middleware('is_admin');
//faq end

//serviceprovider start
Route::get('/list-serviceprovider', [ServiceProviderController::class, 'tech_web_list_serviceprovider'])->name('list.serviceprovider')->middleware('is_admin');
Route::get('/view-serviceprovider/{id}', [ServiceProviderController::class, 'tech_web_view_serviceprovider'])->name('view.serviceprovider')->middleware('is_admin');
Route::get('/edit-serviceprovider/{id}', [ServiceProviderController::class, 'tech_web_edit_serviceprovider'])->name('edit.serviceprovider')->middleware('is_admin');
Route::post('/update-serviceprovider', [ServiceProviderController::class, 'tech_web_update_serviceprovider'])->name('update.serviceprovider')->middleware('is_admin');
//serviceprovider end

//affiliate start
Route::get('/list-affiliate', [AffiliateController::class, 'tech_web_list_affiliate'])->name('list.affiliate')->middleware('is_admin');
Route::get('/view-affiliate/{id}', [AffiliateController::class, 'tech_web_view_affiliate'])->name('view.affiliate')->middleware('is_admin');
Route::get('/edit-affiliate/{id}', [AffiliateController::class, 'tech_web_edit_affiliate'])->name('edit.affiliate')->middleware('is_admin');
Route::post('/update-affiliate', [AffiliateController::class, 'tech_web_update_affiliate'])->name('update.affiliate')->middleware('is_admin');
//affiliate end

//fieldagent start
Route::get('/list-fieldagent', [FieldAgentController::class, 'tech_web_list_fieldagent'])->name('list.fieldagent')->middleware('is_admin');
Route::get('/view-fieldagent/{id}', [FieldAgentController::class, 'tech_web_view_fieldagent'])->name('view.fieldagent')->middleware('is_admin');
Route::get('/edit-fieldagent/{id}', [FieldAgentController::class, 'tech_web_edit_fieldagent'])->name('edit.fieldagent')->middleware('is_admin');
Route::post('/update-fieldagent', [FieldAgentController::class, 'tech_web_update_fieldagent'])->name('update.fieldagent')->middleware('is_admin');
//fieldagent end

//recruiter start
Route::get('/list-recruiter', [RecruiterCompanyController::class, 'tech_web_list_recruiter'])->name('list.recruiter')->middleware('is_admin');
Route::post('/store-recruiter', [RecruiterCompanyController::class, 'tech_web_store_recruiter'])->name('store.recruiter')->middleware('is_admin');
Route::get('/edit-recruiter/{id}', [RecruiterCompanyController::class, 'tech_web_edit_recruiter'])->name('edit.recruiter')->middleware('is_admin');
Route::post('/update-recruiter', [RecruiterCompanyController::class, 'tech_web_update_recruiter'])->name('update.recruiter')->middleware('is_admin');
//recruiter end

//memberprocedure start
Route::get('/list-memberprocedure', [MemberProcedureController::class, 'tech_web_list_memberprocedure'])->name('list.memberprocedure')->middleware('is_admin');
Route::post('/store-memberprocedure', [MemberProcedureController::class, 'tech_web_store_memberprocedure'])->name('store.memberprocedure')->middleware('is_admin');
Route::get('/edit-memberprocedure/{id}', [MemberProcedureController::class, 'tech_web_edit_memberprocedure'])->name('edit.memberprocedure')->middleware('is_admin');
Route::post('/update-memberprocedure', [MemberProcedureController::class, 'tech_web_update_memberprocedure'])->name('update.memberprocedure')->middleware('is_admin');
//memberprocedure end

//company start
Route::get('/list-company', [CompanyController::class, 'tech_web_list_company'])->name('list.company')->middleware('is_admin');
Route::post('/store-company', [CompanyController::class, 'tech_web_store_company'])->name('store.company')->middleware('is_admin');
Route::get('/edit-company/{id}', [CompanyController::class, 'tech_web_edit_company'])->name('edit.company')->middleware('is_admin');
Route::post('/update-company', [CompanyController::class, 'tech_web_update_company'])->name('update.company')->middleware('is_admin');
Route::delete('/delete-company/{id}', [CompanyController::class, 'tech_web_delete_company'])->name('delete.company')->middleware('is_admin');
//company end

//product start
Route::get('/list-product', [ProductController::class, 'tech_web_list_product'])->name('list.product')->middleware('is_admin');
Route::post('/store-product', [ProductController::class, 'tech_web_store_product'])->name('store.product')->middleware('is_admin');
Route::get('/edit-product/{id}', [ProductController::class, 'tech_web_edit_product'])->name('edit.product')->middleware('is_admin');
Route::post('/update-product', [ProductController::class, 'tech_web_update_product'])->name('update.product')->middleware('is_admin');
Route::delete('/delete-product/{id}', [ProductController::class, 'tech_web_delete_product'])->name('delete.product')->middleware('is_admin');
//product end
