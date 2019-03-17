
<h5>サイト名：{{$site_name}}</h5>
    
<h5>キーワード：{{$checkkeys}}</h5>

<script>
$(function () {
    $('#datatables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Japanese.json"
        },
        paging: false,          // ページャー機能 無効
        lengthChange: false,
        searching   : false,    // 検索機能 無効
        ordering    : true,     // ソート機能 無効
        
        stateSave: true,
        stateDuration: -1,

        order: [],

        columnDefs : [
            { 'title':'Yahoo順位', 'data':'y_rank', 'targets':2,
                ordable: true,              // --> カラムのソート可
                orderDataType: 'rank_sort', // --> ソート名称
            },
            { 'title':'Google順位', 'data':'g_rank', 'targets':6,
                ordable: true,              // --> カラムのソート可
                orderDataType: 'rank_sort', // --> ソート名称
            },

            { 'title':'Yahoo変化', 'data':'y_change', 'targets':3,
                ordable: true,              // --> カラムのソート可
                orderDataType: 'change_sort', // --> ソート名称
            },
            { 'title':'Google変化', 'data':'g_change', 'targets':7,
                ordable: true,              // --> カラムのソート可
                orderDataType: 'change_sort', // --> ソート名称
            },
        ],

        scrollX: true,
        scrollY: false
    });
    
    
  $.fn.dataTable.ext.order['rank_sort'] = function (settings, col){
    return this.api().column(col, {order:'index'}).nodes().map(function (td, i) {
      var value = $(td).html();
      
      if (($(td).html()) == '-'){
       value = 200;
      }
      return value;
    });
  };
  

  $.fn.dataTable.ext.order['change_sort'] = function (settings, col){
    return this.api().column(col, {order:'index'}).nodes().map(function (td, i) {

      var result = $(td).html();
      var result_up = result.replace('↑', '+' );    //「↑」を「+」へ置き換え
      var result_down = result.replace('↓', '-');   //「↓」を「-」へ置き換え
      var value;

      if (! result){                               // 空欄なら「1」を代入
         value = 1;
      }
      else if (result == '↑'){
        value = 2000;
      }
      else if (result == '↓'){
        value = -2000;
      }
      else if (result.match(/↑\d+/)){
        value = parseInt(result_up)+100;         // 100からプラス
      }
      else if (result.match(/↓\d+/)){
        value = -(parseInt(result_down))-100;   // 100からマイナス
      }

      return value;
    });
  };

    
    
    
});
</script>

@if(count($orders) > 0)
    <table id="datatables"  class="table table-striped" style="table-layout:fixed;">
        <thead>
            <tr>
                <th>日付</th>
                <!--<th>サイト名</th>-->
                <!--<th>サイトURL</th>-->
                <th style="width:100px;">検索キーワード</th>
                <th>Yahoo順位</th>
                <th>Yahoo変化</th>
                <th>Yahoo件数</th>
                <th>Yahoo URL</th>
                <th>Google順位</th>
                <th>Google変化</th>
                <th>Google件数</th>
                <th>Google URL</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->check_date }}</td>
                    <!--<td>{{ $order->grc_site_name }}</td>-->
                    <!--<td>{{ $order->grc_site_url }}</td>-->
                    <td>{{ $order->grc_keyword }}</td>
                    <td>{{ $order->y_rank }}</td>
                    <td>{{ $order->y_change }}</td>
                    <td>{{ $order->y_count }}</td>
                    <td>{{ $order->y_url }}</td>
                    <td>{{ $order->g_rank }}</td>
                    <td>{{ $order->g_change }}</td>
                    <td>{{ $order->g_count }}</td>
                    <td>{{ $order->g_url }}</td>
                </tr>
            @endforeach
                    

        </tbody>
    </table>

@endif