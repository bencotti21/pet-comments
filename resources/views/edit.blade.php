@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div style="margin-bottom:16px;">
          <span style="font-size:20px;font-weight:bold;padding:8px;"><a href="#" style="text-decoration:none;color:black;" onclick="history.back();">←</a></span>
          <h2 style="font-size:20px;padding:16px;display:inline;"><strong>コメント編集</strong></h2>
        </div>
        @include('error')
        <form method="POST" action="{{ route('comment.update', ['id' => $comment->id]) }}">
          @csrf
          @method('PUT')
          <div class="form-group mb-2">
            <textarea name="comment" style="width:100%;" class="form-control" rows="7">{{ $errors->any() ? old('comment') : $comment->comment }}</textarea>
          </div>
          <div style="text-align:right;">
            <input type="submit" value="更新する">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
