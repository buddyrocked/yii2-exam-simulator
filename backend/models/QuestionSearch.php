<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Question;

/**
 * QuestionSearch represents the model behind the search form about `backend\models\Question`.
 */
class QuestionSearch extends Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subject_id', 'passage_id', 'source_id', 'level', 'time', 'is_random'], 'integer'],
            [['id_question', 'question', 'created', 'updated'], 'safe'],
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
        $query = Question::find();

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
            'subject_id' => $this->subject_id,
            'passage_id' => $this->passage_id,
            'question' => $this->question,
            'source_id' => $this->source_id,
            'level' => $this->level,
            'time' => $this->time,
            'is_random' => $this->is_random,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->andFilterWhere(['like', 'id_question', $this->question])
            ->orFilterWhere(['like', 'question', $this->question])
            ->orFilterWhere(['like', 'subject_id', $this->question])
            ->orFilterWhere(['like', 'passage_id', $this->question])
            ->orFilterWhere(['like', 'level', $this->question])
            ->orFilterWhere(['like', 'source_id', $this->question])->orderBy('updated DESC');

        return $dataProvider;
    }
}
