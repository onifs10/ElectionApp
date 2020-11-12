<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lga".
 *
 * @property int $uniqueid
 * @property int $lga_id
 * @property string $lga_name
 * @property int $state_id
 * @property string|null $lga_description
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class Lga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lga_id', 'lga_name', 'state_id'], 'required'],
            [['lga_id', 'state_id'], 'integer'],
            [['lga_description'], 'string'],
            [['date_entered'], 'safe'],
            [['lga_name', 'entered_by_user', 'user_ip_address'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uniqueid' => 'Uniqueid',
            'lga_id' => 'Lga ID',
            'lga_name' => 'Lga Name',
            'state_id' => 'State ID',
            'lga_description' => 'Lga Description',
            'entered_by_user' => 'Entered By User',
            'date_entered' => 'Date Entered',
            'user_ip_address' => 'User Ip Address',
        ];
    }

    public function getWard()
    {
        return $this->hasMany(Ward::class , ['lga_id' => 'lga_id']);
    }

    public function getState()
    {
        return $this->hasOne(States::class, ['state_id' =>'state_id']);
    }
    public function getPu()
    {
        $ids =  $this->hasMany(PollingUnit::class,['lga_id' => 'lga_id'])->select('uniqueid')->asArray()->all();
        $array = [];
        foreach($ids as $id)
        {
            $array[] = (int) $id['uniqueid'];
        }
        return AnnouncedPuResults::find()->select('SUM(party_score) as party_score , party_abbreviation')->where(['in','polling_unit_uniqueid', $array])->groupBy('party_abbreviation')->all();
    }
}
