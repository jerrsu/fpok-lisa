<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPengabdian;
use App\DataPegawai;
use App\DataPengabdianViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataPengabdianController extends Controller
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
            $datas = DataPengabdianViewer::where('idpegawai',Auth::user()->idpegawai)->get();
            
            
        }
        else{$datas = DataPengabdianViewer::all(); 
        }
        
        return view('dataPengabdian.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = DataPegawai::get();

        return view('datapengabdian.create',compact('data'));
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

        if($request->file('filepengabdian') == ''){
            DataPengabdian::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'judul' => $request->get('judul'),
                'sumberdana' => $request->get('sumberdana'),
                'tahun' => $request->get('tahun'),
                'filepengabdian' => $request->get('filepengabdian')
            ]);
        }
        else{
            $file = $request->file('filepengabdian');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PD"."_".time().".".$namafile;
            $tujuan_upload = 'data_pengabdian';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;
        

        DataPengabdian::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'judul' => $request->get('judul'),
                'sumberdana' => $request->get('sumberdana'),
                'tahun' => $request->get('tahun'),
                'filepengabdian' => $file
            ]);
        }
            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datapengabdian.index');

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
        $data = DataPengabdian::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        return view('datapengabdian.edit', compact('data','pegawai','pegawais'));
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
        
        if($request->file('filepengabdian') == ''){

            DataPengabdian::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'judul' => $request->get('judul'),
                'sumberdana' => $request->get('sumberdana'),
                'tahun' => $request->get('tahun')
            ]);

        }
        else{

            $data = DataPengabdian::where('id',$id)->first();
            if($data->filepengabdian!=NULL){
                File::delete('data_pengabdian/'.$data->filepengabdian);
            }

            $file = $request->file('filepengabdian');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PD"."_".time().".".$namafile;
            $tujuan_upload = 'data_pengabdian';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;
        

            DataPengabdian::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'judul' => $request->get('judul'),
                'sumberdana' => $request->get('sumberdana'),
                'tahun' => $request->get('tahun'),
                'filepengabdian' => $file
            ]);

        }

        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datapengabdian.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataPengabdian::where('id',$id)->first();
        if($data->filepengabdian!=NULL){
            File::delete('data_pengabdian/'.$data->filepengabdian);
        }
        
        
        
        DataPengabdian::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datapengabdian.index');
    }
}
