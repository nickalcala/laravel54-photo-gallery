<?php
namespace PhotoGallery\Repositories;

use App\Photo;

interface PhotoTagRepositoryInterface
{
    /**
     * Tag a photo.
     *
     * @param Photo $photo
     * @param string[] $tags
     * @return boolean
     */
    public function addPhotoTags(Photo $photo, $tags);
}