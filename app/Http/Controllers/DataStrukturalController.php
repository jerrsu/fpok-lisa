<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataStruktural;
use App\JabatanStruktural;
use App\DataStrukturalViewer;
use App\DataPegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataStrukturalController extends Controller
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
        
        if(Auth::user()->level == 3) {
           
            $datas = DataStrukturalViewer::where('idpegawai',Auth::user()->idpegawai)
            ->get();
        }
        
        else{$datas = DataStrukturalViewer::all();
        }
        
        return view('dataStruktural.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $pegawai = DataPegawai::get();
        $struktural = JabatanStruktural::get();

        return view('datastruktural.create',compact('pegawai','struktural'));
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
            'idpegawai' => 'required',
            'idstruktural' => 'required'
        ]);

        if($request->file('filesk') == '') {
            DataStruktural::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'idstruktural' => $request->get('idstruktural'),
                'sk' => $request->get('sk'),
                'tmt' => $request->get('tmt'),
                'tmt2' => $request->get('tmt2'),
                'tgl' => $request->get('tgl'),
                'filesk'=>$request->get('filesk')
            ]);
        }
        else{
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."ST"."_".time().".".$namafile;
            $tujuan_upload = 'data_sk';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;
        

        DataStruktural::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'idstruktural' => $request->get('idstruktural'),
                'sk' => $request->get('sk'),
                'tmt' => $request->get('tmt'),
                'tmt2' => $request->get('tmt2'),
                'tgl' => $request->get('tgl'),
                'filesk'=>$file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datastruktural.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $struktural = JabatanStruktural::get();
        $pegawai = DataPegawai::get();
        $data = DataStruktural::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        $strukturals = JabatanStruktural::findOrFail($data->id);
        return view('dataStruktural.edit', compact('data','pegawai','pegawais','struktural','strukturals'));
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
            'idpegawai' => 'required',
            'idstruktural' => 'required',
            'sk' => 'required',
            'tmt' => 'required',
            'nip' => 'required',
            'tgl' => 'required',
            'tmt2' => 'required'
        ]);

        if($request->file('filesk') == '') {

            DataStruktural::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                    'idstruktural' => $request->get('idstruktural'),
                    'sk' => $request->get('sk'),
                    'tmt' => $request->get('tmt'),
                    'tmt2' => $request->get('tmt2'),
                    'tgl' => $request->get('tgl')
                ]);
        }

        else{

            $data = DataStruktural::where('id',$id)->first();
            if($data->filesk != NULL) {
                File::delete('data_sk/'.$data->filesk);
            }

            
        
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."ST"."_".time().".".$namafile;
            $tujuan_upload = 'data_sk';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataStruktural::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                    'idstruktural' => $request->get('idstruktural'),
                    'sk' => $request->get('sk'),
                    'tmt' => $request->get('tmt'),
                    'tmt2' => $request->get('tmt2'),
                    'tgl' => $request->get('tgl'),
                    'filesk'=>$file
                ]);
        }

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datastruktural.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = DataStruktural::where('id',$id)->first();
            if($data->filesk != NULL) {
                File::delete('data_sk/'.$data->filesk);
            }

        DataStruktural::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datastruktural.index');
    }
}
