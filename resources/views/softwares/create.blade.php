@extends('layouts.app')

@section('content')

    <h1>ソフトウェア新規登録ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($software, ['route' => 'softwares.store']) !!}

                <div class="form-group">
                    {!! Form::label('content', 'メッセージ:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection