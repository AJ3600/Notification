@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->title }} <small>Created By: {{ $post->user->name }}</small>
                    </div>
                    <div class="panel-body">
                        {{ $post->content }}
                    </div>
                    <div class="panel-footer text-right">
                        <a href="{{ url('/home') }}" class="btn btn-link"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</a>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('errors'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        @foreach (session('errors')->all() as $error)
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Comments <div class="badge">{{ $post->comments()->count() }}</div>
                    </div>
                    <div class="panel-body">
                        @forelse ($post->comments()->orderBy('id', 'desc')->get() as $comment)
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    {{ $comment->comment }}
                                </div>
                                <div class="panel-footer text-right">
                                    <small>By: {{ $comment->user->name }}</small>
                                </div>
                            </div>
                        @empty
                            There are no Comments
                        @endforelse
                    </div>
                    <div class="panel-footer">
                        <form action="{{ url('/comment/store') }}" method="post" style="display: flex;">
                            {{ csrf_field() }}
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input type="text" name="comment" placeholder="comment..." class="form-control" style="border-radius: 0;">
                            <input type="submit" value="Comment" class="btn btn-primary" style="border-radius: 0;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
