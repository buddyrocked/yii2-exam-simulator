<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "subject".
 *
 * @property integer $id
 * @property string $id_subject
 * @property string $name
 * @property string $desc
 * @property integer $question_number
 * @property integer $time
 * @property string $created
 * @property string $updated
 *
 * @property Domain[] $domains
 * @property Question[] $questions
 */
class Subject extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('NOW()'),
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'question_number', 'time', 'minimum_score', 'timer_mode', 'explain_mode', 'status'], 'required'],
            [['desc'], 'string'],
            [['question_number', 'time', 'minimum_score'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['id_subject', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_subject' => 'Search',
            'name' => 'Name',
            'desc' => 'Desc',
            'question_number' => 'Question Number',
            'time' => 'Time(Minutes)',
            'minimum_score' => 'Min Score',
            'created' => 'Created',
            'updated' => 'Updated',
            'status' => 'Exam Mode',
            'explain_mode' => 'Explain Mode After',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomains()
    {
        return $this->hasMany(Domain::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['subject_id' => 'id']);
    }

    public function getLastNumber(){
        return $this::find();
    }

    public function generateNumber(){
        $lastNumber = $this->getLastNumber();
        return $this->name.str_pad($lastNumber->count() + 1, 4, '0', STR_PAD_LEFT);
    }

    public function getQuestionByDomain($domain){
        $limit = ($domain->percentage / 100) * $this->question_number;
        return $this->getQuestions()->joinWith('questionDomains')->select(['question.id', 'question_domain.id AS question_domain_id', 'question_domain.domain_id'])->where(['question_domain.domain_id'=>$domain->id])->limit($limit)->orderBy('RAND()');
    }

    public function getQuestionForSimulations(){
        $domains = $this->domains;

        $questions = [];

        foreach($domains as $domain):
            $domainQuestions = $this->getQuestionByDomain($domain)->asArray()->all();
            $questions = array_merge($questions, $domainQuestions);
        endforeach;
        return $questions;
    }

    public function convertToHoursMins($time, $format = '%d:%d:00') {
        settype($time, 'integer');
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

    public function getLabelTimer(){
        $lists = [
            '0'=>'No Timer',
            '1'=>'Timer per Exam',
            '2'=>'Timer per Question',
            '3'=>'Timer per Exam & Question'
        ];

        return $lists[$this->timer_mode];
    }

    public function getLabelStatus(){
        $lists = [
            ''=>'Live',
            '0'=>'Live',
            '1'=>'Demo',
        ];

        return $lists[$this->status];
    }

    public function getLabelExplainMode(){
        $lists = [
            ''=>'Hide Explanation',
            '0'=>'Hide Explanation',
            '1'=>'Show Explanation',
            '2'=>'Hide Explanation',
        ];

        return $lists[$this->explain_mode];
    }

    public function getSimulations()
    {
        return $this->hasMany(Simulation::className(), ['subject_id' => 'id']);
    }
}
