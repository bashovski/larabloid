@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Articles -->
            <div class="col-md-8 order-md-2 mb-4 ">
                @foreach( $submissions as $submission )
                    <a href="/submissions/{{ $submission->id }}" class="border border-top-0 rounded _div_ib nostyle _article_box pl-4 pr-4 _a_shadow" style="cursor: pointer;">
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
                                <span>{{ substr( $submission->content, 0, strpos( $submission->content, ' ', 120 ) ) }}...</span>
                            </div>
                        </div>
                    </a>
                    @if( $loop->remaining > 0 )
                        <div class="pb-2"></div>
                    @endif
                @endforeach
            </div>
            <!-- Top users -->
            <div class="col-md-4 order-md-2 mb-4">
                <div class="border p-1 d-flex align-items-center justify-content-center top_users">
                    <object data="/svg/top.svg" type="image/svg+xml" width="25" height="25" class="">
                        <img src="/svg/top.svg"/>
                    </object>
                    <span class="h3 pl-2 pt-2" style="color: #000; font-weight: bold;">Top users</span>
                </div>
                <div class="pt-1 pb-1"></div>
                @foreach( $users as $i )
                    <a href="/profile/{{ $i->id }}" class="nostyle" style="cursor: pointer;">
                        <div class="border p-2 d-flex align-items-center justify-content-between _a_shadow">
                            <div>
                                <img class="rounded-circle" width="30px" height="30px"
                                     src="{{ ($i->profile->avatar) ? ('/storage/'.($i->profile->avatar)) : (url('/storage/default.png')) }}" alt="">
                                <span style="font-weight: bold;" class="pl-1">{{ $i->name }}</span>
                            </div>
                            <div class="nowrap d-flex pr-1 align-items-center">
                                <object data="/svg/star.svg" type="image/svg+xml" width="15" height="15">
                                    <img src="/svg/star.svg"/>
                                </object>
                                <div class="pl-1">
                                    <span>{{ $i->submissions_count }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                        @if( $loop->remaining > 0 )
                            <div class="pt-2"></div>
                        @endif
                @endforeach
                <div class="pt-2"></div>
                <!-- Weather -->
                <div class="border p-1 d-flex align-items-center justify-content-center _weather_notice">
                    <object data="/svg/cloud.svg" type="image/svg+xml" width="25" height="25" class="">
                        <img src="/svg/cloud.svg"/>
                    </object>
                    <span class="h3 pl-2 pt-2" style="color: #000; font-weight: bold;">Weather</span>
                </div>
                <div class="pt-2"></div>
                <weather-panel></weather-panel>
                <div class="pt-2"></div>
                <!-- Currency converter  (NOT USED) -->
                <!--
                <div class="border p-1 d-flex align-items-center justify-content-center _currency_notice">
                    <object data="/svg/currency.svg" type="image/svg+xml" width="25" height="25" class="">
                        <img src="/svg/currency.svg"/>
                    </object>
                    <span class="h3 pl-2 pt-2" style="color: #000; font-weight: bold;">Currency converter</span>
                </div>
                <currency-converter class="pt-3"></currency-converter>
                -->
            </div>
        </div>
    </div>
@endsection
