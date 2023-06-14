<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ぺっとコメンツ</title>
</head>
<body>
  @foreach ($comments as $comment)
    <p>ユーザー名・<?= date("Y年n月j日") ?></p>
    <p>
      <a href='{{ route("comment.show", ["id" => $comment->id]) }}'>
        {{ $comment->comment }}
      </a>
    </p>
  @endforeach
</body>
</html>