<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePhotoRequest;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use PhotoGallery\Repositories\PhotoRepositoryInterface;

class PhotoController extends Controller
{
    
    private $photoRepository;

    /**
     * PhotoController constructor.
     * @param $photoRepository
     */
    public function __construct(PhotoRepositoryInterface $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    /**
     * Show list of photos.
     * 
     * @return mixed
     */
    public function index()
    {
        $photos = $this->photoRepository->getTenLatestPhotos();
        
        return view('photos.index', compact('photos'));
    }

    /**
     * Show upload photo form.
     * 
     * @return mixed
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store the image to disk and persist the details.
     * 
     * @param StorePhotoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StorePhotoRequest $request)
    {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        list($width, $height) = getimagesize($file->getRealPath());

        \Storage::disk('photos')->put(
            $filename,
            file_get_contents($file->getRealPath())
        );

        $photo = new Photo();
        $photo->caption = $request->input('caption');
        $photo->file_name = pathinfo($filename, PATHINFO_FILENAME);
        $photo->user_id = \Auth::user()->id;
        $photo->extension = pathinfo($filename, PATHINFO_EXTENSION);
        $photo->size = $file->getSize();
        $photo->height = $height;
        $photo->width = $width;
        $this->photoRepository->save($photo);

        return Response::json(['success' => true]);
    }

    /**
     * Get ten Photos by page number.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadImages()
    {
        return Response::json([
            'success' => true,
            'data' => $this->photoRepository->getTenLatestPhotos()
        ]);
    }
    
}