<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataSkp;
use App\DataSkpViewer;
use App\DataPegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataSkpController extends Controller
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
           
            $datas = DataSkpViewer::where('idpegawai',Auth::user()->idpegawai)
            ->get();
        }
        
        else{$datas = DataSkpViewer::all();
        }
        
        return view('dataSkp.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DataPegawai::get();
        return view('dataSkp.create',compact('data'));
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
            DataSkp::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'tahun' => $request->get('tahun'),
                'filesk' => $request->get('filesk')
            ]);
        }
        else{
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."SKP"."_".time().".".$namafile;
            $tujuan_upload = 'data_skp';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataSkp::create([ 
            'idpegawai' => $request->get('idpegawai'),
            'tahun' => $request->get('tahun'),
                'filesk' => $file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('dataskp.index');

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
        $data = DataSkp::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        return view('dataSkp.edit', compact('data','pegawai','pegawais'));
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

            DataSkp::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                    'tahun' => $request->get('tahun')
                ]);
        }

        else{

            $data = DataSkp::where('id',$id)->first();
            if($data->filesk!=NULL){
                File::delete('data_skp/'.$data->filesk);
            }

            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."SKP"."_".time().".".$namafile;
            $tujuan_upload = 'data_skp';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataSkp::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'tahun' => $request->get('tahun'),
                'filesk' => $file
            ]);

        }

        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('dataskp.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataSkp::where('id',$id)->first();
        if($data->filesk!=NULL){
            File::delete('data_skp/'.$data->filesk);
        }
        
        
        
        DataSkp::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('dataskp.index');
    }
}
