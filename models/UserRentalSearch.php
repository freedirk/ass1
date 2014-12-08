<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserRental;


/**
 * UserRentalSearch represents the model behind the search form about `app\models\UserRental`.
 */
class UserRentalSearch extends UserRental
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'car_id', 'rental_id'], 'integer'],
            [['date_start', 'date_finish'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $isAdmin =false)
    {
        $query = UserRental::find()->where(['user_id'=>  Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => Yii::$app->user->id,
            'car_id' => $this->car_id,
            'rental_id' => $this->rental_id,
            'date_start' => $this->date_start,
            'date_finish' => $this->date_finish,
        ]);
        

        return $dataProvider;
    }
       public function searchAdmin($params, $isAdmin =false)
    {
        $query = UserRental::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'car_id' => $this->car_id,
            'rental_id' => $this->rental_id,
            'date_start' => $this->date_start,
            'date_finish' => $this->date_finish,
        ]);
        

        return $dataProvider;
    }
}
