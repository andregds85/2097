<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportUsers;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;


class Import_Export_Controller extends Controller
{
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }


    public function importExport()
    {
       return view('import');
    }

    public function export()
    {
        return Excel::download(new ExportUsers, 'users.xlsx');
    }

    public function import()
    {
        Excel::import(new ImportUsers, request()->file('file'));

        return back();
    }
}
