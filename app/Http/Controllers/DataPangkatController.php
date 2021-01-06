<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPangkat;
use App\PangkatGolongan;
use App\DataPangkatViewer;
use App\DataPegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataPangkatController extends Controller
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
           
            $datas = DataPangkatViewer::where('idpegawai',Auth::user()->idpegawai)
            ->get();
        }
        
        else{$datas = DataPangkatViewer::all();
        }
        
        return view('dataPangkat.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $pegawai = DataPegawai::get();
        $pangkat = PangkatGolongan::get();

        return view('datapangkat.create',compact('pegawai','pangkat'));
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
            DataPangkat::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'idpangkat' => $request->get('idpangkat'),
                'sk' => $request->get('sk'),
                'tmt' => $request->get('tmt'),
                'tglsk' => $request->get('tglsk'),
                'pengesah' => $request->get('pengesah'),
                'filesk'=>$request->get('filesk')
            ]);
        }
        else{
            
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PG"."_".time().".".$namafile;
            $tujuan_upload = 'data_sk';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataPangkat::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'idpangkat' => $request->get('idpangkat'),
                'sk' => $request->get('sk'),
                'tmt' => $request->get('tmt'),
                'tglsk' => $request->get('tglsk'),
                'pengesah' => $request->get('pengesah'),
                'filesk'=>$file
            ]);
        }
        
            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datapangkat.index');

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
        $data = DataPangkat::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        $pangkats = PangkatGolongan::findOrFail($data->id);
        return view('dataPangkat.edit', compact('data','pegawai','pegawais','pangkat','pangkats'));
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
            'idpangkat' => 'required',
            'sk' => 'required',
            'tmt' => 'required',
            'tglsk' => 'required',
            'pengesah' => 'required'
            
            
        ]);
        
        if($request->file('filesk') == '') {

            DataPangkat::find($id)->update([ 
                    'idpegawai' => $request->get('idpegawai'),
                    'idpangkat' => $request->get('idpangkat'),
                    'sk' => $request->get('sk'),
                    'tmt' => $request->get('tmt'),
                    'tglsk' => $request->get('tglsk'),
                    'pengesah' => $request->get('pengesah')
                ]);
        }
        else{

            $data = DataPangkat::where('id',$id)->first();
            if($data->filesk != NULL) {
                File::delete('data_sk/'.$data->filesk);
            }

            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."PG"."_".time().".".$namafile;
            $tujuan_upload = 'data_sk';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataPangkat::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'idpangkat' => $request->get('idpangkat'),
                'sk' => $request->get('sk'),
                'tmt' => $request->get('tmt'),
                'tglsk' => $request->get('tglsk'),
                'pengesah' => $request->get('pengesah'),
                'filesk'=>$file
                ]);
        }

        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datapangkat.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataPangkat::where('id',$id)->first();
        File::delete('data_sk/'.$data->filesk);

        DataPangkat::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datapangkat.index');
    }
}
