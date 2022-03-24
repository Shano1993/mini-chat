<?php

namespace App\Routing;

use App\Model\API\MessagesController;

class APIRouter extends AbstractRouter
{
    public static function route(?string $action = null)
    {
        switch ($action) {
            case 'send-message':
                (new MessagesController())->sendMessage();
                break;
            default: http_response_code(404);
        }
        exit();
    }
}
