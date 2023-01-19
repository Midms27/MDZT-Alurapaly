<?php

declare(strict_types=1);

namespace MDZT\MVC\Controller;

use MDZT\MVC\Entity\Video;
use MDZT\MVC\Repository\VideoRepository;

class EditVideoController implements Controller
{

    public function __construct(private VideoRepository $videoRepository)
    {
        
    }

    public function processRequest(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id === false || $id === null) {
            header('Location: /?sucesso=0');
            exit();
        }

        $url = filter_input(INPUT_POST,'url',FILTER_VALIDATE_URL);
        if($url === false){
            header('Location: /?sucesso=0');
            exit();
        }
        $title = filter_input(INPUT_POST,'titulo');
        if($title === false){
            header('Location: /?sucesso=0');
            exit();
        }

        $video = new Video($url,$title);
        $video->setId($id);


        $sucsses = $this->videoRepository->update($video);

        if($sucsses === false){
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}

?>