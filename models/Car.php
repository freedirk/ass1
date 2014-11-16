<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property integer $car_id
 * @property string $make
 * @property string $model
 * @property string $number_plate
 * @property string $category
 *
 * @property UserRental[] $userRentals
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['make', 'model', 'number_plate', 'category'], 'required'],
            [['make', 'model', 'category'], 'string', 'max' => 45],
            [['number_plate'], 'string', 'max' => 8],
            [['number_plate'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'car_id' => 'Car ID',
            'make' => 'Make',
            'model' => 'Model',
            'number_plate' => 'Number Plate',
            'category' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRentals()
    {
        return $this->hasMany(UserRental::className(), ['car_id' => 'car_id']);
    }
}
