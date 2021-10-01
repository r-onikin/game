@extends('layouts.app')

@section('content')

    <h1>タイトル: {{ $software->title }} の編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($software, ['route' => ['softwares.update', $software->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('developer_id', '開発元:') !!}
                    <select class="form-control" name="developer_id">
                        @foreach($developers as $developer)
                            <option value="{{ $developer->id }}">{{ $developer->name }}</option>
                        @endforeach  
                    </select>
                </div>
                
                <div class="form-group">
                    {!! Form::label('distributor_id', '販売元:') !!}
                    <select class="form-control" name="distributor_id">
                        @foreach($distributors as $distributor)
                            <option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
                        @endforeach  
                    </select>
                </div>
                
                <div class="form-group">
                    {!! Form::label('platform', 'プラットフォーム:') !!}
                    {!! Form::select('platform', ['sp' => 'SP', 'pc' => 'PC', 'switch' => 'Switch', 'xbox' => 'XBox', 'ps4' => 'PS4'], null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('released_day', '発売日:') !!}
                    {!! Form::date('released_day', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('played_day', 'プレイした日:') !!}
                    {!! Form::date('played_day', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection