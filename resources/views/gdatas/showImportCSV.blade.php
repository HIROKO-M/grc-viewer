@extends('layouts.app')

@section('content')

    <h1>CSVファイルインポート</h1>

    {!! Form::open(['url' => url('/showImportCSV'), 'method' => 'post', 'class' => '', 'files' => true]) !!}
        <div class="form-group">
            <input type="file" class="" name="file" value="">
        </div>
        {!! Form::submit('CSVファイル読み込み', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
<br>
<br>

    @if(Session::has('message'))
      {{ session('message') }}
    @endif

@endsection