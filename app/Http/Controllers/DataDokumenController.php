<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataDokumen;
use App\DataPegawai;
use App\DataDokumenViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataDokumenController extends Controller
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
            $datas = DataDokumenViewer::where('idpegawai',Auth::user()->idpegawai)->get();
            
            
        }
        else{$datas = DataDokumenViewer::all(); 
        }
        
        return view('dataDokumen.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DataPegawai::get();

        return view('dataDokumen.create',compact('data'));
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

        if($request->file('filedok') == '') {
            DataDokumen::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'kategori' => $request->get('kategori'),
                'namadok' => $request->get('namadok'),
                'ket' => $request->get('ket'),
                'filedok' => $request->get('filedok')
            ]);
        }

        else{
            $file = $request->file('filedok');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."DOK"."_".time().".".$namafile;
            $tujuan_upload = 'data_dok';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataDokumen::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'kategori' => $request->get('kategori'),
                'namadok' => $request->get('namadok'),
                'ket' => $request->get('ket'),
                'filedok' => $file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datadokumen.index');

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
        $data = DataDokumen::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        return view('dataDokumen.edit', compact('data','pegawai','pegawais'));
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
            'kategori' => 'required',
            'namadok' => 'required',
            'ket' => 'required',
            'nip'=>'required'
    	]);
        if($request->file('filedok') == '') {

            DataDokumen::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'kategori' => $request->get('kategori'),
                'namadok' => $request->get('namadok'),
                'ket' => $request->get('ket')
                ]);
        }
        else{
            $data = DataDokumen::where('id',$id)->first();
        
            if($data->filedok != NULL){
                File::delete('data_dok/'.$data->filedok);
            }

            $file = $request->file('filedok');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."DOK"."_".time().".".$namafile;
            $tujuan_upload = 'data_dok';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataDokumen::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'kategori' => $request->get('kategori'),
                'namadok' => $request->get('namadok'),
                'ket' => $request->get('ket'),
                'filedok' => $file
                ]);
        }
        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datadokumen.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataDokumen::where('id',$id)->first();

        if($data->filedok != NULL){
            File::delete('data_dok/'.$data->filedok);
        }
        
        
        DataDokumen::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datadokumen.index');
    }
}
