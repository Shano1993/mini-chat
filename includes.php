<?php

require __DIR__ . '/Config.php';
require __DIR__ . '/Model/DB.php';

require __DIR__ . '/Model/Entity/AbstractEntity.php';
require __DIR__ . '/Model/Entity/Users.php';
require __DIR__ . '/Model/Entity/Messages.php';

require __DIR__ . '/Model/Manager/UsersManager.php';
require __DIR__ . '/Model/Manager/MessagesManager.php';

require __DIR__ . '/Controller/AbstractController.php';
require __DIR__ . '/Controller/ErrorController.php';
require __DIR__ . '/Controller/HomeController.php';
require __DIR__ . '/Controller/UsersController.php';

require __DIR__ . '/Routing/AbstractRouter.php';
require __DIR__ . '/Routing/HomeRouter.php';
require __DIR__ . '/Routing/UsersRouter.php';

// API
require __DIR__ . '/Routing/APIRouter.php';
require __DIR__ . '/Model/API/MessagesController.php';
