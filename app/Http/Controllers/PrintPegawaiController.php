<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataPegawai;
use App\DataPegawaiViewer;
use App\DataKeluargaViewer;
use App\DataKeluargaPasanganViewer;
use App\DataKeluargaAnakViewer;
use App\DataPendidikanViewer;
use App\DataFungsionalViewer;
use App\DataStrukturalViewer;
use App\DataPangkatViewer;
use App\DataDokumenViewer;
use App\DataPelatihanViewer;
use App\DataJurnalViewer;
use App\DataKepakaranViewer;
use App\DataPenelitianViewer;

use App\DataPengabdianViewer;
use App\DataPenghargaanViewer;
use App\DataPenugasanViewer;
use App\DataPeraturan;
use App\DataStudyViewer;
use App\Imports\DataUserImport;
use App\UnitKerja;
use App\Status;
use App\JabatanFUngsional;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use File;
use Maatwebsite\Excel\Facades\Excel;

class PrintPegawaiController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.upload');
    }

  


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        File::delete('file_kehadiran/user.xlsx');
 
        $file = $request->file('file');
        $namafile  = $file->getClientOriginalExtension();
        $fileName = "user.".$namafile;
        $tujuan_upload = 'file_kehadiran';
        $file->move($tujuan_upload,$fileName);
        $file = $fileName;
        
		Excel::import(new DataUserImport, public_path('file_kehadiran/'.$file));
 
		alert()->success('Berhasil.','Data!');
 
        return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
        $detailpegawai = DataPegawaiViewer::findOrFail($id);
        $ortu = DataKeluargaViewer::where('idpegawai',$id)->get();
        $anak = DataKeluargaAnakViewer::where('idpegawai',$id)->get();
        $pasangan = DataKeluargaPasanganViewer::where('idpegawai',$id)->get();
        $pendidikan = DataPendidikanViewer::where('idpegawai',$id)->get();
        $fungsional = DataFungsionalViewer::where('idpegawai',$id)->get();
        $struktural = DataStrukturalViewer::where('idpegawai',$id)->get();
        $pangkat = DataPangkatViewer::where('idpegawai',$id)->get();
        $dok = DataDokumenViewer::where('idpegawai',$id)->get();
        $jurnal = DataJurnalViewer::where('idpegawai',$id)->get();
        $kepakaran = DataKepakaranViewer::where('idpegawai',$id)->get();
        $penelitian = DataPenelitianViewer::where('idpegawai',$id)->get();
        $pelatihan = DataPelatihanViewer::where('idpegawai',$id)->get();
        $pengabdian = DataPengabdianViewer::where('idpegawai',$id)->get();        
        $penghargaan = DataPenghargaanViewer::where('idpegawai',$id)->get();
        $penugasan = DataPenugasanViewer::where('idpegawai',$id)->get();
        $peraturan = DataPeraturan::get();
        $study = DataStudyViewer::where('idpegawai',$id)->get();
        
        // return view('dataPegawai.print', compact('detailpegawai','ortu','pendidikan','fungsional','struktural','pangkat','dok',
        //             'jurnal','kepakaran','penelitian','anak','pasangan','pelatihan','pengabdian','penghargaan'
        //             ,'penugasan','peraturan','study'));
        
        
        $pdf = PDF::loadView('dataPegawai.print', compact('detailpegawai','ortu','pendidikan','fungsional','struktural','pangkat','dok',
        'jurnal','kepakaran','penelitian','anak','pasangan','pelatihan','pengabdian','penghargaan'
        ,'penugasan','peraturan','study'));

        return $pdf->download('DataIndividuPegawai');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_jabatan_fungsional
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
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
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
