<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Services\Vendor\Tauhid\Time\Time;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\BuiltInWebsiteSettings;
use App\Services\LocalTime;
use App\Models\WebsiteSetting;
use App\Models\PasswordResetToken;
use App\Models\Bidding;
use App\Models\BiddingCustomer;
use App\Models\Customer;
use App\Models\User;
use App\Models\Email;
use App\Models\Employee;
use App\Models\Team;
use App\Models\Project;
use App\Models\JobType;
use App\Models\WorkScope;
use App\Models\Notification;
use App\Models\QueuedEmail;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Mail\ReportEmail;
use App\Models\ProjectDuration;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\Staff;
use App\Models\StorageProvider;


DB::enableQueryLog();

class TestController extends Controller
{
    public function index()
    {
        $staff = Staff::with('user.profile_photo', 'user')->first();

        dd($staff);

        // $storage_provider = StorageProvider::find($staff->user->profile_photo->storage_provider_id);

        // $does_exist = Storage::disk($storage_provider->alias)->exists($staff->user->profile_photo->photo_path);

        // dd($does_exist);

        // return $does_exist;

        // dd(DB::getQueryLog());
    }

    public function mingcute()
    {
        return view('icons.mingcute');
    }

    public function feather()
    {
        return view('icons.feather');
    }

    public function materialSymbols()
    {
        return view('icons.material-symbols');
    }
}
