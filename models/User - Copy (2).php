<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $user_name
 * @property string $password
 * @property string $is_admin
 * @property string $first_name
 * @property string $last_name
 * @property string $address_line_1
 * @property string $address_line_2
 * @property string $address _line_3
 * @property string $town_city
 * @property string $postcode
 * @property string $telephone
 * @property string $email
 *
 * @property UserRental[] $userRentals
 */
class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'password', 'address_line_1', 'town_city', 'postcode', 'telephone', 'email'], 'required'],
            [['user_name'], 'string', 'max' => 45],
            [['password', 'first_name', 'last_name', 'address_line_1', 'address_line_2', 'address _line_3', 'town_city', 'email'], 'string', 'max' => 256],
            [['is_admin'], 'string', 'max' => 1],
            [['postcode'], 'string', 'max' => 10],
            [['telephone'], 'string', 'max' => 14]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'user_name' => 'User Name',
            'password' => 'Password',
            'is_admin' => 'Is Admin',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address_line_1' => 'Address Line 1',
            'address_line_2' => 'Address Line 2',
            'address _line_3' => 'Address  Line 3',
            'town_city' => 'Town City',
            'postcode' => 'Postcode',
            'telephone' => 'Telephone',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRentals()
    {
        return $this->hasMany(UserRental::className(), ['user_id' => 'user_id']);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
