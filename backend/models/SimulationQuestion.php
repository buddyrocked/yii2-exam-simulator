<?php

namespace backend\models;

use Yii;
use yii\Helpers\ArrayHelper;

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

    public function textSimulationQuestionAnswers()
    {
        $lists = $this->getSimulationQuestionAnswers()->joinWith('questionOption')->asArray()->all();
        return implode(', ', ArrayHelper::getColumn($lists, 'questionOption.option'));
    }

    public function getMyAnswers()
    {
        return $this->getSimulationQuestionAnswers()->select(['question_option_id'])->joinWith('questionOption')->asArray();
       
    }

    public function getLabelStatus(){
        $lists = [
            '0'=>'<span class="text-danger"><i class="fa fa-checkx fa-2x bebas">B</i></span>',
            '1'=>'<span class="text-success"><i class="fa fa-check fa-2x"></i></span>',
            '2'=>'<span class="text-danger"><i class="fa fa-checkx fa-2x bebas">M</i></span>'
        ];

        return $lists[$this->status];
    }

    public function getLabelStatus2(){
        $lists = [
            '0'=>'<span class="text-danger"><i class="fa fa-checkx fa-2x">B</i></span>',
            '1'=>'',
            '2'=>''
        ];

        return $lists[$this->status];
    }

    public function getLabelCorrect(){
        $lists = [
            '0'=>'<span class="text-danger"><i class="fa fa-times fa-2x"></i></span>',
            '1'=>'<span class="text-success"><i class="fa fa-check fa-2x"></i></span>',
            ''=>'<span class="text-danger"><h2><strong>B</strong></h2></i></span>'
        ];

        return $lists[$this->correct];
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

    public function getQuestionDomain(){
        return $this->hasOne(QuestionDomain::className(), ['question_id' => 'question_id']);
    }

    public function getSimulationDomain(){
        return $this->hasOne(SimulationDomain::className(), ['id' => 'simulation_domain_id']);
    }

    public function getLabelQuestion(){
        $lists = [
            '0'=>'<span class="text-success"><i class="fa fa-check fa-2x"></i></span>',
            '1'=>'<span class="text-success"><i class="fa fa-check fa-2x"></i></span>',
            '2'=>'<span class="text-success"><i class="fa fa-check fa-2x"></i></span>'
        ];

        return $lists[$this->status];
    }

    public function getNewStatus(){
        $answer = $this->getSimulationQuestionAnswers()->count();
        $status = '';
        if($answer > 0):
            $status .= '<span class="text-success"><i class="fa fa-checkx fa-2x bebas"> A </i></span>';
        else:
            $status .= '<span class="text-danger"><i class="fa fa-checkx fa-2x bebas"> B </i></span>';
        endif;

        if($this->status == 2):
            $status .= '<span class="text-danger"><i class="fa fa-checkx fa-2x bebas"> M </i></span>';
        endif;

        return $status;
    }
}
