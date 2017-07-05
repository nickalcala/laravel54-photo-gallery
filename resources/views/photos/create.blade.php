@extends('layouts.app')

@section('content')
    <div class="col-md-6 col-md-offset-3 photos-create-page">
        <h3>Upload Photo</h3>
        <div class="alert" id="message">
        </div>
        <form action="{{ route('photo.store') }}"
              id="formUpload">
            <div class="form-group caption">
                <label for="caption"
                       class="control-label">
                    Caption
                </label>
                <input type="text"
                       class="form-control"
                       placeholder="Caption" id="caption"/>
                <p class="help-block caption"></p>
            </div>
            <div class="form-group file">
                <div class="dropzone"
                     id="photo-drop-zone">
                </div>
                <p class="help-block file"></p>
            </div>
            <div class="form-group">
                <button type="button"
                        class="btn btn-primary"
                        id="btnUpload">
                    <i class="glyphicon glyphicon-upload"></i>
                    Upload
                </button>
            </div>
        </form>
    </div>
@endsection

@push('styles')
<link rel="stylesheet"
      href="{{ mix('/vendor/dropzone/css/dropzone.min.css') }}">
@endpush

@push('scripts')
<script src="{{ mix('/vendor/dropzone/js/dropzone.js') }}"></script>
<script>
    Dropzone.autoDiscover = false;
    $(function () {
        $('#message').hide();
        $('#formUpload').on('submit', function (e) {
            e.preventDefault();
        });
    });
    var dz = new Dropzone('#photo-drop-zone', {
        url: "{{ route('photo.store') }}",
        maxFiles: 1,
        autoProcessQueue: false,
        addRemoveLinks: true,
        dictDefaultMessage: 'Drop a photo here.',
        headers: {
            'X-CSRFToken': $('meta[name="token"]').attr('content')
        },
        init: function () {
            var _this = this;
            $('#btnUpload').on('click', function () {
                _this.processQueue();
            });
        },
        sending: function (file, xhr, formData) {
            formData.append('_token', Laravel.csrfToken);
            formData.append('caption', $('#caption').val());
        },
        error: function (file, response) {
            var _this = this;
            for (var attribute in response) {
                if (response.hasOwnProperty(attribute)) {
                    var helpBlock = $('.help-block.' + attribute);
                    var formControl = $('.form-group.' + attribute);
                    helpBlock.text(_.first(response[attribute]));
                    helpBlock.show();
                    formControl.addClass('has-error');
                    _this.removeAllFiles();
                }
            }
        },
        success: function () {
            $('#message').addClass('alert-success').show().text('Photo uploaded!');
        }
    });
</script>
@endpush