<?php

namespace frontend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "event_registration".
 *
 * @property integer $id
 * @property string $prefix
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property integer $registered_by
 * @property string $job_title
 * @property string $company
 * @property string $company_address
 * @property string $city
 * @property string $postal_code
 * @property string $company_phone
 * @property string $company_fax
 * @property string $approved_by
 * @property string $designation
 * @property integer $status
 * @property string $created
 * @property string $updated
 */
class EventRegistration extends \yii\db\ActiveRecord
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
        return 'event_registration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'registered_by', 'status'], 'required'],
            [['address', 'company_address'], 'string'],
            [['registered_by', 'status'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['prefix', 'name', 'phone', 'email', 'job_title', 'company', 'city', 'postal_code', 'company_phone', 'company_fax', 'approved_by', 'designation'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prefix' => 'Prefix',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'registered_by' => 'Registered By',
            'job_title' => 'Job Title',
            'company' => 'Company',
            'company_address' => 'Company Address',
            'city' => 'City',
            'postal_code' => 'Postal Code',
            'company_phone' => 'Company Phone',
            'company_fax' => 'Company Fax',
            'approved_by' => 'Approved By',
            'designation' => 'Designation',
            'status' => 'Status',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }


    public function getEvent(){
        return $this->hasOne(Event::className(), ['id'=>'event_id']);
    }

    public function sendMail(){
        $emailFrom = 'contact@rialachas.com';
        $emailTo = 'eka.yuniasari@rialachas.com';
        if($emailFrom != null && $emailTo != null):
            Yii::$app->mailer->compose('event-register', [
                                                            'imageFileName' => 'http://103.237.33.51:1981/uploads/img/logo-conservir-angsa.png',
                                                            'model'=>$this,
                                                        ])
            ->setFrom($emailFrom)
            ->setTo($emailTo)
            ->setSubject('Event Register Notification')
            ->send();

            return true;
        else:
            return false;
        endif;
    }
}
