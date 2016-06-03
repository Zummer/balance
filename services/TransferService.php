<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 02.06.16
 * Time: 13:23
 */

namespace app\services;


use app\services\interfaces\LoggerInterface;
use app\services\interfaces\NotifierInterface;
use app\repositories\interfaces\UsersRepositoryInterface;
use app\services\interfaces\TransactionManagerInterface;

class TransferService
{
    private $usersRepository;
    private $transactionManager;
    private $notifier;
    private $logger;

    public function __construct(
        UsersRepositoryInterface $usersRepository,
        TransactionManagerInterface $transactionManager,
        NotifierInterface $notifier,
        LoggerInterface $logger
    )
    {

        $this->usersRepository = $usersRepository;
        $this->transactionManager = $transactionManager;
        $this->notifier = $notifier;
        $this->logger = $logger;
    }

    public function transferBalance($fromId, $toId, $sum)
    {
        $userFrom = $this->usersRepository->find($fromId);
        $userTo = $this->usersRepository->find($toId);

        $transaction = $this->transactionManager->begin();

        try {
            $userFrom->debit($sum);
            $this->usersRepository->update($userFrom);

            $userTo->credit($sum);
            $this->usersRepository->update($userTo);

            $this->logger->log($userFrom->id, $userTo->id, $sum);

            $transaction->commit();

            $this->notifier->flash('success', 'Transfer success!');
        } catch (\Exception $e) {
            $transaction->rollBack();
            $this->notifier->flash('error', $e->getMessage());
        }
    }
}