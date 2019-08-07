@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Articles -->
            @foreach( $submissions as $submission )
            <a href="/submissions/{{ $submission->id }}" class="col-md-8 order-md-2 mb-4 border border-top-0 rounded _div_ib nostyle _article_box" style="cursor: pointer;">
                <div class="pb-3 pt-3 d-flex">
                    <img src="/storage/{{ $submission->image }}" alt="" height="40%" width="40%">
                    <div class="pl-4">
                        <div class="align-items-center">
                            <div class="d-flex">
                                <span class="_article_title pr-5">{{ $submission->title }}</span>
                                <div class="ml-5 nowrap d-flex">
                                    <div class="d-flex">
                                        <object data="/svg/view.svg" type="image/svg+xml" width="20" height="20" class="pt-1 float-right">
                                            <img src="/svg/view.svg"/>
                                        </object>
                                        <div class="pl-1"><span>{{ $submission->views }}</span></div>
                                    </div>
                                    <div class="d-flex pl-3">
                                        <object data="/svg/comment.svg" type="image/svg+xml" width="20" height="20" class="pt-1 float-right">
                                            <img src="/svg/comment.svg"/>
                                        </object>
                                        <div class="pl-1"><span>{{ \App\Comment::where('commentable_id', '=', $submission->id )->count() }}</span></div>
                                    </div>
                                    <div class="d-flex pl-3">
                                        <object data="/svg/like.svg" type="image/svg+xml" width="20" height="20" class="pt-1 float-right">
                                            <img src="/svg/like.svg"/>
                                        </object>
                                        <div class="pl-1"><span>{{ $submission->likedBy->count() }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span>{{ substr( $submission->content, 0, strpos( $submission->content, ' ', 230 ) ) }}...</span>
                    </div>
                </div>
            </a>
                @if( $loop->remaining > 0 )
                    <div class="pb-1"></div>
                @endif
            @endforeach
            <div class="col-md-4 order-md-2 mb-4">
            </div>
        </div>
    </div>
@endsection
