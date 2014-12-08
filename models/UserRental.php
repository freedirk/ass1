<?php

namespace app\models;

use Yii;
use app\models\Car;

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
class UserRental extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_rental';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'car_id', 'date_start', 'date_finish'], 'required'],
            [['user_id', 'car_id'], 'integer'],
            [['date_start', 'date_finish'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'user_id' => 'User ID',
            'car_id' => 'Car ID',
            'rental_id' => 'Reference #',
            'date_start' => 'Date Start',
            'date_finish' => 'Date Finish',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar() {
        return $this->hasOne(Car::className(), ['car_id' => 'car_id']);
    }

    public function getCarName() {
        $car = $this->hasOne(Car::className(), ['car_id' => 'car_id']);
        return $car->model;
    }

    public function getStartDate() {
        return date('d/m/Y', strtotime($this->date_start));
    }

    public function getendDate() {
        return date('d/m/Y', strtotime($this->date_start));
    }

}
