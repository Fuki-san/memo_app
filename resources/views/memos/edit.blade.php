<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>memo create</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <a href="{{ route('memos.index') }}">戻る</a>
    <h1>更新</h1>

    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- ↓の$memoは、$memo->$idでもいいが、なるべく短く。$idはlaravelが勝手に探してくれる --}}
    <form action="{{ route('memos.update', $memo) }}" method="post">
        @csrf
        @method('PATCH')
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" id="title" value="{{ old('title', $memo->title) }}">
        </p>
        <p>
            <label for="body">本文</label><br>
            <textarea name="body" class="body" id="body">{{ old('body', $memo->body) }}</textarea>
        </p>

        <input type="submit" value="更新">
    </form>
</body>

</html>
