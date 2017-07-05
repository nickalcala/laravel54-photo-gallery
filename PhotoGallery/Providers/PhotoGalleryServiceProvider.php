<?php
namespace PhotoGallery\Providers;

use Illuminate\Support\ServiceProvider;
use PhotoGallery\Repositories\DbRepositories\DbPhotoRepository;
use PhotoGallery\Repositories\DbRepositories\DbPhotoTagRepository;
use PhotoGallery\Repositories\DbRepositories\DbTagRepository;
use PhotoGallery\Repositories\PhotoRepositoryInterface;
use PhotoGallery\Repositories\PhotoTagRepositoryInterface;
use PhotoGallery\Repositories\TagRepositoryInterface;

class PhotoGalleryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PhotoRepositoryInterface::class, DbPhotoRepository::class);
        $this->app->bind(TagRepositoryInterface::class, DbTagRepository::class);
        $this->app->bind(PhotoTagRepositoryInterface::class, DbPhotoTagRepository::class);
    }
}