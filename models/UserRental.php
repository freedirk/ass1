<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_rental".
 *
 * @property integer $user_id
 * @property integer $car_id
 * @property integer $rental_id
 * @property string $date_start
 * @property string $date_finish
 *
 * @property User $user
 * @property Car $car
 */
class UserRental extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_rental';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id', 'rental_id', 'date_start', 'date_finish'], 'required'],
            [['user_id', 'car_id', 'rental_id'], 'integer'],
            [['date_start', 'date_finish'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'car_id' => 'Car ID',
            'rental_id' => 'Rental ID',
            'date_start' => 'Date Start',
            'date_finish' => 'Date Finish',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['car_id' => 'car_id']);
    }
}
