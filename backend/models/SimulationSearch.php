<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Simulation;

/**
 * SimulationSearch represents the model behind the search form about `backend\models\Simulation`.
 */
class SimulationSearch extends Simulation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'subject_id', 'duration', 'timer_mode', 'status'], 'integer'],
            [['start', 'finish', 'created', 'updated'], 'safe'],
            [['score'], 'number'],
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
        $query = Simulation::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'subject_id' => $this->subject_id,
            'duration' => $this->duration,
            'timer_mode' => $this->timer_mode,
            'start' => $this->start,
            'finish' => $this->finish,
            'status' => $this->status,
            'score' => $this->score,
            'created' => $this->created,
            'updated' => $this->updated,
        ])->orderBy('id DESC');

        return $dataProvider;
    }
    
    public function searchList($params)
    {
        $query = Simulation::find()
        ->where(['user_id' => Yii::$app->user->identity->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'subject_id' => $this->subject_id,
            'duration' => $this->duration,
            'timer_mode' => $this->timer_mode,
            'start' => $this->start,
            'finish' => $this->finish,
            'status' => $this->status,
            'score' => $this->score,
            'created' => $this->created,
            'updated' => $this->updated,
        ])->orderBy('id DESC');

        return $dataProvider;
    }
}
