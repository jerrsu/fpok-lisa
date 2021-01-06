<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPelatihan;
use App\DataPegawai;
use App\DataPelatihanViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataPelatihanController extends Controller
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
            $datas = DataPelatihanViewer::where('idpegawai',Auth::user()->idpegawai)->get();
            
            
        }
        else{$datas = DataPelatihanViewer::all(); 
        }
        
        return view('dataPelatihan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = DataPegawai::get();

        return view('dataPelatihan.create',compact('data'));
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

        if($request->file('filesertifikat') == ''){
            DataPelatihan::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'namadiklat' => $request->get('namadiklat'),
                'penyelenggara' => $request->get('penyelenggara'),
                'tgl' => $request->get('tgl'),
                'nosertifikat' => $request->get('nosertifikat'),
                'jam' => $request->get('jam'),
                'filesertifikat' => $request->get('filesertifikat')
            ]);
        }
        else{
            $file = $request->file('filesertifikat');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."SF"."_".time().".".$namafile;
            $tujuan_upload = 'data_pelatihan';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataPelatihan::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'namadiklat' => $request->get('namadiklat'),
                'penyelenggara' => $request->get('penyelenggara'),
                'tgl' => $request->get('tgl'),
                'nosertifikat' => $request->get('nosertifikat'),
                'jam' => $request->get('jam'),
                'filesertifikat' => $file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datapelatihan.index');

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
        $data = DataPelatihan::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        return view('datapelatihan.edit', compact('data','pegawai','pegawais'));
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
        
        if($request->file('filesertifikat') == ''){
            
                DataPelatihan::find($id)->update([ 
                    'idpegawai' => $request->get('idpegawai'),
                    'namadiklat' => $request->get('namadiklat'),
                    'penyelenggara' => $request->get('penyelenggara'),
                    'tgl' => $request->get('tgl'),
                    'nosertifikat' => $request->get('nosertifikat'),
                    'jam' => $request->get('jam')
                ]);

        }

        else{
            $data = DataPelatihan::where('id',$id)->first();
            if($data->filesertifikat != NULL){
                File::delete('data_pelatihan/'.$data->filesertifikat);
            }

            $file = $request->file('filesertifikat');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."SF"."_".time().".".$namafile;
            $tujuan_upload = 'data_pelatihan';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataPelatihan::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'namadiklat' => $request->get('namadiklat'),
                'penyelenggara' => $request->get('penyelenggara'),
                'tgl' => $request->get('tgl'),
                'nosertifikat' => $request->get('nosertifikat'),
                'jam' => $request->get('jam'),
                'filesertifikat' => $file
            ]);
        }

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datapelatihan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataPelatihan::where('id',$id)->first();
        if($data->filesertifikat != NULL){
            File::delete('data_pelatihan/'.$data->filesertifikat);
        }
        
        
        
        DataPelatihan::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datapelatihan.index');
    }
}
