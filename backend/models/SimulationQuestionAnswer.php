<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simulation_question_answer".
 *
 * @property integer $id
 * @property integer $simulation_question_id
 * @property integer $question_option_id
 * @property integer $status
 *
 * @property SimulationQuestion $simulationQuestion
 * @property QuestionOption $questionOption
 */
class SimulationQuestionAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simulation_question_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['simulation_question_id', 'question_option_id', 'status'], 'required'],
            [['simulation_question_id', 'status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'simulation_question_id' => 'Simulation Question ID',
            'question_option_id' => 'Options',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSimulationQuestion()
    {
        return $this->hasOne(SimulationQuestion::className(), ['id' => 'simulation_question_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionOption()
    {
        return $this->hasOne(QuestionOption::className(), ['id' => 'question_option_id']);
    }
}
