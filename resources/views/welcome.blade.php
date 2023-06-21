@extends('layouts.app')

@section('content')
    <div style="text-align:center;margin-bottom:24px">
        <img src="{{ asset('e3197751222c49b5cac9cff88814f090_t.jpeg') }}" alt="犬の画像">
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="text-muted">
                    <p>アプリの雰囲気を気軽にお試しいただけるように、アカウント削除は物理削除（データベースからの完全削除）で実装しています。</p>
                    <p>また、アカウント削除と同時にコメントも削除されますので、安心してお試しいただければと思います。</p>
                </div>
            </div>
        </div>
    </div>
@endsection
