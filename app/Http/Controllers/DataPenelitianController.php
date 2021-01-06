<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPenelitian;
use App\DataPegawai;
use App\DataPenelitianViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataPenelitianController extends Controller
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
            $datas = DataPenelitianViewer::where('idpegawai',Auth::user()->idpegawai)->get();
            
            
        }
        else{$datas = DataPenelitianViewer::all(); 
        }
        
        return view('dataPenelitian.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DataPegawai::get();

        return view('datapenelitian.create',compact('data'));
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

        if($request->file('filepenelitian') == ''){
            DataPenelitian::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'judul' => $request->get('judul'),
                'sumberdana' => $request->get('sumberdana'),
                'tahun' => $request->get('tahun'),
                'filepenelitian' => $request->get('filepenelitian')
            ]);
        }

        else{
            $file = $request->file('filepenelitian');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PN"."_".time().".".$namafile;
            $tujuan_upload = 'data_penelitian';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;
        

        DataPenelitian::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'judul' => $request->get('judul'),
                'sumberdana' => $request->get('sumberdana'),
                'tahun' => $request->get('tahun'),
                'filepenelitian' => $file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datapenelitian.index');

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
        $data = DataPenelitian::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        return view('datapenelitian.edit', compact('data','pegawai','pegawais'));
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
        
        if($request->file('filepenelitian') == ''){

            DataPenelitian::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'judul' => $request->get('judul'),
                'sumberdana' => $request->get('sumberdana'),
                'tahun' => $request->get('tahun')
            ]);

        }

        else{

            $data = DataPenelitian::where('id',$id)->first();
            if($data->filepenelitian!= NULL){
                File::delete('data_penelitian/'.$data->filepenelitian);
            }

            $file = $request->file('filepenelitian');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PN"."_".time().".".$namafile;
            $tujuan_upload = 'data_penelitian';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;
        

        DataPenelitian::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'judul' => $request->get('judul'),
                'sumberdana' => $request->get('sumberdana'),
                'tahun' => $request->get('tahun'),
                'filepenelitian' => $file
            ]);
        }

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datapenelitian.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataPenelitian::where('id',$id)->first();
        if($data->filepenelitian!= NULL){
            File::delete('data_penelitian/'.$data->filepenelitian);
        }
        
        
        DataPenelitian::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datapenelitian.index');
    }
}
