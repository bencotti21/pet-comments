@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 style="font-size:20px;padding-bottom:8px"><strong>コメント編集</strong></h2>
        <form method="POST" action="{{ route('comment.update', ['id' => $comment->id]) }}">
          @csrf
          @method('PUT')
          <div class="form-group mb-2">
            <textarea name="comment" style="width:100%;" class="form-control">{{ $comment->comment }}</textarea>
          </div>
          <div style="text-align:right;">
            <input type="submit" value="更新する">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
