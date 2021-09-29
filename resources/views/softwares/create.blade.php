@extends('layouts.app')

@section('content')

    <h1>ソフトウェア新規登録ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($software, ['route' => 'softwares.store']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('developer_id', '開発元:') !!}
                    {!! Form::select('developer_id', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('distributor_id', '発売元:') !!}
                    {!! Form::select('distributor_id', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('platform', 'プラットフォーム:') !!}
                    {!! Form::select('platform', ['sp' => 'SP', 'pc' => 'PC', 'switch' => 'Switch', 'xbox' => 'XBox', 'ps4' => 'PS4'], null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('released_day', '発売日:') !!}
                    {!! Form::datetimeLocal('released_day', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('played_day', 'プレイした日:') !!}
                    {!! Form::datetimeLocal('played_day', null, ['class' => 'form-control']) !!}
                </div>
                

                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection