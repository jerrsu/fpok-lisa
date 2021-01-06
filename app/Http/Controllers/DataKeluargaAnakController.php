<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataKeluargaAnak;
use App\DataPegawai;
use App\DataKeluargaAnakViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class DataKeluargaAnakController extends Controller
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
            $datas = DataKeluargaAnakViewer::where('idpegawai',Auth::user()->idpegawai)
                                ->get();
        }
        else{$datas = DataKeluargaAnakViewer::all();}
        
        return view('dataKeluargaAnak.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DataPegawai::get();

        return view('dataKeluargaAnak.create',compact('data'));
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
            'id' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'hub' => 'required'
    	]);

        DataKeluargaAnak::create([ 
                'idpegawai' => $request->get('id'),
                'nama' => $request->get('nama'),
                'ttl' => $request->get('ttl'),
                'pendidikan' => $request->get('pendidikan'),
                'pekerjaan' => $request->get('pekerjaan'),
                'hub' => $request->get('hub'),
                'tempat' => $request->get('tempat')
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('anak.index');

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
        $data = DataKeluargaAnak::findOrFail($id);
        $datas2 = DataPegawai::findOrFail($data->idpegawai);
        return view('dataKeluargaAnak.edit', compact('data','datas','datas2'));
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
            'nama' => 'required',
            'ttl' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'hub' => 'required'
    	]);

        DataKeluargaAnak::find($id)->update([ 
                'idpegawai' => $request->get('idpegawai'),
                'nama' => $request->get('nama'),
                'ttl' => $request->get('ttl'),
                'pendidikan' => $request->get('pendidikan'),
                'pekerjaan' => $request->get('pekerjaan'),
                'hub' => $request->get('hub'),
                'tempat' => $request->get('tempat')
            ]);

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('anak.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataKeluargaAnak::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('anak.index');
    }
}
