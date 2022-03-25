<?php

namespace App\Routing;

use App\Controller\API\MessagesController;

class APIRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        switch ($action) {
            case 'new-message':
                (new MessagesController())->newMessage();
                break;
            default:
                http_response_code(404);
        }
        exit();
    }
}

