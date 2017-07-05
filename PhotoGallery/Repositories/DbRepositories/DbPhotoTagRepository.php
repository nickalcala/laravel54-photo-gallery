<?php
namespace PhotoGallery\Repositories\DbRepositories;

use App\Photo;
use App\PhotoTag;
use App\Tag;
use PhotoGallery\Repositories\PhotoTagRepositoryInterface;

class DbPhotoTagRepository implements PhotoTagRepositoryInterface
{
    /**
     * Tag a photo.
     *
     * @param Photo $photo
     * @param string[] $tags
     * @return boolean
     */
    public function addPhotoTags(Photo $photo, $tags)
    {
        foreach ($tags as $index => $t) {
            $tag = Tag::whereName($t)->first();
            if (!$tag) {
                $tag = new Tag();
                $tag->name = $t;
                $tag->save();
            } else {
                $exists = PhotoTag::where('photo_id','=', $photo->id)
                    ->where('tag_id', '=', $tag->id)->exists();

                if ($exists)
                    continue;
            }

            $photoTag = new PhotoTag();
            $photoTag->photo_id = $photo->id;
            $photoTag->tag_id = $tag->id;
            $photoTag->save();
        }
        
        return true;
    }
}