
<script type="text/javascript">
$(function () {
    $('#datatables').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Japanese.json"
        },
        paging: false,
        lengthChange: false,
        searching: true,
        ordering: true,
        
        stateSave: true,
        stateDuration: -1,
        
        
  
        
        
        columnDefs : [
            { 'title':'キーワード', 'data':'keyword', 'targets':1,
                ordable: true,              // --> カラムのソート可
                orderDataType: 'test_Keyword', // --> ソート名称

            },
            { 'title':'ランク', 'data':'rank', 'targets':3,
                ordable: true,              // --> カラムのソート可
                orderDataType: 'test_data', // --> ソート名称
            },
            
        ],
        
        order: [],

        stateSave: true,
        scrollX: true,
        scrollY: 300,

    });

  $.fn.dataTable.ext.order['test_Keyword'] = function (settings, col){
    return this.api().column(col, {order:'index'}).nodes().map(function (td, i) {

      var result = $(td).html();

 console.log(result);

      var result_up = result.replace('↑', '+' );
      var result_down = result.replace('↓', '-');
      
      var value;
      
// console.log(result.match(/↑\d+/));
// console.log(result_up);

      if (! result){
         value = 1;

      }
      else if (result == '↑'){
        value = 2000;

      }
      else if (result == '↓'){
        value = -2000;

}
      else if (result.match(/↑\d+/)){
        value = parseInt(result_up)+100;

      
      }
      else if (result.match(/↓\d+/)){
        value = -(parseInt(result_down))-100;
        

      }
console.log(value);

      return value;

    });
  };



  $.fn.dataTable.ext.order['test_data'] = function (settings, col){
    return this.api().column(col, {order:'index'}).nodes().map(function (td, i) {
      var value = $(td).html();
      if (($(td).html()) == '-'){
       value = 200;
      }
      return value;
    });
  };
  
});

</script>
            
<?php
 $orders = array();
 $orders = array(   
1=>array("saite_name"=>'圏外からin',   "keyword"=>'↑', "chenge"=>100,   "rank"=>20), 
2=>array("saite_name"=>'10UP', "keyword"=>'↑10',  "chenge"=>20,    "rank"=>2), 
3=>array("saite_name"=>'2UP',   "keyword"=>'↑2',   "chenge"=>2,     "rank"=>3), 
4=>array("saite_name"=>'1UP', "keyword"=>'↑1',  "chenge"=>'↓11', "rank"=>100), 
5=>array("saite_name"=>'変化なし', "keyword"=>'',  "chenge"=>1,     "rank"=>'-'), 
6=>array("saite_name"=>'1DOWN',  "keyword"=>'↓1',  "chenge"=>3,     "rank"=>10), 
7=>array("saite_name"=>'2DOWN',   "keyword"=>'↓2', "chenge"=>100,   "rank"=>20), 
8=>array("saite_name"=>'10DOWN',  "keyword"=>'↓10',   "chenge"=>100,   "rank"=>1), 
9=>array("saite_name"=>'圏外へout',  "keyword"=>'↓',   "chenge"=>100,   "rank"=>1), 

);
//　error_log(var_dump($orders));
?>

<table id="datatables" class="table table-striped" width="100%">
    <thead>
                    <tr>
                        <th>サイト名</th>
                        <th>キーワード</th>
                        <th>変化</th>
                        <th>ランク</th>
                    </tr>
                </thead>
    <tbody>
<?php
foreach($orders as $order_arr){
    
        echo  "<tr>\n";
        echo  "<td>".$order_arr['saite_name']."</td>\n";
        echo  "<td>".$order_arr['keyword']."</td>\n";
        echo  "<td>".$order_arr['chenge']."</td>\n";
        echo  "<td>".$order_arr['rank']."</td>\n";
        echo  "</tr>\n";
}
?>
</tbody>


</table>


