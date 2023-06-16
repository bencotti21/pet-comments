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
    @if ($comment->updated_at > $comment->created_at)
      （編集済み）
    @endif
  </p>
@endsection