<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataArsipKgb;
use App\PangkatGolongan;
use App\DataArsipKgbViewer;
use App\DataPegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataArsipKgbController extends Controller
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
           
            $datas = DataArsipKgbViewer::where('idpegawai',Auth::user()->idpegawai)
            ->get();
        }
        
        else{$datas = DataArsipKgbViewer::all();
        }
        
        return view('dataArsipKgb.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = DataPegawai::get();
        $pangkat = PangkatGolongan::get();

        return view('dataArsipKgb.create',compact('data','pangkat'));
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
            'idpangkat' => 'required'
        ]);

        if($request->file('filesk') == '') {

            DataArsipKgb::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'no' => $request->get('no'),
                'tgl' => $request->get('tgl'),
                'gaji' => $request->get('gaji'),
                'masa' => $request->get('masa'),
                'idpangkat' => $request->get('idpangkat'),
                'tmt' => $request->get('tmt'),
                'filesk'=>$request->get('filesk')
            ]);
        }

        else{
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."KGB"."_".time().".".$namafile;
            $tujuan_upload = 'data_arsipkgb';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataArsipKgb::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'no' => $request->get('no'),
                'tgl' => $request->get('tgl'),
                'gaji' => $request->get('gaji'),
                'masa' => $request->get('masa'),
                'idpangkat' => $request->get('idpangkat'),
                'tmt' => $request->get('tmt'),
                'filesk'=>$file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('arsipkgb.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $pangkat = PangkatGolongan::get();
        $pegawai = DataPegawai::get();
        $data = DataArsipKgb::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        $pangkats = PangkatGolongan::findOrFail($data->idpangkat);
        return view('dataArsipKgb.edit', compact('data','pegawai','pegawais','pangkat','pangkats'));
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
            'idpangkat' => 'required'
        ]);
        
        if($request->file('filesk') == '') {
           
            DataArsipKgb::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'no' => $request->get('no'),
                'tgl' => $request->get('tgl'),
                'gaji' => $request->get('gaji'),
                'masa' => $request->get('masa'),
                'idpangkat' => $request->get('idpangkat'),
                'tmt' => $request->get('tmt')
                ]);
        }
        else{

            $data = DataArsipKgb::where('id',$id)->first();
            if($data->filesk != NULL) {
                File::delete('data_arsipkgb/'.$data->filesk);
            }

            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."KGB"."_".time().".".$namafile;
            $tujuan_upload = 'data_arsipkgb';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataArsipKgb::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'no' => $request->get('no'),
                'tgl' => $request->get('tgl'),
                'gaji' => $request->get('gaji'),
                'masa' => $request->get('masa'),
                'idpangkat' => $request->get('idpangkat'),
                'tmt' => $request->get('tmt'),
                'filesk'=>$file
                ]);
        }
        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('arsipkgb.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataArsipKgb::where('id',$id)->first();
        if($data->filesk != NULL) {
            File::delete('data_arsipkgb/'.$data->filesk);
        }
        

        DataArsipKgb::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('arsipkgb.index');
    }
}
