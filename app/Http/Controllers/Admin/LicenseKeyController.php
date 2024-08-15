<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LicenseKey;
use Illuminate\Http\Request;
use SN;

class LicenseKeyController extends Controller
{
    public function index()
    {
        $data = LicenseKey::orderBy('id','DESC')->paginate(10);
        return view('admin.license.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['key'] = SN::generate();

        $create = LicenseKey::create($input);

        return true;
    }
}
