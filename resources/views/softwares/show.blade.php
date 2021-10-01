@extends('layouts.app')

@section('content')

    <h2> {{ $software->title }} の詳細ページ</h2>

    <table class="table table-bordered">
        <tr>
            <th>タイトル</th>
            <td>{{ $software->title }}</td>
        </tr>
        <tr>
            <th>開発元</th>
            <td>{{ $software->developer->name }}</td>
        </tr>
        <tr>
            <th>販売元</th>
            <td>{{ $software->distributor->name }}</td>
        </tr>
        <tr>
            <th>プラットフォーム</th>
            <td>{{ $software->platform }}</td>
        </tr>
        <tr>
            <th>発売日</th>
            <td>{{ $software->released_day }}</td>
        </tr>
        <tr>
            <th>プレイした日</th>
            <td>{{ $software->played_day }}</td>
        </tr>
        <tr>
            <th>登録日</th>
            <td>{{ $software->created_at->format('Y-m-d') }}</td>
        </tr>
        <tr>
            <th>更新日</th>
            <td>{{ $software->updated_at->format('Y-m-d') }}</td>
        </tr>
    </table>

    {{-- メッセージ編集ページへのリンク --}}
    {!! link_to_route('softwares.edit', 'このソフトウェアを編集', ['software' => $software->id], ['class' => 'btn btn-primary mb-3']) !!}

    {{-- メッセージ削除フォーム --}}
    {!! Form::model($software, ['route' => ['softwares.destroy', $software->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection