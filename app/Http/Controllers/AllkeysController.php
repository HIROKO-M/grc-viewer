<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Gdata;

class AllkeysController extends Controller
{

    public function index(Request $request)
    {
//        $date = Gdata::orderBy('created_at', 'desc')->value('check_date');
        $date = Gdata::orderBy('check_date', 'desc')->value('check_date');
    
//グループの選択
        $selgroup = $request -> selgroup;
        $allgroups = Gdata::where('check_date', '=', $date)->lists('grc_site_name'); //DBから全グループ名取得
    
        $groups = array();
        $groups = $allgroups->toArray();            //$allgroups を配列にキャスト

        $d_groups = array();
        $d_groups = array_unique($groups);             // check_date の重複を削除


//最新データの一覧表
        
        //全データ
//        $allorders = Gdata::orderBy('created_at', 'desc')->where('check_date', '=', $date)->get();    // gdates からcheck_date順に取り出し
        $allorders = Gdata::orderBy('check_date', 'desc')->where('check_date', '=', $date)->get();    // gdates からcheck_date順に取り出し
        //グループ選択後のデータ
//        $selorders = Gdata::orderBy('created_at', 'desc')->where('check_date', '=', $date)->where('grc_site_name', '=', $selgroup)->get();
        $selorders = Gdata::orderBy('check_date', 'desc')->where('check_date', '=', $date)->where('grc_site_name', '=', $selgroup)->get();

        if(isset($selgroup)){
            if(($selgroup != 'すべてのグループ')){
                $orders = $selorders;
            }
            else{
                $orders = $allorders;
            }
        }
        else{
            $orders = $allorders;
        }
/*        $orders_array = $orders->toArray();                     //一旦オブジェクト->配列にキャスト
        $orders_rep = str_replace ("-", "Unranked", $orders_array);  // 一覧表示のため、「-」→「圏外」へ置き換え
        $orders_obj = (object) $orders_rep;                   //配列をオブジェクトに戻す
*/
//error_log(var_dump($orders_array));
//error_log(var_dump($orders_obj));

        // ランキングチャート用キーワードを選択する
        $selkeys = $request -> all();
//        $selkey = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)->value('grc_keyword');
        $selkey = Gdata::orderBy('check_date', 'desc')->whereIn('grc_keyword', $selkeys)->value('grc_keyword');


        // ランキング表示のためのキーワード選択で利用
//        $d_obj = Gdata::orderBy('created_at', 'asc')->whereIn('grc_keyword', $selkeys)->lists('check_date');
//        $y_obj = Gdata::orderBy('created_at', 'asc')->whereIn('grc_keyword', $selkeys)->lists('y_rank');
//        $g_obj = Gdata::orderBy('created_at', 'asc')->whereIn('grc_keyword', $selkeys)->lists('g_rank');
        $d_obj = Gdata::orderBy('check_date', 'asc')->whereIn('grc_keyword', $selkeys)->lists('check_date');
        $y_obj = Gdata::orderBy('check_date', 'asc')->whereIn('grc_keyword', $selkeys)->lists('y_rank');
        $g_obj = Gdata::orderBy('check_date', 'asc')->whereIn('grc_keyword', $selkeys)->lists('g_rank');
          
// error_log(var_dump($d_obj));
        
        $d_array = array();
        $y_array = array();
        $g_array = array();
        $d_array = $d_obj->toArray();            //$d_obj を配列にキャスト
        $y_array = $y_obj->toArray();            //$y_obj を配列にキャスト
        $g_array = $g_obj->toArray();            //$g_obj を配列にキャスト
        
//error_log(var_dump($y_array));

        $yranks_rep = str_replace('-', 200, $y_array);     // Chart表示のため、「-」→「200」へ置き換え
        $granks_rep = str_replace('-', 200, $g_array);     // Chart表示のため、「-」→「200」へ置き換え
        
        if(isset($selkey)){
            $yranks = array_map(function($value){ return (int)$value; }, $yranks_rep);  //int型に型変更
            $granks = array_map(function($value){ return (int)$value; }, $granks_rep); //int型に型変更
        }
        else{
            $yranks = array(200);
            $granks = array(200);
        }
//error_log(var_dump($yranks));

        $yranks_max = max($yranks);
        $granks_max = max($granks);
        //$yranks_max = max(array(200));
        //$granks_max = max(array(200));

        
        $ranks_max_mod = 0;
        if ((61 <= $granks_max)) {
            $ranks_max_mod = 100;
        } elseif (($granks_max >= 41) && ( $granks_max <= 60)) {
            $ranks_max_mod = 80;
        } elseif ((($yranks_max >= 21) or ($granks_max >= 21)) && (( $yranks_max <= 40) or ( $granks_max <= 40))) {
            $ranks_max_mod = 50;
        } elseif ((($yranks_max >= 11) or ($granks_max >= 11)) && (( $yranks_max <= 20) or ( $granks_max <= 20))) {
            $ranks_max_mod = 30;
        } else {
            $ranks_max_mod = 10;
        }
        
        /* $ranks = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $selkeys)->get()->map(function ($item, $key) {
             return $item->y_rank;
         
         error_log(var_dump($ranks->toArray()));
        */
        
        
        /* これでとりあえず配列に出来る。（スマートとは言えないが）
        $huga = array();
        $g_array = array();
        $y_array = array();
        foreach($ranks as $rank) {
            array_push($huga, $rank->check_date);
            array_push($y_array, $rank->y_rank);
            array_push($g_array, $rank->g_rank);
        }
        
        $rankday = array();
        $rankday = array_unique($huga);             // check_date の重複を削除
        
        
        
        $yranks_rep = str_replace('0', '100', $yranks);       // Chart表示のため、「0」→「100」へ置き換え
        $granks_rep = str_replace('0', '100', $granks);     // Chart表示のため、「0」→「100」へ置き換え
        */


        return view('allkeys.index', [
            'orders' => $orders,
            'date' => $date,
            'yranks_rep' => $yranks,
            'granks_rep' => $granks,
            'checkeddays' => $d_array,
            'selkey' => $selkey,
            'd_groups' => $d_groups,
//            'orders_array' => $orders_array,
            'ranks_max' =>$ranks_max_mod,
        ]);
        

    }
}
