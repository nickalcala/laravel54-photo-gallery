<?php
namespace PhotoGallery\Repositories\DbRepositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use PhotoGallery\Repositories\PhotoRepositoryInterface;
use App\Photo;

class DbPhotoRepository implements PhotoRepositoryInterface
{

    /**
     * Persist a Photo entity.
     * 
     * @param Photo $photo
     * @return bool
     */
    public function save(Photo $photo)
    {
        return $photo->save();
    }

    /**
     * Get ten Photos by page number.
     *
     * @return LengthAwarePaginator
     */
    public function getTenLatestPhotos()
    {
        return Photo::latest()->paginate(10);
    }

    /**
     * @param $id
     * @return Photo
     */
    public function findById($id)
    {
        return Photo::find($id);
    }
}