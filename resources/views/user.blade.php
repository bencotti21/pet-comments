@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 style="font-size:20px;padding-bottom:8px"><strong>{{ $user->name }}</strong></h2>
      </div>
    </div>
  </div>

  @foreach ($comments as $comment)
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mb-2" style="position:relative;">
          <a href="{{ route('comment.show', ['id' => $comment->id]) }}" style="text-decoration:none;color:black;position:absolute;top:0;right:0;bottom:0;left:0;"></a>
          <div class="media">
            <div class="media-body">
              <div style="padding:8px;">
                <span>
                  <a href="{{ route('user.show', ['id' => $comment->user_id]) }}" style="text-decoration:none;color:black;position:relative;">
                    <strong>{{ $comment->user->name }}</strong>
                  </a>
                </span>
                <span class="text-muted">
                  <span>・</span>
                  <span>{{ \Common::getDiffTime($comment) }}</span>
                  <span>{{ \Common::getUpdatedWord($comment) }}</span>
                </span>
              </div>

              @if ($comment->target_id)
                <div style="padding:0px 16px 8px 16px;">
                  <span class="text-muted">返信先：</span>
                  <span>
                    <a href="{{ route('user.show', ['id' => \Common::getTargetUser($comment->target_id)->id]) }}" style="text-decoration:none;color:black;position:relative;">{{ \Common::getTargetUser($comment->target_id)->name }}</a>
                  </span>
                  <span class="text-muted">さん</span>
                </div>
              @endif

              <div style="padding:8px 16px;">
                  <span>{{ $comment->comment }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection