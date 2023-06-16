@extends('layouts.app')

@section('content')
  <form method="POST" action="{{ route('comment.store') }}">
    @csrf
    <p>コメント</p>
    <textarea name="comment"></textarea>
    <input type="submit" value="コメントする">
  </form>
  @foreach ($comments as $comment)
    <p>ユーザー名・{{ $comment->created_at->diffForHumans() }}
      @if ($comment->updated_at > $comment->created_at)
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