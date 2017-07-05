<?php
namespace PhotoGallery\Repositories;

use App\Photo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface PhotoRepositoryInterface
{

    /**
     * Persist a Photo entity.
     * 
     * @param Photo $photo
     * @return boolean
     */
    public function save(Photo $photo);

    /**
     * Get ten Photos by page number.
     *
     * @return LengthAwarePaginator
     */
    public function getTenLatestPhotos();

    /**
     * @param $id
     * @return Photo
     */
    public function findById($id);
    
}