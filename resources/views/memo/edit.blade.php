<x-layout>

    <form action="{{ route('memos.update', $memo->id) }}" method="POST" class="edit-form">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="content" class="form-label">No {{ $memo->id }} メモ編集</label>
            <textarea name="content" id="content" rows="4" class="form-control">{{ old('content', $memo->content) }}</textarea>
        </div>

        <div class="edit-form-buttons">
            <a href="{{ route('memos.index') }}" id="return-button">戻る</a>
            <button type="submit" id="edit-button">修正</button>
        </div>
    </form>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</x-layout>
