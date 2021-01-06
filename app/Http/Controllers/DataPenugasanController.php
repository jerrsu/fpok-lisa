<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPenugasan;
use App\DataPegawai;
use App\DataPenugasanViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataPenugasanController extends Controller
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
            $datas = DataPenugasanViewer::where('idpegawai',Auth::user()->idpegawai)->get();
            
            
        }
        else{$datas = DataPenugasanViewer::all(); 
        }
        
        return view('dataPenugasan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = DataPegawai::get();

        return view('datapenugasan.create',compact('data'));
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
            DataPenugasan::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'tujuan' => $request->get('tujuan'),
                'nosurat' => $request->get('nosurat'),
                'lama' => $request->get('lama'),
                'tgl' => $request->get('tgl'),
                'filesk' => $request->get('filesk')
            ]);
        }
        else{
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PN"."_".time().".".$namafile;
            $tujuan_upload = 'data_penugasan';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataPenugasan::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'tujuan' => $request->get('tujuan'),
                'nosurat' => $request->get('nosurat'),
                'lama' => $request->get('lama'),
                'tgl' => $request->get('tgl'),
                'filesk' => $file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datapenugasan.index');

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
        $data = DataPenugasan::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        return view('dataPenugasan.edit', compact('data','pegawai','pegawais'));
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

            DataPenugasan::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'tujuan' => $request->get('tujuan'),
                'nosurat' => $request->get('nosurat'),
                'lama' => $request->get('lama'),
                'tgl' => $request->get('tgl')
            ]);
        }

        else{

            $data = DataPenugasan::where('id',$id)->first();
            if($data->filesk!=NULL){
                File::delete('data_penugasan/'.$data->filesk);
            }

            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PN"."_".time().".".$namafile;
            $tujuan_upload = 'data_penugasan';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataPenugasan::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'tujuan' => $request->get('tujuan'),
                'nosurat' => $request->get('nosurat'),
                'lama' => $request->get('lama'),
                'tgl' => $request->get('tgl'),
                'filesk' => $file
            ]);
        }

        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datapenugasan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataPenugasan::where('id',$id)->first();
        if($data->filesk!=NULL){
            File::delete('data_penugasan/'.$data->filesk);
        }
        
        
        
        DataPenugasan::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datapenugasan.index');
    }
}
