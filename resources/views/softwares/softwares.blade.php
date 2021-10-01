<h1>ソフトウェア一覧</h1>
@if (count($softwares) > 0)
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>プレイ日</th>
                <th>詳細</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($softwares as $software)
            <tr>
                <td>{!! link_to_route('softwares.edit', $software->title, ['software' => $software->id],) !!}</td>
                <td>{{ $software->played_day }}</td>
                <td>{!! link_to_route('softwares.show', "表示", ['software' => $software->id], ['class' => 'btn btn-primary']) !!}</td>              
                <td>
                    @if (Auth::id() == $software->user_id)
                    {{-- 削除ボタンのフォーム --}}
                        {!! Form::open(['route' => ['softwares.destroy', $software->id], 'method' => 'delete']) !!}
                            <button type="submit" class="btn btn-link">
                                <i class="fas fa-trash-alt" style="color:red"></i>
                            </button>
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