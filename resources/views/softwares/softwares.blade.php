<h1>ソフトウェア一覧</h1>
@if (count($softwares) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>タイトル</th>
                <th>開発元</th>
                <th>販売元</th>
                <th>プラットフォーム</th>
                <th>発売日</th>
                <th>プレイした日</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($softwares as $software)
            <tr>
                <td>{{ $software->id }}</td>
                <td>{{ $software->title }}</td>
                <td>{{ $software->developer->name }}</td>
                <td>{{ $software->distributor->name }}</td>
                <td>{{ $software->platform }}</td>
                <td>{{ $software->released_day }}</td>
                <td>{{ $software->played_day }}</td>
                <td>                
                    @if (Auth::id() == $software->user_id)
                    {{-- 投稿削除ボタンのフォーム --}}
                        {!! Form::open(['route' => ['softwares.destroy', $software->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- ページネーションのリンク --}}
    {{ $softwares->links() }}    
@endif
    
{{-- ソフトウェア登録ページへのリンク --}}
{!! link_to_route('softwares.create', '新規ソフトウェアの登録', [], ['class' => 'btn btn-primary']) !!}