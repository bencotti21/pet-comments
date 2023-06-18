@extends('layouts.app')

@section('content')
  @auth
  <form method="POST" action="{{ route('comment.store') }}">
    @csrf
    <p>コメント</p>
    <textarea name="comment"></textarea>
    <input type="submit" value="コメントする">
  </form>
  @endauth
  
  @foreach ($comments as $comment)
    <p>ユーザー名・{{ \Common::getDiffTime($comment) }}
      {{ \Common::getUpdatedWord($comment) }}
    </p>
    <p>
      <a href="{{ route('comment.show', ['id' => $comment->id]) }}">
        {{ $comment->comment }}
      </a>
    </p>
  @endforeach
@endsection