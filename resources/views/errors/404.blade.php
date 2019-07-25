@extends('layouts.app')

@section('content')

    <!-- overriding background -->

    <body style="background-image: linear-gradient( to top, rgba( 255, 255, 255, 0.6 ), rgba( 250, 250, 250, 1)),
      url(https://www.irishecho.com/wp-content/uploads/2015/05/phil-lynott.jpg);
      background-repeat: no-repeat;
      -webkit-background-size: cover;background-size: cover;
      background-size: 100% 200%;"
    >

    </body>


    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-6 mx-auto">
                <div class="text-center pagination-centered">
                    <div id="__error_code">404</div>

                    <!-- https://www.youtube.com/watch?v=AEkyvJKYs2w -->
                    <div style="font-size: 16px;"><span style="">No how, no how could we stay together<br>
                        No need, I have no need for you now<br>
                        No fear, no fear of you no more<br>
                        </span>
                        <span class="__error_verse" style="background-color:#000000;">Get out of here.<br></span>
                        <div class="pt-4 __error_verse"><span>Philip Parris Lynott, Thin Lizzy - Black Rose: A Rock Legend - 1979.</span></div>
                    </div>

                    <div style="font-weight: bold; font-size: 15px;" class="pt-1">
                    You have <span class="__highlight">(somehow)</span> entered a page which doesn't exist.
                    Try <span class="__highlight">getting out of here</span>.</div>

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
