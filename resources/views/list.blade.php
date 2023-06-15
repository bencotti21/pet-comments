@extends('layout')
@section('content')
  <form method="POST" action="{{ route('comment.store') }}">
    @csrf
    <p>コメント</p>
    <textarea name="comment"></textarea>
    <input type="submit" value="コメントする">
  </form>
  @foreach ($comments as $comment)
    <p>ユーザー名・{{ date("Y年n月j日") }}
      @if (isset($comment->updated_at))
        （編集済み）
      @endif
    </p>
    <p>
      <a href="{{ route('comment.show', ['id' => $comment->id]) }}">
        {{ $comment->comment }}
      </a>
    </p>
  @endforeach
@endsection