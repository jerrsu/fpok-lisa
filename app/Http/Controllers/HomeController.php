<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use App\Transaksi;
use App\Anggota;
use App\Buku;
use App\JabatanFungsional;
use App\ChartCutiModel;
use App\DataPegawai;
use App\DataFungsional;
use Auth;
use DB;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level == 3 ) {
            // Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->route('dataPegawai.index');
        }

        $pegawai = DataPegawai::get();
        $tahu   = date('Y') ;
        $jabatan_fungsional = DataFungsional::get();
        $bulan = [];
        $jumlah = [];

        $query = DB::table('data_pengajuan_cuti')
        ->select(DB::raw('CONCAT(month_name, ", ", year_number) AS bulan'),DB::raw('COUNT(*) as jumlah'),'year_number as tahun')
        // ->where('category_id', '=', 1)
        ->groupBy('month_name','year_number')
        ->orderBy('start_date', 'asc')
        ->get();

        foreach($query as $c){
            $bulan[] = $c->bulan;
            $jumlah[] = $c->jumlah;
        }


        return view('home', compact( 'jabatan_fungsional','pegawai','bulan','jumlah'));
    }

    
}
