<?php

declare(strict_types=1);

namespace MDZT\MVC\Controller;

use MDZT\MVC\Repository\VideoRepository;
use PDO;


class VideoListController
{
    

    public function __construct(private VideoRepository $videoRepository)
    {  
    }
    public function processRequest():void
    {
        $videoList = $this->videoRepository->all();
        require_once __DIR__ . '/../../views/list-video.php';

    }
}

?>