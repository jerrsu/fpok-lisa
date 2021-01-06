<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataFungsional;
use App\JabatanFungsional;
use App\PangkatGolongan;
use App\PengajuanKgb;
use App\DataPegawai;
use App\PengajuanKgbViewer;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class PengajuanKgbController extends Controller
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
        
        
        $datas = PengajuanKgbViewer::orderBy('created_at','DESC')->get();
        
        
        return view('pengajuanKgb.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $datapegawai = DataPegawai::get();
        $datajabatan = JabatanFungsional::get();
        $datapangkat = PangkatGolongan::get();

        return view('pengajuanKgb.create',compact('datapegawai','datajabatan','datapangkat'));
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
            'idjabatan' => 'required',
            'idpangkat' => 'required',
            'idpangkatbaru' => 'required'
        ]);

        

        $save = PengajuanKgb::create([ 
            'idpegawai' => $request->get('idpegawai'),
            'idjabatanlama' => $request->get('idjabatan'),
            'idpangkatlama' => $request->get('idpangkat'),
            'tempat' => $request->get('tempat'),
            'gajilama' => $request->get('gajilama'),
            
            'pejabat' => $request->get('pejabat'),
            'nomor' => $request->get('nomor'),
            'tgl' => $request->get('tgl'),
            'tglberlaku' => $request->get('tglberlaku'),
            'masatgl' => $request->get('masatgl'),

            'gajibaru' => $request->get('gajibaru'),
            'masakerja' => $request->get('masakerja'),
            'idpangkatbaru' => $request->get('idpangkatbaru'),
            'mulaitgl' => $request->get('mulaitgl'),
            'ket' => $request->get('ket'),
            'iddekan' => $request->get('iddekan')
        ]);
             
        // $data = PengajuanKgbViewer::findOrFail($save->id);

        alert()->success('Berhasil.','Data telah ditambahkan!');

        // return view('pengajuanKgb.view2', compact('data'));

        return redirect()->route('pengajuankgb.index');
 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $datapegawai = DataPegawai::get();
        $datajabatan = JabatanFungsional::get();
        $datapangkat = PangkatGolongan::get();
        $data = PengajuanKgbViewer::findOrFail($id);
        $getpegawai = DataPegawai::findOrFail($data->idpegawai);
        $getfungsional = JabatanFungsional::findOrFail($data->idjabatanlama);
        $getpangkatlama = PangkatGolongan::findOrFail($data->idpangkatlama);
        $getpangkatbaru = PangkatGolongan::findOrFail($data->idpangkatbaru);
        return view('pengajuanKgb.edit', compact('data','datapegawai','datajabatan','datapangkat'
        ,'getfungsional','getpegawai','getpangkatlama','getpangkatbaru'));
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
            'idjabatan' => 'required',
            'idpangkat' => 'required',
            'idpangkatbaru' => 'required'
        ]);
        

        PengajuanKgb::find($id)->update([ 
            'idpegawai' => $request->get('idpegawai'),
            'idjabatanlama' => $request->get('idjabatan'),
            'idpangkatlama' => $request->get('idpangkat'),
            'tempat' => $request->get('tempat'),
            'gajilama' => $request->get('gajilama'),
            
            'pejabat' => $request->get('pejabat'),
            'nomor' => $request->get('nomor'),
            'tgl' => $request->get('tgl'),
            'tglberlaku' => $request->get('tglberlaku'),
            'masatgl' => $request->get('masatgl'),

            'gajibaru' => $request->get('gajibaru'),
            'masakerja' => $request->get('masakerja'),
            'idpangkatbaru' => $request->get('idpangkatbaru'),
            'mulaitgl' => $request->get('mulaitgl'),
            'ket' => $request->get('ket'),
            'hasil' => $request->get('hasil'),
            'iddekan' => $request->get('iddekan')
        ]);
        
        

        alert()->success('Berhasil.','Data telah diubah!');
        // return redirect()->back();
        return redirect()->route('pengajuankgb.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        PengajuanKgb::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('pengajuankgb.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = PengajuanKgbViewer::findOrFail($id);
        $pdf = PDF::loadView('pengajuanKgb.view',compact('data'));
        return $pdf->download('hasil-kgb');
        // return view('pengajuanKgb.view2', compact('data'));
    }
}
