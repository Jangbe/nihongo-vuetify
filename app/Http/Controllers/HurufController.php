<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HurufController extends Controller
{
    public function index()
    {
        $huruf=DB::table('huruf')->get();
        $is_test=request()->hasCookie('soal');
        return response()->json(compact('huruf','is_test'));
    }

    public function set_quizz(Request $request)
    {
        $result = DB::table('huruf')->get();
        foreach($result as $rsl){
            if($request->jenis_huruf == 'hiragana'){
                $raws[] = ['id' => $rsl->id,'soal' => $rsl->hiragana, 'jawab' => ''];
            }else{
                $raws[] = ['id' => $rsl->id,'soal' => $rsl->katakana, 'jawab' => ''];
            }
        }
        shuffle($raws);
        date_default_timezone_set('Asia/Jakarta');
        $carbon      = new Carbon();
        $carbon      = $carbon->addMinutes($request->waktu)->format('Y-m-d H:i:s');
        $time        = cookie('waktu', $carbon, 30);
        $soal        = cookie('soal', json_encode($raws), 30);
        $jenis_huruf = cookie('jenis_huruf',ucfirst($request->jenis_huruf), 30);
        return response('Oke')->cookie($soal)->cookie($time)->cookie($jenis_huruf);
    }

    public function get_quizz(Request $request,$no=1)
    {
        if($request->hasCookie('soal')){
            $no = ($no > 0)? $no : 1;
            $soal                = json_decode($request->cookie('soal'));
            $data['jumlah']      = count($soal);
            $data['soal']        = $soal[$no - 1];
            $data['semua_soal']  = $soal;
            $data['progress']    = ($no / $data['jumlah'] * 100);
            $data['jenis_huruf'] = $request->cookie('jenis_huruf');
            $data['waktu']       = $request->cookie('waktu');
            return response()->json($data);
        }else{
            return response()->json([]);
        }
    }

    public function jawab(Request $request,$no)
    {
        if($no>0){
            $soal = json_decode($request->cookie('soal'));
            $soal[$request->no-1]->jawab = $request->jawab;
            $cookie = cookie('soal', json_encode($soal));
            return response('Oke')->cookie($cookie);
        }else{
            return response('Kosong');
        }
    }

    public function selesai(Request $request)
    {
        $huruf  = DB::table('huruf')->get();
        $soal = json_decode($request->cookie('soal'));
        $benar = 0;
        foreach($soal as $item){
            if($huruf->where('id',$item->id)->where('romaji',strtolower($item->jawab))->isNotEmpty()){
                $benar++;
            }
        }
        $cookie = cookie('hasil_test', $benar, 30);
        return response('Oke')->cookie($cookie);
    }

    public function result(Request $request)
    {
        $hasil = [];
        if($request->hasCookie('hasil_test') && $request->hasCookie('soal')){
            $data['benar'] = $request->cookie('hasil_test');
            $soal = DB::table('huruf')->get();
            $jawab = json_decode($request->cookie('soal'));
            foreach($jawab as $jwb){
                for($i = 0; $i < count($soal); $i++){
                    if($jwb->id == $soal[$i]->id){
                        $is_correct = strtolower($jwb->jawab)==$soal[$i]->romaji;
                        $hasil[] = ['soal' => $jwb->soal, 'jawab' => $jwb->jawab, 'benar' => $soal[$i]->romaji,'is_correct'=>$is_correct];
                    }
                }
            }
            $data['hasil'] = $hasil;
            $data['progress'] = $data['benar'] / count($jawab) * 100;
            $data['jumlah_soal'] = count($jawab);
            $soal  = cookie('soal', '', -60);
            $benar = cookie('hasil_test', '', -60);
            $time  = cookie('waktu', '', -60);
            $type  = cookie('jenis_huruf', '', -60);
            return response()->json($data)->cookie($soal)->cookie($benar)->cookie($time)->cookie($type);
        }else{
            return response()->json([]);
        }
    }
}
