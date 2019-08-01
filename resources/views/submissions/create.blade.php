@extends('layouts.app')

@section('content')

    <!-- overriding background -->

<body
    class = "__backgroundOverride_submit">
</body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit news</div>
                    <div class="card-body">
                        <form method="post" action="/submissions" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 __highlight __bold col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input type="text" name="title" class="form-control text-md-left @error('title') is-invalid @enderror" placeholder="News title">
                                </div>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="category" class="col-md-4 __highlight __bold col-form-label text-md-right @error('category') is-invalid @enderror">Category</label>

                                <div class="col-md-6">
                                    <category-assigner name="category"></category-assigner>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 __highlight __bold col-form-label text-md-right">Image</label>

                                <input type="file" class="col-md-4 form-control-file text-md-right @error('image') is-invalid @enderror" id="image" name="image">

                                @if ($errors->has('image'))
                                    <strong class="invalid-feedback col-md-3" role="alert">
                                        {{ $errors->first('image') }}</strong>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="caption" class="col-md-4 __highlight __bold col-form-label text-md-right">Image caption</label>

                                <div class="col-md-6">
                                    <input type="text" name="caption" class="form-control text-md-left @error('caption') is-invalid @enderror"
                                           placeholder="Image caption (e.g. description/name of author)">

                                    @if ($errors->has('caption'))
                                        <strong class="invalid-feedback nowrap col-md-3" role="alert">
                                            {{ $errors->first('caption') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-md-4 __highlight __bold col-form-label text-md-right">Content</label>

                                <div class="col-md-6">
                                    <textarea id="content" name="content" class="form-control disable-resize @error('content') is-invalid @enderror" rows="3"
                                    placeholder="Insert the content of the news you want to submit.">
                                    </textarea>
                                    @if ($errors->has('content'))
                                        <strong class="invalid-feedback nowrap col-md-3" role="alert">
                                            {{ $errors->first('content') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-4">
                                    <button type="submit" class="__g__b__button">
                                        Submit news for revision
                                    </button>
                                </div>
                            </div>
                            <signature-element class="col-md-6 offset-md-5 pl-2 pt-4"></signature-element> <!-- vue component -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
