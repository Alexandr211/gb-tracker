<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17.12.18
 * Time: 21:30
 */

namespace frontend\rbac;
use yii\rbac\Rule;


/**
* Проверяем authorID на соответствие с пользователем, переданным через параметры
*/

class CreatorRule extends Rule
{
    public $name = 'isCreator';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated width.
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['project']) ? $params['project']->id_user == $user : false;
    }
}