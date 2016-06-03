<?php
/**
 * Created by PhpStorm.
 * User: afanasev
 * Date: 02.06.16
 * Time: 13:28
 */

namespace app\repositories;

use app\models\Users;
use app\repositories\interfaces\UsersRepositoryInterface;


class UsersRepository implements UsersRepositoryInterface
{
    /**
     * @param $id
     * @return Users
     * @throws \InvalidArgumentException
     */
    public function find($id)
    {
        if (!$item = Users::findOne($id)) {
            throw new \InvalidArgumentException('Model not found');
        };
        return $item;
    }

    /**
     * @param Users $item
     * @throws \Exception
     */
    public function add(Users $item)
    {
        if (!$item->getIsNewRecord()) {
            throw new \InvalidArgumentException('Model already exists');
        }
        $item->insert(false);
    }

    /**
     * @param Users $item
     * @throws \Exception
     */
    public function update(Users $item)
    {
        if ($item->getIsNewRecord()) {
            throw new \InvalidArgumentException('Model does not already exists');
        }
        $item->update(false);
    }
}