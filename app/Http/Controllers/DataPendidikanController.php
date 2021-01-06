<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPendidikan;
use App\DataPegawai;
use App\Pendidikan;
use App\DataPendidikanViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class DataPendidikanController extends Controller
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
           
            $datas = DataPendidikanViewer::where('idpegawai',Auth::user()->idpegawai)
            ->orderBy('idpendidikan','ASC')
            ->get();
        }
        
        else{$datas = DataPendidikanViewer::all();}
        
        return view('dataPendidikan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DataPegawai::get();
        $pendidikan = Pendidikan::all();
        return view('dataPendidikan.create',compact('data','pendidikan'));
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
            'nip' => 'required'
        ]);

        if($request->file('fileijazah') == '') {

            DataPendidikan::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'idpendidikan' => $request->get('idpendidikan'),
                'sekolah' => $request->get('sekolah'),
                'program' => $request->get('program'),
                'noijazah' => $request->get('noijazah'),
                'tahun' => $request->get('tahun'),
                'lokasi'=>$request->get('lokasi'),
                'fileijazah'=>$request->get('fileijazah')
            ]);
        }
        else{
            
            $file = $request->file('fileijazah');
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_".$request->get('tingkat')."_".time().".".$namafile;
            $tujuan_upload = 'data_ijazah';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;
        

            DataPendidikan::create([ 
                'idpegawai' => $request->get('idpegawai'),
                'idpendidikan' => $request->get('idpendidikan'),
                'sekolah' => $request->get('sekolah'),
                'program' => $request->get('program'),
                'noijazah' => $request->get('noijazah'),
                'tahun' => $request->get('tahun'),
                'lokasi'=>$request->get('lokasi'),
                'fileijazah'=>$file
            ]);
        }

            

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('datapendidikan.index');

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $datas = DataPegawai::get();
        $data = DataPendidikan::findOrFail($id);
        $datas2 = DataPegawai::findOrFail($data->idpegawai);
        $pendidikan2 = Pendidikan::findOrFail($data->idpendidikan);
        $pendidikan = Pendidikan::get();
        return view('dataPendidikan.edit', compact('data','datas','datas2','pendidikan','pendidikan2'));
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
            'nip' => 'required'
        ]);
        
        if($request->file('fileijazah') == '') {

            DataPendidikan::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'idpendidikan' => $request->get('idpendidikan'),
                'sekolah' => $request->get('sekolah'),
                'program' => $request->get('program'),
                'noijazah' => $request->get('noijazah'),
                'tahun' => $request->get('tahun'),
                'lokasi'=>$request->get('lokasi')
        ]);
        } else {
            $data = DataPendidikan::where('id',$id)->first();
            File::delete('data_ijazah/'.$data->fileijazah);

            $file = $request->file('fileijazah');
            $dt = Carbon::now();
            $namafile  = $file->getClientOriginalExtension();
            $fileName = $request->get('nip')."_".$request->get('tingkat')."_".time().".".$namafile;
            $tujuan_upload = 'data_ijazah';
            $file->move($tujuan_upload,$fileName);
            $file = $fileName;

            DataPendidikan::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'idpendidikan' => $request->get('idpendidikan'),
                'sekolah' => $request->get('sekolah'),
                'program' => $request->get('program'),
                'noijazah' => $request->get('noijazah'),
                'tahun' => $request->get('tahun'),
                'lokasi'=>$request->get('lokasi'),
                'fileijazah'=>$file
        ]);
        }
    
        
        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('datapendidikan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = DataPendidikan::where('id',$id)->first();
        if($data->fileijazah != NULL) {
            File::delete('data_ijazah/'.$data->fileijazah);
        }
        

        DataPendidikan::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('datapendidikan.index');
    }

    
    
    
}
