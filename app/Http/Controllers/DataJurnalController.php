<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataJurnal;
use App\DataPegawai;
use App\DataJurnalViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataJurnalController extends Controller
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
            $datas = DataJurnalViewer::where('idpegawai',Auth::user()->idpegawai)->get();
            
            
        }
        else{$datas = DataJurnalViewer::all(); 
        }
        
        return view('dataJurnal.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DataPegawai::get();

        return view('dataJurnal.create',compact('data'));
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

        if($request->file('filejurnal') == ''){
            DataJurnal::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'namajurnal' => $request->get('namajurnal'),
                'judul' => $request->get('judul'),
                'tahun' => $request->get('tahun'),
                'link' => $request->get('link'),
                'filejurnal' => $request->get('filejurnal')
            ]);
        }
        else{
            $file = $request->file('filejurnal');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."JN"."_".time().".".$namafile;
            $tujuan_upload = 'data_jurnal';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataJurnal::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'namajurnal' => $request->get('namajurnal'),
                'judul' => $request->get('judul'),
                'tahun' => $request->get('tahun'),
                'link' => $request->get('link'),
                'filejurnal' => $file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datajurnal.index');

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
        $data = DataJurnal::findOrFail($id);
        $pegawais = DataPegawai::findOrFail($data->idpegawai);
        return view('dataJurnal.edit', compact('data','pegawai','pegawais'));
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

        if($request->file('filejurnal') == ''){

            DataJurnal::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'namajurnal' => $request->get('namajurnal'),
                'judul' => $request->get('judul'),
                'tahun' => $request->get('tahun'),
                'link' => $request->get('link')
            ]);

        }

        else{

            $data = DataJurnal::where('id',$id)->first();
            if($data->filejurnal != NULL){
                File::delete('data_Jurnal/'.$data->filejurnal);
            }
            
            $file = $request->file('filejurnal');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_"."JN"."_".time().".".$namafile;
            $tujuan_upload = 'data_jurnal';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

        DataJurnal::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'namajurnal' => $request->get('namajurnal'),
                'judul' => $request->get('judul'),
                'tahun' => $request->get('tahun'),
                'link' => $request->get('link'),
                'filejurnal' => $file
            ]);

        }

        

        alert()->success('Berhasil.','Data telah diubah!');

        return redirect()->route('datajurnal.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataJurnal::where('id',$id)->first();
        if($data->filejurnal != NULL){
            File::delete('data_Jurnal/'.$data->filejurnal);
        }
        
        
        
        DataJurnal::find($id)->delete();
        
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datajurnal.index');
    }
}
