<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Collection;
use App\Gdata;


class PickupkeysController extends Controller
{
    public function index(Request $request)
    {


// キーワードをcheckbox で複数選択する場合に利用。まだ不完全
//        $checkkeys = $request->all();
//        $orders = Gdata::orderBy('created_at', 'desc')->whereIn('grc_keyword', $checkkeys)-> paginate(20);    // gdates からcheck_date順にpickupkeysで洗濯されたデータのみ20個ずつ取り出し



// キーワード選択で利用
        $date = Gdata::orderBy('created_at', 'desc')->value('check_date');
        $keys = Gdata::orderBy('grc_keyword', 'desc')->where('check_date', '=', $date)->get();    // gdates からcheck_date順に取り出し
        

// キーワード選択後の一覧表示で利用
        $pickupkeys = request()->pickupkey;
//        $orders = Gdata::orderBy('created_at', 'desc')->where('grc_keyword', $pickupkeys)-> paginate(20);    // gdates からcheck_date順にpickupkeysで洗濯されたデータのみ20個ずつ取り出し
        $pickupkeyword = '%'.$pickupkeys.'%';
        $orders = Gdata::orderBy('created_at', 'desc')->where('grc_keyword', 'like', $pickupkeyword)->get();    // gdates からcheck_date順にpickupkeysで洗濯されたデータのみ20個ずつ取り出し

//error_log(var_dump($pickupkeys));

        $site_name = Gdata::orderBy('grc_keyword', 'desc')->where('grc_keyword', $pickupkeys)->value('grc_site_name');
        
        //error_log(var_dump($site_name));

        return view('pickupkeys.index', [
            'orders' => $orders,
            'keys' => $keys,
            'site_name' => $site_name,
            'checkkeys' => $pickupkeys,
        ]);
        
    }


}
