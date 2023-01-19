<?php

declare(strict_types=1);

namespace MDZT\MVC\Controller;

use MDZT\MVC\Entity\Video;
use MDZT\MVC\Repository\VideoRepository;

class DeleteVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
        
    }

    public function processRequest(): void
    {

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if($id === null || $id === false)
        {
            header('Location: /?sucesso=0');
            return;
        }

        $sucsses = $this->videoRepository->remove($id);

        if ($sucsses === false) {
            header('Location: /?sucesso=0');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}

?>