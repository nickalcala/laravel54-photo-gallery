<?php
namespace PhotoGallery\Repositories\DbRepositories;

use App\Tag;
use Illuminate\Support\Collection;
use PhotoGallery\Repositories\TagRepositoryInterface;

class DbTagRepository implements TagRepositoryInterface
{
    /**
     * Find tags by wildcard name.
     *
     * @param $name
     * @return \App\Tag[]|Collection
     */
    public function findTagsByName($name)
    {
        return Tag::where('name', 'like', "%$name%")->take(5)->get();
    }

}