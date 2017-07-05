<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreTagRequest;
use App\Tag;
use Illuminate\Http\Request;
use PhotoGallery\Repositories\PhotoRepositoryInterface;
use PhotoGallery\Repositories\PhotoTagRepositoryInterface;
use PhotoGallery\Repositories\TagRepositoryInterface;

class TagController extends Controller
{

    /**
     * @var PhotoRepositoryInterface
     */
    private $photoRepository;

    /**
     * @var PhotoTagRepositoryInterface
     */
    private $photoTagRepository;

    /**
     * TagController constructor.
     * @param PhotoRepositoryInterface $photoRepository
     * @param PhotoTagRepositoryInterface $photoTagRepository
     */
    public function __construct(
        PhotoRepositoryInterface $photoRepository,
        PhotoTagRepositoryInterface $photoTagRepository
    )
    {
        $this->photoRepository = $photoRepository;
        $this->photoTagRepository = $photoTagRepository;
    }

    /**
     * Add tags to photo.
     * 
     * @param StoreTagRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreTagRequest $request)
    {
        $photo = $this->photoRepository->findById($request->input('photo_id'));
        $this->photoTagRepository->addPhotoTags($photo, $request->input('tags'));
        
        return \Response::json(['success' => true, 'data' => $photo->tags]);
    }

}