@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 style="font-size:20px;padding-bottom:8px"><strong>コメント詳細</strong></h2>
        <div class="card mb-4">
          <div style="padding:8px;">
            <span><strong>{{ $comment->user->name }}</strong></span>
            
            @if (Auth::id() === $comment->user_id)
              <span style="float:right;">
                <a href="{{ route('comment.edit', ['id' => $comment->id]) }}" style="text-decoration:none;color:black;"
                 onclick="event.preventDefault();
                         document.getElementById('comment-delete-form').submit();">［削除］</a>
                
                <form id="comment-delete-form" method="POST" action="{{ route('comment.delete', ['id' => $comment->id]) }}">
                  @csrf
                  @method('DELETE')
                </form>
              </span>
              <span style="float:right;">
                <a href="{{ route('comment.edit', ['id' => $comment->id]) }}" style="text-decoration:none;color:black;">［編集］</a>
              </span>
            @endif

          </div>
          <div style="padding:8px 16px;">
            <span>{{ $comment->comment }}</span>
          </div>
          <div class="text-muted" style="padding:8px 16px;">
            <span>{{ $comment->created_at->format("Y年n月j日・G:i") }}<span>
            <span>{{ \Common::getUpdatedWord($comment) }}<span>
          </div>
        </div>
      </div>
    </div>
  </div>

  @auth
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          
          <form method="POST" action="{{ route('comment.store', ['target_id' => $comment->id]) }}">
            @csrf
            <div class="form-group mb-2">
              <textarea name="comment" style="width:100%;" class="form-control"></textarea>
            </div>
            <div style="text-align:right;">
              <input type="submit" value="返信する">
            </div>
          </form>
        </div>
      </div>
    </div>
  @endauth

  @foreach ($replies as $reply)
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mb-2">
            <a href="{{ route('comment.show', ['id' => $reply->id]) }}" style="text-decoration:none;color:black;">
              <div class="media">
                <div class="media-body">
                  <div style="padding:8px;">
                    <span><strong>{{ $reply->user->name }}</strong></span>
                    <span class="text-muted">
                      <span>・</span>
                      <span>{{ \Common::getDiffTime($reply) }}</span>
                      <span>{{ \Common::getUpdatedWord($reply) }}</span>
                    </span>
                  </div>
                  <div style="padding:8px 16px;">
                      <span>{{ $reply->comment }}</span>
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