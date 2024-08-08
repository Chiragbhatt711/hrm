<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
