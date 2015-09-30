<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "simulation_question".
 *
 * @property integer $id
 * @property integer $simulation_id
 * @property integer $question_id
 * @property integer $status
 *
 * @property Question $question
 * @property Simulation $simulation
 * @property SimulationQuestionAnswer[] $simulationQuestionAnswers
 */
class SimulationQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simulation_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['simulation_id', 'question_id', 'status'], 'required'],
            [['simulation_id', 'question_id', 'status'], 'integer']
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
            'question_id' => 'Question ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
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
    public function getSimulationQuestionAnswers()
    {
        return $this->hasMany(SimulationQuestionAnswer::className(), ['simulation_question_id' => 'id']);
    }

    public function getLabelStatus(){
        $lists = [
            '0'=>'<span class="text-danger"><i class="fa fa-times fa-2x"></i></span>',
            '1'=>'<span class="text-success"><i class="fa fa-check fa-2x"></i></span>',
            '2'=>'<span class="text-danger"><i class="fa fa-question fa-2x"></i></span>'
        ];

        return $lists[$this->status];
    }

    public function convertSecondstoTimes($seconds){
        if($seconds > 0):
            $h = floor($seconds / 3600);
            $m = floor($seconds % 3600 / 60);
            $s = $seconds % 60;
        else:
            $h = 0;
            $m = 0;
            $s = 0;
        endif;

        return sprintf('%dh%02dm%02ds', $h, $m, $s);
    }
}
