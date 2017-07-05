@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3 photos-wrapper photos-index-page">
        @if (count($photos) == 0)
            <div class="jumbotron">
                <h3>There are no photos uploaded yet!</h3>
                <p>Be the one to post first.</p>
                <p>
                    <a class="btn btn-primary btn-lg"
                       href="{{ route('photo.create') }}"
                       role="button">Upload a Photo</a>
                </p>
            </div>
        @endif
    </div>
@endsection

@push('styles')
<link rel="stylesheet"
      href="{{ mix('/vendor/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet"
      href="{{ mix('vendor/bootstrap-tagsinput/css/bootstrap-tagsinput-typeahead.css') }}">
@endpush