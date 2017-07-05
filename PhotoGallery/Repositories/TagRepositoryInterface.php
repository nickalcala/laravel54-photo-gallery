<?php
namespace PhotoGallery\Repositories;

use App\Tag;
use Illuminate\Support\Collection;

interface TagRepositoryInterface
{

    /**
     * Find tags by wildcard name.
     * 
     * @param $name
     * @return \App\Tag[]|Collection
     */
    public function findTagsByName($name);

}