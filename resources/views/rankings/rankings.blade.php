


@if(count($r_orders) > 0)
    <table id="datatables"  class="table table-striped">
        <thead>
            <tr>
                <th>チェックした日</th>
                <th>検索キーワード</th>
                <th>Yahoo順位</th>
                <th>Google順位</th>
                
            </tr>
        </thead>
        
        <tbody>
            @foreach ($r_orders as $r_order)
                <tr>
                    <td>{{ $r_order->check_date }}</td>
                    <td>{{ $r_order->grc_keyword }}</td>
                    <td>{{ $r_order->y_rank }}</td>
                    <td>{{ $r_order->g_rank }}</td>
                </tr>
              
            @endforeach
                    
            {!! $r_orders->render() !!}
        </tbody>
    </table>
    
@endif
