@extends('layouts.app')

@section('content')

    <h1>キーワードインポート</h1>

    {!! Form::open(['url' => url('/showimportKeyword'), 'method' => 'post', 'class' => '', 'files' => true]) !!}
        <div class="form-group">
            <input type="file" class="" name="file" value="">
        </div>
        {!! Form::submit('キーワード読み込み', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}

    @if(Session::has('message'))
      {{ session('message') }}
    @endif

@endsection