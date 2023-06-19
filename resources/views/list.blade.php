@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 style="font-size:20px;padding-bottom:8px"><strong>コメント一覧</strong></h2>
      </div>
    </div>
  </div>
  
  @auth
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6 mb-4">
        <form method="POST" action="{{ route('comment.store') }}">
          @csrf
          <div class="form-group mb-2">
            <textarea name="comment" style="width:100%;" class="form-control"></textarea>
          </div>
          <div style="text-align:right;">
            <input type="submit" value="コメントする">
          </div>
        </form>
      </div>
    </div>
  </div>
  @endauth

  @foreach ($comments as $comment)
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mb-2">
            <a href="{{ route('comment.show', ['id' => $comment->id]) }}" style="text-decoration:none;color:black;">
              <div class="media">
                <div class="media-body">
                  <div style="padding:8px;">
                    <span><strong>{{ $comment->user->name }}</strong></span>
                    <span class="text-muted">
                      <span>・</span>
                      <span>{{ \Common::getDiffTime($comment) }}</span>
                      <span>{{ \Common::getUpdatedWord($comment) }}</span>
                    </span>
                  </div>
                  <div style="padding:8px 16px;">
                      <span>{{ $comment->comment }}</span>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection