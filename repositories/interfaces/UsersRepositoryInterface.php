<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 02.06.16
 * Time: 13:32
 */
namespace app\repositories\interfaces;

use app\models\Users;

interface UsersRepositoryInterface
{
    /**
     * @param $id
     * @return Users
     * @throws \InvalidArgumentException
     */
    public function find($id);

    /**
     * @param Users $item
     * @throws \Exception
     */
    public function add(Users $item);

    /**
     * @param Users $item
     * @throws \Exception
     */
    public function update(Users $item);
}