<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataArsipCuti;
use App\UnitKerja;
use App\DataArsipCutiViewer;
use App\DataPegawai;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataArsipCutiController extends Controller
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
           
            $datas = DataArsipCutiViewer::where('idpegawai',Auth::user()->idpegawai)
            ->get();
        }
        
        else{$datas = DataArsipCutiViewer::all();
        }
        
        return view('dataArsipcuti.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = DataPegawai::get();
        $units = UnitKerja::get();

        return view('dataArsipcuti.create',compact('data','units'));
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
            'id_unit_kerja' => 'required'
        ]);

        if($request->file('filesk') == '') {
            DataArsipCuti::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'jenis' => $request->get('jenis'),
                'mulai' => $request->get('mulai'),
                'selesai' => $request->get('selesai'),
                'id_unit' => $request->get('id_unit_kerja'),
                'filesk'=> $request->get('filesk')
            ]);
        }

        else{
            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."ACT"."_".time().".".$namafile;
            $tujuan_upload = 'data_arsipcuti';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataArsipCuti::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'jenis' => $request->get('jenis'),
                'mulai' => $request->get('mulai'),
                'selesai' => $request->get('selesai'),
                'id_unit' => $request->get('id_unit_kerja'),
                'filesk'=>$file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('arsipcuti.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $unit = UnitKerja::get();
        $pegawai = DataPegawai::get();
        $data = DataArsipCuti::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        $units = UnitKerja::findOrFail($data->id_unit);
        return view('dataArsipcuti.edit', compact('data','pegawai','pegawais','unit','units'));
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
            'id_unit_kerja' => 'required'
        ]);
        
        if($request->file('filesk') == '') {
           
                DataArsipCuti::find($id)->update([ 
                    'idpegawai' => $request->get('idpegawai'),
                    'jenis' => $request->get('jenis'),
                    'mulai' => $request->get('mulai'),
                    'selesai' => $request->get('selesai'),
                    'id_unit' => $request->get('id_unit_kerja')
                ]);
        }
        else{

            $data = DataArsipCuti::where('id',$id)->first();
            if($data->filesk != NULL) {
                File::delete('data_arsipcuti/'.$data->filesk);
            }

            $file = $request->file('filesk');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."ACT"."_".time().".".$namafile;
            $tujuan_upload = 'data_arsipcuti';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataArsipCuti::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'jenis' => $request->get('jenis'),
                'mulai' => $request->get('mulai'),
                'selesai' => $request->get('selesai'),
                'id_unit' => $request->get('id_unit_kerja'),
                'filesk'=>$file
                ]);
        }
        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('arsipcuti.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataArsipCuti::where('id',$id)->first();
        if($data->filesk != NULL) {
            File::delete('data_arsipcuti/'.$data->filesk);
        }
        

        DataArsipCuti::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('arsipcuti.index');
    }
}
