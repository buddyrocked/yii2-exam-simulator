<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\EventRegistration;

/**
 * EventRegistrationSearch represents the model behind the search form about `frontend\models\EventRegistration`.
 */
class EventRegistrationSearch extends EventRegistration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'registered_by', 'status'], 'integer'],
            [['prefix', 'name', 'phone', 'email', 'address', 'job_title', 'company', 'company_address', 'city', 'postal_code', 'company_phone', 'company_fax', 'approved_by', 'designation', 'created', 'updated'], 'safe'],
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
        $query = EventRegistration::find();

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
            'registered_by' => $this->registered_by,
            'status' => $this->status,
            'created' => $this->created,
            'updated' => $this->updated,
        ]);

        $query->orFilterWhere(['like', 'prefix', $this->name])
            ->orFilterWhere(['like', 'name', $this->name])
            ->orFilterWhere(['like', 'phone', $this->name])
            ->orFilterWhere(['like', 'email', $this->name])
            ->orFilterWhere(['like', 'address', $this->name])
            ->orFilterWhere(['like', 'job_title', $this->name])
            ->orFilterWhere(['like', 'company', $this->name])
            ->orFilterWhere(['like', 'company_address', $this->name])
            ->orFilterWhere(['like', 'city', $this->name])
            ->orFilterWhere(['like', 'postal_code', $this->name])
            ->orFilterWhere(['like', 'company_phone', $this->name])
            ->orFilterWhere(['like', 'company_fax', $this->name])
            ->orFilterWhere(['like', 'approved_by', $this->name])
            ->orFilterWhere(['like', 'designation', $this->name]);

        return $dataProvider;
    }
}
