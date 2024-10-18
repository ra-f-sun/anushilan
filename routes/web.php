<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ExamController;
use App\Http\Controllers\Frontend\ForgetPasswordController;
use App\Http\Controllers\Frontend\PackController;
use App\Http\Controllers\Frontend\PremiumQuestionController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\QuestionCreateController;
use App\Http\Controllers\SslCommerzPaymentController;

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


//Admin
Route::get('/backend-admin', [AdminAuthController::class, 'form'])->name('backend.login.page');
Route::post('/backend-authenticate', [AdminAuthController::class, 'authenticate'])->name('backend.authenticate');

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/backend-logout', [AdminAuthController::class, 'logout'])->name('backend.logout');
    Route::resource('category', CategoryController::class);
    Route::resource('type', TypeController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('pages', PageController::class);
    Route::resource('package', PackageController::class);
    Route::get('/orders', [OrderController::class, 'allOrder'])->name('allOrder');
    Route::get('all-contact', [ContactController::class, 'allContacts'])->name('allContacts');
});
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleHostedCheckout'])->name('checkout');
    Route::get('/package-question', [PackController::class, 'index'])->name('pack.index');
    Route::get('/package-details/{id}', [PackController::class, 'packageDetails'])->name('packageDetails');
    Route::get('/bookshelf', [PremiumQuestionController::class, 'showBookshelfCategory'])->name('premium.category');
    Route::get('/bookshelf-question/{id}', [PremiumQuestionController::class, 'questionShow'])->name('bookshelf.question');
    //my-package
    Route::get('/my-package', [PackController::class, 'showMyPackage'])->name('show.package');
    Route::get('/my-package-category/{id}', [PackController::class, 'showMyPackageCategory'])->name('show.package.category');
    Route::get('/package/question/{id}', [PackController::class, 'showMyPackageCategoryQuestion'])->name('show.package.category.question');
    Route::get('/user-profile', [ProfileController::class, 'form'])->name('user.profile');
    Route::post('/user-profile-update', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('update.password');
    Route::get('/question-create/{id}', [QuestionCreateController::class, 'questionCreate'])->name('questionCreate');
    Route::post('/generate-pdf', [QuestionCreateController::class, 'generatePDF'])->name('generate.pdf');
    Route::get('/make-question', [QuestionCreateController::class, 'makeQuestion'])->name('make.question');




    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'cart'])->name('cart.view');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeItem'])->name('cart.remove');

    //exam
    Route::get('/category-wise-exam', [ExamController::class, 'categoryWiseExam'])->name('category.exam');
    Route::get('/exam/question/{id}', [ExamController::class, 'showExamQuestion'])->name('showExamQuestion');
    Route::post('/exam', [ExamController::class, 'submitExam'])->name('submit.exam');
    // Route::get('/result', [ExamController::class, 'getResult'])->name('getResult');

});
//Reset-password
Route::get('/send-email', [ForgetPasswordController::class, 'mailSubmitPage'])->name('send.mail');
Route::get('/submit-otp', [ForgetPasswordController::class, 'submitOtpPage'])->name('submit.otp');
Route::get('/send-email', [ForgetPasswordController::class, 'mailSubmitPage'])->name('send.mail');
Route::post('send-reset-password-code-to-email',  [ForgetPasswordController::class, 'sendEmail'])->name('send.otp');

Route::post('reset-password-code-check',  [ForgetPasswordController::class, 'checkVerificationCode'])->name('check.otp');
Route::get('/new-password', [ForgetPasswordController::class, 'newPasswordForm'])->name('new.password');
Route::post('reset-password',  [ForgetPasswordController::class, 'resetPassword'])->name('change.password');

//Frontend Routes...
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/search-questions', [HomeController::class, 'searchQuestions'])->name('search.questions');
// Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/user/register', [AuthController::class, 'registration'])->name('registration');
Route::post('/frontend-authenticate', [AuthController::class, 'authenticate'])->name('frontend.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/all-class-question', [HomeController::class, 'allClass'])->name('all.class');
Route::post('/ocr', [HomeController::class, 'ocrImage'])->name('ocr');
// Route for the OCR result view
Route::get('/ocr-result', [HomeController::class, 'showOcrResult'])->name('ocr.result');
Route::get('/premium-question', [PremiumQuestionController::class, 'premiumQuestion'])->name('premium.class');

Route::get('/all-categories', [FrontendCategoryController::class, 'allCategories'])->name('allCategory');
Route::get('/details/{id}', [PremiumQuestionController::class, 'questionDetails'])->name('questionDetails');
Route::get('/contact-info', [HomeController::class, 'contactInfo'])->name('contact.show');
Route::post('/submitContact', [HomeController::class, 'SubmitContact'])->name('contact.submit');

Route::get('/{slug}', [HomeController::class, 'allPages'])->name('allPages');





// SSLCOMMERZ Start

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

//SSLCOMMERZ END
