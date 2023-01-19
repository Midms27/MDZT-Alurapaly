<?php

declare(strict_types=1);

namespace MDZT\MVC\Controller;
use MDZT\MVC\Repository\VideoRepository;

class FormVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {

    }

    public function processRequest() : void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        /** @var ?Video $video */

        $video = null;
        
        if ($id != false && $id != null){
            $video = $this->videoRepository->find($id);
        }

        require_once __DIR__ . '/../../views/form-video.php';
       
    }
}

?>