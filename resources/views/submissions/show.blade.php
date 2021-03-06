@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- News container -->
        <div class="col-md-8 order-md-2 mb-4 border border-top-0 rounded _div_ib">
            <!-- Upper part of the container (title, author, etc.)-->
            <div class="d-flex align-items-center">
                <h1 class="" id="__sub_title">{{ strtoupper( $submission->title ) }}</h1>
                <div class="pl-2"><span>by {{ $submission->user->name }}</span></div>
            </div>
            <!-- Submission image and image info -->
            <div>
                <img style="max-width: 100%; max-height: 100%;" src="/storage/{{ $submission->image }}" alt="{{ $submission->caption }}">
            </div>
            <!-- Verified notice -->
            @if( !$submission->verified )
            <div class="pt-1">
                <span style="color: #ff6666; text-decoration: underline;">
                    This submission is not verified by an admin. It may contain false news.
                </span>
            </div>
            @endif
            <!-- Submission info such as views, comment-number, likes and verified status-->
            <div class="pt-2 d-flex align-items-center">
                <!-- Num. of views of the submission -->
                <div class="d-flex align-items-center">
                    <object data="/svg/view.svg" type="image/svg+xml" width="20" height="20" class="pb-1 pr-1">
                        <img src="/svg/view.svg"/>
                    </object>
                    <span>{{ $submission->views }}</span>
                </div>
                <div class="pl-3 d-flex align-items-center">
                    <object data="/svg/comment.svg" type="image/svg+xml" width="20px" height="20px" class="pb-1 pr-1">
                        <img src="/svg/comment.svg"/>
                    </object>
                    <span>{{ \App\Comment::where('commentable_id', '=', $submission->id )->count() }}</span>
                </div>
                <like-btn submission-id="{{ $submission->id }}" likes="{{ $likes }}" like-num="{{ $submission->likedBy->count() }}"></like-btn>
            </div>

            <!-- Posted (date) -->
            <div><span>Posted {{ $submission->getSubmitDateSubtracted() }}</span></div>

            <div class="pt-1">
                <span>{{ $submission->content }}</span>
            </div>
        </div>
        <!-- Right container -->
        <div class="col-md-4 order-md-2 mb-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="" id="__sub_title">Comments</h1>

                <button type="button" style="border: none; background: none;" data-toggle="modal" data-target="#exampleModal">
                    Post a comment
                </button>

            </div>
            <!-- Comment box -->
            @foreach( $submission->comments as $comment )
            <a href="{{ route( 'profile.show', [ 'id' => \App\User::find( $comment->user_id ) ] ) }}" class="nostyle" id="sub_div">
                <div class="container p-4 border rounded news_div" style="cursor: pointer;">
                    <div class="align-items-center d-flex">
                        <img src="/storage/{{ \App\User::find( $comment->user_id )->profile->avatar }}" alt="" class="rounded-circle" width="20%" height="20%">
                        <div class="pl-4 pb-sm-2">
                            <span style="font-weight: bold">{{ \App\User::find( $comment->user_id )->name }}</span>
                            <span>{{ $comment->text }}</span>
                        </div>
                    </div>
                </div>
            </a>
            @if($loop->remaining > 0 )
                <div class="pb-2"></div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="/comments/{{ $submission->id }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Post a comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <length-checker></length-checker>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary __cancel_b" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary __g__b__button">Post a comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
