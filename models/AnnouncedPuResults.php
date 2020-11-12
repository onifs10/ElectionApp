<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announced_pu_results".
 *
 * @property int $result_id
 * @property string $polling_unit_uniqueid
 * @property string $party_abbreviation
 * @property int $party_score
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class AnnouncedPuResults extends \yii\db\ActiveRecord
{
    public $state,$lga,$ward;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'announced_pu_results';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['polling_unit_uniqueid', 'party_abbreviation', 'party_score'], 'required' ],
            [['party_score'], 'integer'],
            [['date_entered','state','lga','ward'], 'safe'],
            [['polling_unit_uniqueid', 'entered_by_user', 'user_ip_address'], 'string', 'max' => 50],
            [['party_abbreviation'], 'string', 'max' => 4],
            [['state','lga','ward'], 'required' ,'on' => 'create'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'result_id' => 'Result ID',
            'polling_unit_uniqueid' => 'Polling Unit Uniqueid',
            'party_abbreviation' => 'Party Abbreviation',
            'party_score' => 'Party Score',
            'entered_by_user' => 'Entered By User',
            'date_entered' => 'Date Entered',
            'user_ip_address' => 'User Ip Address',
        ];
    }

    /**
     * {@inheritdoc}
     * @return AnnouncedPuResultsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AnnouncedPuResultsQuery(get_called_class());
    }

    public function getPu()
    {
        return $this->hasOne(PollingUnit::class ,['uniqueid' => 'polling_unit_uniqueid'])->with('ward');
    }
}
