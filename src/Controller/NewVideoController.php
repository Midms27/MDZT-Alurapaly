<?php

declare(strict_types=1);

namespace MDZT\MVC\Controller;

use MDZT\MVC\Entity\Video;
use MDZT\MVC\Repository\VideoRepository;

class NewVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {

    }

    public function processRequest(): void
    {
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

        $sucsses = $this->videoRepository->add(new Video($url,$title));
        if ($sucsses === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }

    }
}


?>