@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Upper part of page for important visible data such as: name, date registered, number of comments, news submissions, et cetera-->
    <a class="row">
        <!-- Avatar -->
        <div class="col-3 p-5">
            <svg viewBox="0 0 100 100" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="img" patternUnits="userSpaceOnUse" width="100" height="100">
                        <image
                            xlink:href="{{ ($user->profile->avatar) ? ('/storage/'.($user->profile->avatar)) : (url('/storage/default.png')) }}"
                            x="-25" width="150" height="100"></image>
                    </pattern>
                    <linearGradient id="gradient" x1="100%" y1="50%" x2="50%" y2="100%">
                        <stop offset="0%" stop-color="#ee2a7b" />
                        <stop offset="100%" stop-color="#ff9900" />
                    </linearGradient>
                </defs>
                <polygon id="__hex_avatar" stroke="url(#gradient)" stroke-width="3" points="50 1 95 25 95 75 50 99 5 75 5 25" fill="url(#img)"/>
            </svg>
        </div>
        <!-- User data -->
        <div>
            <div class="col-9 pt-5">
                <!-- Username & real name -->
                <div class="d-flex align-items-md-center pb-3">
                    <div id="__user_name_lab">{{$user->username}}</div>
                    <div id="__real_name_lab" class="pl-3"><span>({{$user->name}})</span></div>
                </div>
                <!-- stats [count] -->
                <div class="d-flex" style="white-space: nowrap;">
                    <div><span class="__g_stat">{{ $subCount }}</span> <span class="__g_const">submissions</span></div>
                    <div><span class="__g_stat pl-5">300</span> <span class="__g_const">comments</span></div>
                    <div><span class="__g_stat pl-5">20</span> <span class="__g_const">reputation</span></div>
                </div>
                <!-- bio [max length: 120chars]-->
                <div>
                    <div class="d-flex pt-1">
                        <object data="/svg/bio.svg" type="image/svg+xml" width="16" height="16">
                            <img src="/svg/bio.svg"/>
                        </object>
                        <div class="pl-1 nw"><span>{{ $user->profile->biography ?? 'This user has not added his biography yet.' }}</span></div>
                    </div>
                    <!-- location -->
                    <div class="d-flex pt-1">
                        <object data="/svg/location.svg" type="image/svg+xml" width="16" height="16">
                            <img src=/svg/location.svg"/>
                        </object>
                        <div class="pl-1 nw"><span>{{ $user->profile->location ?? 'This user has not added his location yet.' }}</span></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- User submissions -->
        <h2 class="pl-3 __highlight_v" style="font-weight: bold;">Submissions by {{ $user->name }}</h2>
        @foreach( $user->submissions as $submission )
        <a href="{{ route( 'submission.show', [ 'id' => $submission ] ) }}" class="nostyle" id="sub_div">
            <div class="text-right" style="font-weight: bold;"><span>{{ $submission->getSubmitDateSubtracted() }}</span></div>
            <div class="container p-5 border rounded news_div" style="cursor: pointer;">
                <div class="d-flex align-items-center">
                    <img class="float:left" src="/storage/{{ $submission->image }}" width="150" height="75">
                    <div class="pl-4">
                        <span class="__highlight_alt" style="font-weight: bold; font-size: 26px;">{{ $submission->caption }}</span><br>
                        <span style="font-weight: bold; font-size: 20px;">{{ $submission->title }}</span>
                    </div>
                </div>
            </div>
        </a>
        @if( $loop->remaining > 0 )
            <div class="mb-1">&nbsp;</div>
        @endif
        @endforeach
    </div>
</div>
@endsection
