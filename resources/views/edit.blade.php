@extends('layouts.app')

@section('content')
  <form method="POST" action="{{ route('comment.update', ['id' => $comment->id]) }}">
    @csrf
    <p>コメント</p>
    <textarea name="comment">{{ $comment->comment }}</textarea>
    @method('PUT')
    <input type="submit" value="更新する">
  </form>
@endsection
