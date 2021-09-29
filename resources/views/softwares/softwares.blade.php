<h1>ソフトウェア一覧</h1>
@if (count($softwares) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>タイトル</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($softwars as $software)
            <tr>
                <td>{{ $software->id }}</td>
                <td>{{ $software->title }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- ページネーションのリンク --}}
    {{ $softwares->links() }}    
@endif
    
{{-- ソフトウェア登録ページへのリンク --}}
{!! link_to_route('sofrwares.create', '新規ソフトウェアの登録', [], ['class' => 'btn btn-primary']) !!}