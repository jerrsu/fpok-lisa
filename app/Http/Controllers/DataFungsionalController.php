<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataFungsional;
use App\JabatanFungsional;
use App\DataFungsionalViewer;
use App\DataPegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataFungsionalController extends Controller
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
           
            $datas = DataFungsionalViewer::where('idpegawai',Auth::user()->idpegawai)
            ->get();
        }
        
        else{$datas = DataFungsionalViewer::all();
        }
        
        return view('dataFungsional.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = DataPegawai::get();
        $datas = JabatanFungsional::get();

        return view('dataFungsional.create',compact('data','datas'));
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
            'idjabatan' => 'required'
        ]);

        if($request->file('filesk') == '') {
            DataFungsional::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'idfungsional' => $request->get('idjabatan'),
                'sk' => $request->get('sk'),
                'tmt' => $request->get('tmt'),
                'tgl' => $request->get('tgl'),
                'filesk'=>$request->get('filesk')
            ]);
        }
        else{
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."FS"."_".time().".".$namafile;
            $tujuan_upload = 'data_sk';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataFungsional::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'idfungsional' => $request->get('idjabatan'),
                'sk' => $request->get('sk'),
                'tmt' => $request->get('tmt'),
                'tgl' => $request->get('tgl'),
                'filesk'=>$file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datafungsional.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $fungsional = JabatanFungsional::get();
        $pegawai = DataPegawai::get();
        $data = DataFungsional::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        $fungsionals = JabatanFungsional::findOrFail($data->idfungsional);
        return view('dataFungsional.edit', compact('data','pegawai','pegawais','fungsional','fungsionals'));
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
            'idfungsional' => 'required',
            'sk' => 'required',
            'tmt' => 'required',
            'nip' => 'required',
        ]);
        
        if($request->file('filesk') == '') {
            DataFungsional::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'idfungsional' => $request->get('idfungsional'),
                'sk' => $request->get('sk'),
                'tmt' => $request->get('tmt'),
                'tgl' => $request->get('tgl')
                ]);
        }
        else{

            $data = DataFungsional::where('id',$id)->first();
            if($data->filesk != NULL) {
                File::delete('data_sk/'.$data->filesk);
            }

            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."FS"."_".time().".".$namafile;
            $tujuan_upload = 'data_sk';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataFungsional::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'idfungsional' => $request->get('idfungsional'),
                'sk' => $request->get('sk'),
                'tmt' => $request->get('tmt'),
                'tgl' => $request->get('tgl'),
                'filesk'=>$file
                ]);
        }
        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datafungsional.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataFungsional::where('id',$id)->first();
        if($data->filesk != NULL) {
            File::delete('data_sk/'.$data->filesk);
        }
        

        DataFungsional::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datafungsional.index');
    }
}
