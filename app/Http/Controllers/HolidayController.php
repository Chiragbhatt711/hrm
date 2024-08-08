<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Holiday;
use DB;

class HolidayController extends Controller
{
    // holidays
    public function holiday()
    {
        $admin_id = adminId();
        $holiday = Holiday::where('admin_id',$admin_id)->get();
        return view('form.holidays',compact('holiday'));
    }
    // save record
    public function saveRecord(Request $request)
    {
        $admin_id = adminId();
        $request->validate([
            'nameHoliday' => 'required|string|max:255',
            'holidayDate' => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $holiday = new Holiday;
            $holiday->admin_id = $admin_id;
            $holiday->name_holiday = $request->nameHoliday;
            $holiday->date_holiday  = $request->holidayDate;
            $holiday->save();

            DB::commit();
            Toastr::success('Create new holiday successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Holiday fail :)','Error');
            return redirect()->back();
        }
    }
    // update
    public function updateRecord( Request $request)
    {
        $admin_id = adminId();
        DB::beginTransaction();
        try{
            $id           = $request->id;
            $holidayName  = $request->holidayName;
            $holidayDate  = $request->holidayDate;

            $update = [

                'id'           => $id,
                'admin_id'     => $admin_id,
                'name_holiday' => $holidayName,
                'date_holiday' => $holidayDate,
            ];

            Holiday::where('id',$request->id)->update($update);
            DB::commit();
            Toastr::success('Holiday updated successfully :)','Success');
            return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Holiday update fail :)','Error');
            return redirect()->back();
        }
    }
}
