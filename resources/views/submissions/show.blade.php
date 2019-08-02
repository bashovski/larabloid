@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <!-- News container -->
        <div class="col-md-8 order-md-2 mb-4">
            <!-- Upper part of the container (title, author, etc.)-->
            <div class="d-flex align-items-center">
                <h1 class="" id="__sub_title">{{ strtoupper( $submission->title ) }}</h1>
                <div class="pl-2"><span>by {{ $submission->user->name }}</span></div>
            </div>
            <!-- Submission image and image info -->
            <div>
                <img src="/storage/{{ $submission->image }}" alt="{{ $submission->caption }}">
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
            <div class="pt-2 d-flex">
                <!-- Num. of views of the submission -->
                <div class="d-flex align-items-center">
                    <object data="/svg/view.svg" type="image/svg+xml" width="20" height="20" class="pb-1 pr-1">
                        <img src="/svg/view.svg"/>
                    </object>
                    <span>{{ $submission->views }}</span>
                </div>
                <div class="pl-3 d-flex align-items-center">
                    <object data="/svg/comment.svg" type="image/svg+xml" width="20" height="20" class="pb-1 pr-1">
                        <img src="/svg/comment.svg"/>
                    </object>
                    <span>0</span>
                </div>
                <div class="pl-3 d-flex align-items-center">
                    <object data="/svg/like.svg" type="image/svg+xml" width="20" height="20" class="pb-1 pr-1">
                        <img src="/svg/like.svg"/>
                    </object>
                    <span>0</span>
                </div>
            </div>
            <!-- Posted (date) -->
            <div><span>Posted {{ $submission->getSubmitDateSubtracted() }}</span></div>

            <div class="pt-1">
                <span>{{ $submission->content }}</span>
            </div>
        </div>
        <!-- Right container -->
        <div class="col-md-4 order-md-2 mb-4">

        </div>
    </div>
</div>
@endsection
