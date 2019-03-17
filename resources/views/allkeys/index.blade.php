@extends('layouts.app')

@section('content')

 {{-- @include('allkeys.test_allkeys') --}}
   
    <div id="wrapper" class="clearfix">
        <div id="main_top">
            <h3>最終データ更新日：{{$date}}</h3>
        </div>
    
          <aside id="sidebar_top">
            {{-- スクロール表示　--}}
        
            {!! Form::open(['method' => 'post']) !!}
            {{ csrf_field() }}
                <div class="form-group">
                    <select name="selgroup" class="form-control">
                        <option>グループを選択してください。</option>
                        @foreach ($d_groups as $d_group)
                            <option>{{ $d_group }}</option>
                        @endforeach
                        <option>すべてのグループ</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success"  style="margin:0px; float:left;">グループ選択</button>
                </div>
            {!! Form::close() !!}
      </aside> 
    </div>  



@include('allkeys.allkeys', ['orders' => $orders,])

<br>
<br>

<h3>キーワード：{{$selkey}}</h3>

<div class="chart">
    


<canvas id="myChart" width="600" height="100"></canvas>
<script>
var day= JSON.parse('<?php echo json_encode($checkeddays); ?>');

var granking= JSON.parse('<?php echo json_encode($granks_rep); ?>');
var yranking= JSON.parse('<?php echo json_encode($yranks_rep); ?>');
var ranks_max= JSON.parse('<?php echo json_encode($ranks_max); ?>');


var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: day, //check_dateの値をx軸として表示されるようにしたい
        datasets: [{
            label: "Yahoo Ranking",
            backgroundColor: 'rgb(255, 255, 255)',
            borderColor: 'rgb(255, 99, 132)',
            data: yranking,
            fill: false,
            lineTension: 0,             // ペルジェ曲線→直線
            spanGaps: false,
            }, 
            {
            label: "Google Ranking",
            backgroundColor: 'rgb(255, 255, 255)',
            borderColor: 'rgb(54, 162, 235)',
            data: granking,
            fill: false,
            lineTension: 0,             // ペルジェ曲線→直線
            spanGaps: false,
        }
        ]
    },

    // Configuration options go here
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    reverse: true,//reverse: true, //y軸の反転(1位を上にして昇順で表示)
                    max: ranks_max,
                    min: 1,
//                    stepSize: 1,
                }
            }],
            xAxes: [{
                ticks: {
                    reverse: false, //x軸は反転しない
                }
            }]
        }
    },
});
</script>
</div>


@endsection

