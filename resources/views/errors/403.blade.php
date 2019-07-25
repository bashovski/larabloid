@extends('layouts.app')

@section('content')

    <!-- overriding background -->

    <body style="background-image: linear-gradient( to top, rgba( 255, 255, 255, 0.6 ), rgba( 250, 250, 250, 1)),
      url(http://74211.com/wallpaper/picture_big/Seeing-the-End-of-the-Road-White-Hills-Are-Waiting-Far-Away-a-Great-Contrast-in-Vision-is-Made-Natural-Scenery-Wallpaper.jpg);
      background-repeat: no-repeat;
      -webkit-background-size: cover;background-size: cover;
      background-size: 100% 200%;"
    >

    </body>


    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-6 mx-auto">
                <div class="text-center pagination-centered">
                    <div id="__error_code">403</div>

                    <!-- https://www.youtube.com/watch?v=AEkyvJKYs2w -->
                    <div style="font-size: 42px;" class="__highlight">Access denied</div>

                    <div style="font-weight: bold; font-size: 15px;" class="pt-1">
                        You have <span class="__highlight">(somehow)</span> entered a page which won't let you in.<br>
                        Consider leaving the <span class="__highlight">danger zone</span>.</div>

                    <div class="pt-2">
                        <form action="{{ url('/') }}">
                            <button type="submit" class="__g__b__button">
                                Get back to safety
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
