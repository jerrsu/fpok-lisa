<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DataKehadiranImport;
use Illuminate\Support\Facades\Redirect;
use App\DataKehadiran;
use App\User;
use Session;
use Auth;
use DB;
use Maatwebsite\Excel\Facades\Excel;

use File;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {   
        $datas = DataKehadiran::all();
		return view('dataKehadiran.index',['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        
        return view('dataKehadiran.create');
    }

    public function store(Request $request) 
	{
		File::delete('file_kehadiran/ST.xlsx');
 
        $file = $request->file('file');
        $namafile  = $file->getClientOriginalExtension();
        $fileName = "ST.".$namafile;
        $tujuan_upload = 'file_kehadiran';
        $file->move($tujuan_upload,$fileName);
        $file = $fileName;
        
		Excel::import(new DataKehadiranImport, public_path('file_kehadiran/'.$file));
 
		alert()->success('Berhasil.','Data!');
 
        return redirect()->route('kehadiran.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $data = DataKehadiran::findOrFail($id);
        return view('dataKehadiran.edit', compact('data'));
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
            
     
        DataKehadiran::find($id)->update([
            'nip' => $request->get('nip'),
            'namapegawai' => $request->get('namapegawai'),
            'harimasuk' => $request->get('harimasuk'),
            'harikerja' => $request->get('harikerja'),
            'presentase' => $request->get('presentase'),
            'bulan' => $request->get('bulan'),
            'tahun' => $request->get('tahun')
            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('kehadiran.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        DataKehadiran::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('kehadiran.index');
    }
}
