<?php

declare(strict_types=1);

use MDZT\MVC\Controller\{
    Controller,
    DeleteVideoController,
    EditVideoController,
    NewVideoController,
    FormVideoController,
    VideoListController,
    Error404Controller,
};

return [
    'GET|/' => VideoListController::class,
    'GET|/new-video' => FormVideoController::class,
    'POST|/new-video' => NewVideoController::class,
    'GET|/edit-video' => FormVideoController::class,
    'POST|/edit-video' => EditVideoController::class,
    'GET|/delete-video' => DeleteVideoController::class,
];

?>