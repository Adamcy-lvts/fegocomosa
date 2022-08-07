<?php




use App\Models\Category;
use App\Http\Livewire\AboutUs;
use App\Http\Livewire\Welcome;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\Admin\Roles;
use App\Http\Livewire\Blog\ShowPost;
use App\Http\Livewire\Blog\BlogIndex;
use App\Http\Livewire\UpdatePassword;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Events\ShowEvent;

use App\Http\Livewire\Admin\Permissions;
use App\Http\Livewire\Blog\PostCategory;
use App\Http\Livewire\Events\EventIndex;
use App\Http\Livewire\WelcomeMemberPage;
use App\Http\Livewire\Admin\Post\PostEdit;
use App\Http\Livewire\Members\ShowProfile;
use App\Http\Livewire\Project\ShowProject;
use App\Http\Livewire\Admin\EventDataTable;
use App\Http\Livewire\Admin\PostsDataTable;
use App\Http\Livewire\Members\MembersIndex;
use App\Http\Livewire\Project\ProjectIndex;
use App\Http\Livewire\Admin\Event\EditEvent;
use App\Http\Livewire\Admin\Post\CreatePost;
use App\Http\Livewire\RegistrationSucessful;
use App\Http\Livewire\Admin\MembersDataTable;
use App\Http\Livewire\Campaigns\CampaignShow;
use App\Http\Livewire\Members\MemberCategory;
use App\Http\Livewire\Admin\DonationDataTable;
use App\Http\Livewire\Admin\Event\CreateEvent;
use App\Http\Livewire\Admin\ProjectsDataTable;
use App\Http\Livewire\Campaigns\CampaignIndex;
use App\Http\Controllers\ImageUploadController;
use App\Http\Livewire\Profile\AdditionalUserInfo;
use App\Http\Livewire\UserCategory\CategoryIndex;
use App\Http\Livewire\UserCategory\UsersCategory;
use App\Http\Livewire\Admin\Campaign\EditCampaign;
use App\Http\Livewire\Admin\Settings\CreateMemInfo;
use App\Http\Livewire\Admin\Campaign\CreateCampaign;
use App\Http\Livewire\Admin\DonationManagement\Donors;
use App\Http\Livewire\UserDashboard\Resume\EditResume;
use App\Http\Livewire\UserDashboard\Resume\ViewResume;
use App\Http\Livewire\Admin\Settings\WelcomePageContent;
use App\Http\Livewire\UserDashboard\Resume\CreateResume;
use App\Http\Livewire\Admin\DonationManagement\Campaigns;
use App\Http\Livewire\Admin\DonationManagement\Donations;
use App\Http\Livewire\Admin\DonationManagement\Organizers;
use App\Http\Livewire\Admin\ProfessionalCategoryDataTable;

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

// Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::get('/', Welcome::class)->name('welcome');


Route::get('/about-us', AboutUs::class)->name('aboutus');
Route::get('/campaigns', CampaignIndex::class)->name('campaigns');
Route::get('/campaign/create', CreateCampaign::class)->name('campaign.create');
Route::get('/campaign/edit/{slug}', EditCampaign::class)->name('campaign.edit');
Route::get('/campaign/{slug}', CampaignShow::class)->name('campaigns.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function ()
{
    Route::get('/home', WelcomeMemberPage::class)->name('home');
    
    Route::view('/member/dashboard', 'user-dashboard/dashboard')->name('user.dashboard');
    Route::get('/password-update', UpdatePassword::class)->name('update.password');
    Route::get('/add-more-info', AdditionalUserInfo::class)->name('more.info');
    Route::get('/create/resume', CreateResume::class)->name('create.resume');
    Route::get('/view/resume', ViewResume::class)->name('view.resume');
    Route::get('/edit/resume', EditResume::class)->name('edit.resume');

    Route::get('members/profession/{slug}', UsersCategory::class)->name('category');
    Route::get('/posts', BlogIndex::class)->name('posts');
    Route::get('/category/{slug}', PostCategory::class)->name('category.post');
    Route::get('/posts/show/{slug}', ShowPost::class)->name('posts.show');
    Route::get('/members/categories', CategoryIndex::class)->name('category.index');
    Route::get('/projects', ProjectIndex::class)->name('projects.index');
    Route::get('/project/{id}', ShowProject::class)->name('show.project');
    Route::get('/events', EventIndex::class)->name('events.index');
    Route::get('/events/{slug}', ShowEvent::class)->name('show.event');
    
   
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::post('/image-url',[ ImageUploadController::class, 'imageUrl'])->name('image.uplaoder');

Route::group(['middleware' => ['role:Super-Admin|admin']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('admin/members', MembersDataTable::class)->name('members');
    Route::get('/admin/posts', PostsDataTable::class)->name('posts.data');
    Route::get('/admin/posts/create', CreatePost::class)->name('post.create');
    Route::get('/admin/posts/edit/{slug}', PostEdit::class)->name('post.edit');
    Route::get('/admin/donations', Donations::class)->name('donation.data');
    Route::get('/admin/camapigns', Campaigns::class)->name('campaign.data');
    Route::get('/admin/organizers', Organizers::class)->name('organizer.data');
    Route::get('/admin/donors', Donors::class)->name('donors.data');
    Route::get('/admin/events', EventDataTable::class)->name('event.data');
    Route::get('/admin/event/create', CreateEvent::class)->name('event.create');
    Route::get('/admin/event/edit/{slug}', EditEvent::class)->name('event.edit');

    Route::get('/admin/projects', ProjectsDataTable::class)->name('projects.data');
    Route::get('/admin/procategory', ProfessionalCategoryDataTable::class)->name('profession.category');
    Route::get('admin/roles', Roles::class)->name('roles');
    Route::get('admin/permissions', Permissions::class)->name('permissions');
    Route::get('admin/settings/welcomepage', WelcomePageContent::class)->name('welcomepage.slider');
    Route::get('admin/settings/creatememinfo', CreateMemInfo::class)->name('createinfo');
});

Route::post('/upload', 'App\Http\Controllers\UploadImageController@uploadImage')->name('image.upload');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function ()  {

    Route::get('/all/members', MembersIndex::class)->name('all.members');
    Route::get('/members/{category_slug}', MemberCategory::class)->name('category.members');
    Route::get('member/profile/{id}', ShowProfile::class)->name('member.profile');
    
});

// Redirect to Success Page after registration 
Route::get('/successful', RegistrationSucessful::class)->name('success');