<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPenghargaan;
use App\DataPegawai;
use App\DataPenghargaanViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataPenghargaanController extends Controller
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
            $datas = DataPenghargaanViewer::where('idpegawai',Auth::user()->idpegawai)->get();
            
            
        }
        else{$datas = DataPenghargaanViewer::all(); 
        }
        
        return view('dataPenghargaan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = DataPegawai::get();

        return view('datapenghargaan.create',compact('data'));
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

        if($request->file('filesk') == ''){
            DataPenghargaan::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'penghargaan' => $request->get('penghargaan'),
                'instansi' => $request->get('instansi'),
                'tahun' => $request->get('tahun'),
                'filesk' => $request->get('filesk')
            ]);
        }
        else{
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PG"."_".time().".".$namafile;
            $tujuan_upload = 'data_penghargaan';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataPenghargaan::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'penghargaan' => $request->get('penghargaan'),
                'instansi' => $request->get('instansi'),
                'tahun' => $request->get('tahun'),
                'filesk' => $file
            ]);
        }
            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datapenghargaan.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $pegawai = DataPegawai::get();
        $data = DataPenghargaan::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        return view('datapenghargaan.edit', compact('data','pegawai','pegawais'));
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
        
        if($request->file('filesk') == ''){

            DataPenghargaan::find($id)->update([ 
            'idpegawai' => $request->get('idpegawai'),
            'penghargaan' => $request->get('penghargaan'),
            'instansi' => $request->get('instansi'),
            'tahun' => $request->get('tahun')
            ]);

        }
        
        else{

            $data = DataPenghargaan::where('id',$id)->first();
            if($data->filesk){
                File::delete('data_penghargaan/'.$data->filesk);
            }

            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PG"."_".time().".".$namafile;
            $tujuan_upload = 'data_penghargaan';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataPenghargaan::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'penghargaan' => $request->get('penghargaan'),
                'instansi' => $request->get('instansi'),
                'tahun' => $request->get('tahun'),
                'filesk' => $file
            ]);
        }

        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datapenghargaan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataPenghargaan::where('id',$id)->first();
        if($data->filesk){
            File::delete('data_penghargaan/'.$data->filesk);
        }
        
        
        
        DataPenghargaan::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datapenghargaan.index');
    }
}
