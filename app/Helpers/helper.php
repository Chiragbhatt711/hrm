<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\LeavesAdmin;
use App\Models\Holiday;
use App\Models\User;
use App\Models\LicenseKey;
use Carbon\Carbon;

if (!function_exists('adminId')) {
    function adminId()
    {
        $adminRol = "Admin";
        $userRole = auth()->user()->role_name;

        if($userRole == $adminRol)
        {
            $admin_id = auth()->user()->id;
        }
        else
        {
            $admin_id = auth()->user()->admin_id;
        }
        return $admin_id;
    }
}

if (!function_exists('user_permission')) {
    function user_permission($menu,$action)
    {
        if (Auth::user()->role_name != 'Admin'){
            $employee_id = auth()->user()->user_id;
            $permission = DB::table('permission_lists')
                ->leftJoin('module_permissions', function ($join) use ($employee_id) {
                    $join->on('permission_lists.id', '=', 'module_permissions.id_count')
                        ->where('module_permissions.employee_id', '=', $employee_id);
                })
                ->select('permission_lists.*', 'module_permissions.*','permission_lists.permission_name as module_permission','permission_lists.id as id_count')
                ->get()->keyBy('module_permission')->toArray();

            switch ($action) {
                case 'index':
                    if($permission[$menu]->read){
                        return true;
                    } else {
                        return false;
                    }
                    break;
                case 'create':
                    if($permission[$menu]->create){
                        return true;
                    } else {
                        return false;
                    }
                    break;
                case 'edit':
                    if($permission[$menu]->write){
                        return true;
                    } else {
                        return false;
                    }
                    break;
                case 'delete':
                    if($permission[$menu]->delete){
                        return true;
                    } else {
                        return false;
                    }
                    break;

                default:
                    return false;
                    break;
            }
        } else {
            return true;
        }
    }
}

if (!function_exists('totalLeave')) {
    function totalLeave()
    {
        $totalLeave = LeavesAdmin::where('leaves_admins.user_id',auth()->user()->user_id)
                    ->count();

        return $totalLeave;
    }
}

if (!function_exists('commingHoliday')) {
    function commingHoliday()
    {
        $admin_id = adminId();
        $holidays = Holiday::where('admin_id', $admin_id)
        ->whereRaw("STR_TO_DATE(date_holiday, '%Y-%m-%d') >= CURDATE()")
        ->orderByRaw("STR_TO_DATE(date_holiday, '%Y-%m-%d') ASC")
        ->limit(5)
        ->get();

        return $holidays;
    }
}

if(!function_exists('checkLicenseActivate'))
{
    function checkLicenseActivate()
    {
        $adminId = adminId();
        $isActivate=0;
        if($adminId){
            $admin = User::find($adminId);
            $licenseKey = $admin->license_key;
            if($licenseKey) {
                $license = LicenseKey::where('key',$licenseKey)->first();
                if($license) {
                    $activateDate = Carbon::parse($license->activate_date);
                    $currentDate = Carbon::now()->toDateTimeString();
                    $diffInDays = $activateDate->diffInDays($currentDate);
                    if($diffInDays <= $license->valid_day){
                        $isActivate = 1;
                    } else {
                        $isActivate = 0;
                    }
                } else {
                    $isActivate=0;
                }
            } else {
                $isActivate=0;
            }

        }
        return $isActivate;
    }
}
