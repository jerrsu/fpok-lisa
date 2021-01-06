<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataKepakaran;
use App\DataKepakaranViewer;
use App\DataPegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataKepakaranController extends Controller
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
        // $nip = Auth::get();

        if(Auth::user()->level == 3) {
            $datas = DataKepakaranViewer::where('idpegawai',Auth::user()->idpegawai)
                                ->get();
        }
        else{$datas = DataKepakaranViewer::all();}
        
        return view('dataKepakaran.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DataPegawai::get();

        return view('datakepakaran.create',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        $this->validate($request,[
            'idpegawai' => 'required'
    	]);

        DataKepakaran::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'bidang' => $request->get('bidang'),
                'matakuliah' => $request->get('matakuliah')
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datakepakaran.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $datas = DataPegawai::get();
        $data = DataKepakaran::findOrFail($id);
        $datas2 = DataPegawai::findOrFail($data->idpegawai);
        return view('dataKepakaran.edit', compact('data','datas','datas2'));
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
        $this->validate($request,[

            'idpegawai' => 'required'
    	]);

        DataKepakaran::find($id)->update([ 
            'idpegawai' => $request->get('idpegawai'),
            'bidang' => $request->get('bidang'),
            'matakuliah' => $request->get('matakuliah')
            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datakepakaran.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataKepakaran::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datakepakaran.index');
    }
}
