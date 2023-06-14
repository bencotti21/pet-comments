<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ぺっとコメンツ</title>
</head>
<body>
  <p>ユーザー名・<?= date("Y年n月j日") ?></p>
  {{ $comment->comment }}
</body>
</html>