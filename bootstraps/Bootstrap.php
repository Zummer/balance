<?php

namespace app\bootstraps;

use app\services\interfaces\LoggerInterface;
use app\services\interfaces\NotifierInterface;
use app\services\Logger;
use app\services\Notifier;
use app\repositories\interfaces\UsersRepositoryInterface;
use app\repositories\UsersRepository;
use app\services\interfaces\TransactionManagerInterface;
use app\services\TransactionManager;
use Yii;
use yii\base\BootstrapInterface;
use yii\data\Pagination;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $container = Yii::$container;
        $container->setSingleton(LoggerInterface::class, Logger::class);
        $container->setSingleton(NotifierInterface::class, Notifier::class);
        $container->setSingleton(TransactionManagerInterface::class, TransactionManager::class);
        $container->setSingleton(UsersRepositoryInterface::class, UsersRepository::class);

        $container->set(Pagination::class, ['pageSize' => 10]);
    }
}