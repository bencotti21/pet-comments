@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div style="margin-bottom:16px;">
          <span style="font-size:20px;font-weight:bold;padding:8px;">
            <a href="#" style="text-decoration:none;color:black;" onclick="history.back();">←</a>
          </span>
          <h2 style="font-size:20px;font-weight:bold;padding:16px;display:inline;">コメント詳細</h2>
        </div>
        <div class="card mb-4">
          <div style="padding:8px;">
            <span style="font-weight:bold;">
              <a href="{{ route('user.show', ['id' => $comment->user_id]) }}" style="text-decoration:none;color:black;">
                {{ $comment->user->name }}
              </a>
            </span>
            
            @if (Auth::id() === $comment->user_id)
              <span style="float:right;">
                <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" style="text-decoration:none;color:black;"
                 onclick="event.preventDefault();
                         if(confirm('コメントを削除しますか？')){document.getElementById('comment-delete-form').submit();}">
                  ［削除］
                </a>
                
                <form id="comment-delete-form" method="POST" action="{{ route('comment.delete', ['id' => $comment->id]) }}">
                  @csrf
                  @method('DELETE')
                </form>
              </span>

              <span style="float:right;">
                <a href="{{ route('comment.edit', ['id' => $comment->id]) }}" style="text-decoration:none;color:black;">
                  ［編集］
                </a>
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

          @include('error')
          
          <form method="POST" action="{{ route('comment.store', ['target_id' => $comment->id]) }}">
            @csrf
            <div class="form-group mb-2">
              <textarea name="comment" style="width:100%;" class="form-control">{{ old('comment') }}</textarea>
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
          <div class="card mb-2" style="position:relative;">
            <a href="{{ route('comment.show', ['id' => $reply->id]) }}" style="text-decoration:none;color:black;position:absolute;top:0;right:0;bottom:0;left:0;"></a>
              <div class="media">
                <div class="media-body">
                  <div style="padding:8px;">
                    <span style="font-weight:bold;">
                      <a href="{{ route('user.show', ['id' => $reply->user_id]) }}" style="text-decoration:none;color:black;position:relative;">
                        {{ $reply->user->name }}
                      </a>
                    </span>
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
          </div>
        </div>
      </div>
    </div>
  @endforeach
@endsection