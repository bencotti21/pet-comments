<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ぺっとコメンツ</title>
</head>
<body>
  <form method="POST" action="{{ route('comment.update', ['id' => $comment->id]) }}">
    @csrf
    <p>コメント</p>
    <textarea name="comment">{{ $comment->comment }}</textarea>
    @method('PUT')
    <input type="submit" value="更新する">
  </form>
</body>
</html>