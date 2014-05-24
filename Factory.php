<?php

/*
* This file is part of the Dektrium project.
*
* (c) Dektrium project <http://github.com/dektrium/>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace travis83bui\user;

use travis83bui\user\models\UserInterface;
use yii\base\Component;

/**
 * Factory component is used to create models and forms when needed.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Factory extends Component
{
    /**
     * @var string
     */
    public $userClass = '\travis83bui\user\models\User';

    /**
     * @var string
     */
    public $profileClass = '\travis83bui\user\models\Profile';

    /**
     * @var string
     */
    public $userQueryClass = '\travis83bui\user\models\UserQuery';

    /**
     * @var string
     */
    public $profileQueryClass = '\yii\db\ActiveQuery';

    /**
     * @var string
     */
    public $resendFormClass = '\travis83bui\user\forms\Resend';

    /**
     * @var string
     */
    public $loginFormClass = '\travis83bui\user\forms\Login';

    /**
     * @var string
     */
    public $passwordRecoveryFormClass = '\travis83bui\user\forms\PasswordRecovery';

    /**
     * @var string
     */
    public $passwordRecoveryRequestFormClass = '\travis83bui\user\forms\PasswordRecoveryRequest';

    /**
     * Creates new User model.
     *
     * @param  array             $config
     * @return UserInterface
     * @throws \RuntimeException
     */
    public function createUser($config = [])
    {
        $config['class'] = $this->userClass;
        $model = \Yii::createObject($config);
        if (!$model instanceof UserInterface) {
            throw new \RuntimeException(sprintf('"%s" must implement "%s" interface',
                get_class($model), '\travis83bui\user\models\UserInterface'));
        }

        return $model;
    }

    /**
     * Creates new Profile model.
     *
     * @param  array                         $config
     * @return \dektrium\user\models\Profile
     */
    public function createProfile($config = [])
    {
        $config['class'] = $this->profileClass;

        return \Yii::createObject($config);
    }

    /**
     * Creates new query for user class.
     *
     * @return \yii\db\ActiveQuery
     */
    public function createUserQuery()
    {
        return \Yii::createObject(['class' => $this->userQueryClass, 'modelClass' => $this->userClass]);
    }

    /**
     * Creates new query for user class.
     *
     * @return \yii\db\ActiveQuery
     */
    public function createProfileQuery()
    {
        return \Yii::createObject(['class' => $this->profileQueryClass, 'modelClass' => $this->profileClass]);
    }

    /**
     * Creates new form based on its name.
     *
     * @param string $name   "registration"|"resend"|"login"|"recovery"
     * @param array  $config
     *
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public function createForm($name, $config = [])
    {
        $property = $name.'FormClass';
        if (isset($this->$property)) {
            $config['class'] = $this->$property;

            return \Yii::createObject($config);
        }

        throw new \RuntimeException("Creating unknown model: $name");
    }
}
