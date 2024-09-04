<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LicenseKey;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use PDF;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // main dashboard
    public function index()
    {
        $admin_id = adminId();

        $totalEmployee = Employee::where('admin_id',$admin_id)->count();
        return view('dashboard.dashboard',compact('totalEmployee'));
    }
    // employee dashboard
    public function emDashboard()
    {
        $dt        = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        return view('dashboard.emdashboard',compact('todayDate'));
    }

    public function generatePDF(Request $request)
    {
        // $data = ['title' => 'Welcome to ItSolutionStuff.com'];
        // $pdf = PDF::loadView('payroll.salaryview', $data);
        // return $pdf->download('text.pdf');
        // selecting PDF view
        $pdf = PDF::loadView('payroll.salaryview');
        // download pdf file
        return $pdf->download('pdfview.pdf');
    }

    public function licenseVerify(Request $request)
    {
        $key = $request->licenseKeyField;
        $licenseData = LicenseKey::where('key',$key)->first();
        if($licenseData){
            if($licenseData->activate_date == ""){
                $licenseData->update(['activate_date'=>Carbon::now()->toDateTimeString()]);
            }
            $userUpdate = User::find(auth()->user()->id);
            $userUpdate->update(['license_key'=>$key]);

            return response()->json(['success'=>'Licess activate successfully']);
        } else {
            return response()->json(['error'=>'Invalide license key']);
        }
    }
}
