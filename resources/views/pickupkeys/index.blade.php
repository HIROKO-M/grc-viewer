@extends('layouts.app')

@section('content')

  <div id="wrapper" class="clearfix">
    
    <aside id="sidebar">

        {{-- スクロール表示　--}}
        
        {!! Form::open(['method' => 'post']) !!}
        {{ csrf_field() }}
            <div class="form-group">
                <select name="pickupkey" class="form-control">
                    @foreach ($keys as $key)
                        <option>{{ $key->grc_keyword }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-success">選択して検索</button>
                </div>
            </div>
        {!! Form::close() !!}
         <br>
         <br>
         <br>

        {!! Form::open(['route' => 'pickupkeys.index']) !!}
        {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="pickupkey" class="form-control">
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-success">入力して検索</button>
                </div>
            </div>
        {!! Form::close() !!}


    </aside>  
      
    <div id="main">
            @include('pickupkeys.pickupkeys', ['orders' => $orders, 'site_name' => $site_name,])
    </div>


  </div> 


@endsection