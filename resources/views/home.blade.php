@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="/" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image[]" multiple class="custom-file-input">
                        <label class="custom-file-label">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        @foreach ($galleries as $gallery)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body p-0">
                        <img class="img-fluid" src="{{ asset('upload/' . $gallery->name ) }}" alt="">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
