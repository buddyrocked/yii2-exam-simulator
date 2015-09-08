<?php

namespace backend\models;

use webvimark\modules\UserManagement\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "simulation".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $subject_id
 * @property integer $duration
 * @property integer $timer_mode
 * @property string $start
 * @property string $finish
 * @property integer $status
 * @property string $score
 * @property string $created
 * @property string $updated
 *
 * @property Subject $subject
 * @property User $user
 * @property SimulationQuestion[] $simulationQuestions
 */
class Simulation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'simulation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'subject_id', 'duration', 'timer_mode', 'status'], 'required'],
            [['user_id', 'subject_id', 'duration', 'timer_mode', 'status'], 'integer'],
            [['start', 'finish', 'created', 'updated'], 'safe'],
            [['score'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'subject_id' => 'Subject ID',
            'duration' => 'Duration',
            'timer_mode' => 'Timer Mode',
            'start' => 'Start',
            'finish' => 'Finish',
            'status' => 'Status',
            'score' => 'Score',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSimulationQuestions()
    {
        return $this->hasMany(SimulationQuestion::className(), ['simulation_id' => 'id']);
    }

    public function getQuestionForSimulations(){
        $questions = $this->subject->getQuestionForSimulations();
        $qs = [];
        if($questions != null):
            foreach ($questions as $question) {
                $qs[] = [$question['id'], $this->id, 0];
            }
        endif;

        return $qs;
    }
    
    public function insertQuestionSimulations(){
        return Yii::$app->db->createCommand()->batchInsert(SimulationQuestion::tableName(), ['question_id', 'simulation_id', 'status'],  $this->getQuestionForSimulations())->execute();
    }

    public function getProfile(){
        return $this->hasOne(Profile::className(), ['user_id'=>'user_id']);
    }

    public function getLabelTimer(){
        $lists = [
            '0'=>'No Timer',
            '1'=>'Active Timer'
        ];

        return $lists[$this->timer_mode];
    }

}
