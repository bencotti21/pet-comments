<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ぺっとコメンツ</title>
</head>
<body>
  <p>ユーザー名</p>
  <form method="POST" action="{{ route('comment.delete', ['id' => $comment->id]) }}">
    @csrf
    @method('DELETE')
    <input type="submit" value="削除">
  </form>
  <p>{{ $comment->comment }}</p>
  <p><?= date("Y年n月j日・G:i") ?></p>
</body>
</html>