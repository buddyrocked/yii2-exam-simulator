<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simulation_domain".
 *
 * @property integer $id
 * @property integer $simulation_id
 * @property integer $domain_id
 *
 * @property Domain $domain
 * @property Simulation $simulation
 */
class SimulationDomain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simulation_domain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['simulation_id', 'domain_id'], 'required'],
            [['simulation_id', 'domain_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'simulation_id' => 'Simulation ID',
            'domain_id' => 'Domain ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(Domain::className(), ['id' => 'domain_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSimulation()
    {
        return $this->hasOne(Simulation::className(), ['id' => 'simulation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSimulationQuestions()
    {
        return $this->hasMany(SimulationQuestion::className(), ['simulation_domain_id' => 'id']);
    }   

    public function countPercent(){
        return ($this->getSimulationQuestions()->where(['correct'=>1])->count() > 0)?floor(($this->getSimulationQuestions()->where(['correct'=>1])->count() / $this->getSimulationQuestions()->count()) * 100):0;
    } 

    public function getStrength(){
        $strength = $this->simulation->getSimulationDomainStrengths()->where(['<=', 'min', $this->countPercent()])->andWhere(['>=', 'max', $this->countPercent()]);

        return $strength;
    }
}
