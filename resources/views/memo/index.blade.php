<x-layout>
    <div class="container">
        <div class="container-index">
            <form action="{{ route('memos.store') }}" method="post">
                @csrf
                <label>新規登録</label>
                <input type="text" name="content" placeholder="New Memo...">
                <button type="submit">登録</button>
            </form>

            @if($errors->any())
                <div class="errors">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h2>メモ一覧</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>メモ内容</th>
                    <th>作成日時</th>
                    <th>編集日時</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($memos as $memo)
                    <tr>
                        <td>{{ $memo->id }}</td>
                        <td>{{ $memo->content }}</td>
                        <td>{{ $memo->created_at }}</td>
                        <td>{{ $memo->updated_at }}</td>
                        <td>
                            <a href="{{ route('memos.edit', ['memo' => $memo->id]) }}" id="edit-button">編集</a>
                        </td>
                        <td>
                            <form action="{{ route('memos.destroy', ['memo' => $memo->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  id="delete-button" onclick="return confirm('本当に削除してよろしいですか？')">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
