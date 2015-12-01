<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Event;

/**
 * EventSearch represents the model behind the search form about `frontend\models\Event`.
 */
class EventSearch extends Event
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'published'], 'integer'],
            [['name', 'description', 'note', 'datetime', 'venue', 'address', 'file', 'image', 'created', 'updated'], 'safe'],
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
    public function search($params)
    {
        $query = Event::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere([
            'id' => $this->id,
            'datetime' => $this->datetime,
            'published' => $this->published,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->orFilterWhere(['like', 'name', $this->name])
            ->orFilterWhere(['like', 'description', $this->name])
            ->orFilterWhere(['like', 'note', $this->name])
            ->orFilterWhere(['like', 'venue', $this->name])
            ->orFilterWhere(['like', 'address', $this->name])
            ->orFilterWhere(['like', 'file', $this->name])
            ->orFilterWhere(['like', 'image', $this->name]);

        return $dataProvider;
    }
}
