@extends('layouts.app')

@section('content')
  <p>ユーザー名</p>
  <p><a href="{{ route('comment.edit', ['id' => $comment->id]) }}">編集</a></p>
  <form method="POST" action="{{ route('comment.delete', ['id' => $comment->id]) }}">
    @csrf
    @method('DELETE')
    <input type="submit" value="削除">
  </form>
  <p>{{ $comment->comment }}</p>
  <p>{{ $comment->created_at->format("Y年n月j日・G:i") }}
    {{ \Common::getUpdatedWord($comment) }}
  </p>
  <form method="POST" action="{{ route('comment.store', ['target_id' => $comment->id]) }}">
    @csrf
    <p>返信</p>
    <textarea name="comment"></textarea>
    <input type="submit" value="返信する">
  </form>
  @foreach ($replies as $reply)
    <p>ユーザー名・{{ \Common::getDiffTime($reply) }}
      {{ \Common::getUpdatedWord($reply) }}
    </p>
    <p>
      <a href="{{ route('comment.show', ['id' => $reply->id]) }}">
        {{ $reply->comment }}
      </a>
    </p>
  @endforeach
@endsection