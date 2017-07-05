var photosPageLoadResponse = null;
var photosPageLoading = false;
$(function () {
    if ($('.photos-index-page').length > 0) {

        photosPageLoad();

        window.onscroll = function() {
            if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight
                && (photosPageLoadResponse.current_page+1) <= photosPageLoadResponse.last_page
                && photosPageLoading == false) {
                photosPageLoad();
            }
        };

    }
});

function photosPageSetup() {
    $('.tagsinput').tagsinput();

    $('.btn-tag-photo').on('click', function () {
        var _this = $(this);
        $('#tag_photo_form_' + _this.data('photo-id')).show();
        _this.hide();
    });

    $('.btn-cancel-tags').on('click', function () {
        var _this = $(this);
        $('#tag_photo_form_' + _this.data('photo-id')).hide();
        $('.btn-tag-photo').show();
    });

    $('.btn-save-tags').on('click', function () {
        var _this = $(this);
        var photoId = _this.data('photo-id');
        $.ajax({
            url: '/tags/create',
            type: 'post',
            data: {
                _token: Laravel.csrfToken,
                photo_id: photoId,
                tags: $('#tags_input_' + photoId).tagsinput('items')
            },
            success: function (response) {
                var tagContainer = $('#tag_container_' + photoId);
                tagContainer.html('');
                $.each(response.data, function (index, tag) {
                    tagContainer.append('<strong class="tag">#'+tag.name+'</strong>');
                });
                $('#tag_photo_form_' + photoId).hide();
                $('#tags_input_' + photoId).tagsinput('removeAll');
                $('.btn-tag-photo').show();
            }
        });
    });
}

function photosPageLoad() {
    var photosWrapper = $('.photos-wrapper');
    if (!photosPageLoading)
        photosWrapper.append('<h3 class="photos-loading text-center">Loading</h3>');

    photosPageLoading = true;

    $.ajax({
        url: '/photos/load?page=' + (photosPageLoadResponse ? photosPageLoadResponse.current_page+1 : 1),
        type: 'get',
        success: function (response) {
            photosPageLoadResponse = response.data;
            $('.photos-loading').remove();
            photosPageLoading = false;
            $.each(response.data.data, function (index, photo) {

                var photoTags = '';
                $.each(photo.tag_list, function (index, tag) {
                    photoTags += `<strong class="tag">#${tag.name}</strong>`;
                });

                photosWrapper.append(`<div class="photo-box">
    <h4>
        <strong>${photo.caption}</strong>
        <small class="pull-right">
            ${photo.created_at_diff_for_human}
        </small>
    </h4>
    <img src="${photo.photo_file_path}"
         alt="${photo.caption}"
         class="img-responsive">
    <div class="footer">
        <div class="form-group" id="tag_container_${photo.id}">
            ${photoTags}
        </div>
        <div class="form-group">
            <small>by: ${photo.author_name}</small>
        </div>
        <div class="form-group">
            <span class="detail">
                <i class="glyphicon glyphicon-picture"></i>
                ${photo.width} x ${photo.height}  Pixels
            </span>
            <span class="detail">
                <i class="glyphicon glyphicon-file"></i>
                ${photo.kilo_bytes} KB
            </span>
            <button class="btn btn-default btn-sm pull-right btn-tag-photo"
                    data-photo-id="${photo.id}">
                <i class="glyphicon glyphicon-tag"></i>
                Tag this Photo
            </button>
        </div>
        <div class="form-group" id="tag_photo_form_${photo.id}" style="display: none;">
            <input type="text"
                   id="tags_input_${photo.id}"
                   class="form-control tagsinput"
                   placeholder="">
            <button class="btn btn-primary btn-sm btn-save-tags"
                    data-photo-id="${photo.id}">
                Save Tags
            </button>
            <button class="btn btn-default btn-sm btn-cancel-tags"
                    data-photo-id="${photo.id}">
                Cancel
            </button>
        </div>
    </div>
</div>`)
            });
            photosPageSetup();
        },
        error: function (response) {
            photosPageLoading = false;
        }
    });
}