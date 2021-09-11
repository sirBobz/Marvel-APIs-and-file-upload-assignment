<?php

namespace App\Http\Controllers\V1;

use App\DataTables\SalesDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Http\Requests\V1\FileUpload;
use App\Imports\SaleFileUpload;
use RealRashid\SweetAlert\Facades\Alert;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(SalesDataTable $dataTable, Request $request)
    {
        return $dataTable->render('V1.File.index');
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
    public function store(FileUpload $request)
    {
        try {
            (new SaleFileUpload)->queue($request->file('import_file'));

            Alert::success('Success', 'Operation successful');

        } catch (Exception $e) {

            Alert::error('Error', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
