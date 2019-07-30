@extends('layouts.app')

@section('content')

    <!-- overriding background -->

<body
    class = "__backgroundOverride_submit"
</body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Submit news</div>
                    <div class="card-body">
                        <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="category" name="category" class="form-control-file text-md-right">
                                        <option>Politics</option>
                                        <option>Economy</option>
                                        <option>Health</option>
                                        <option>Tech</option>
                                        <option>Sports</option>
                                        <option>Lifestyle</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                                <input type="file" class="col-md-4 form-control-file text-md-right" id="image" name="avatar">

                                @if ($errors->has('image'))
                                    <strong>{{ $errors->first('image') }}</strong>
                                @endif
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
