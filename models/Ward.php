<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ward".
 *
 * @property int $uniqueid
 * @property int $ward_id
 * @property string $ward_name
 * @property int $lga_id
 * @property string|null $ward_description
 * @property string $entered_by_user
 * @property string $date_entered
 * @property string $user_ip_address
 */
class Ward extends \yii\db\ActiveRecord
{
    public $state_id;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ward';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ward_id', 'ward_name', 'lga_id'], 'required'],
            [['state_id'],'required' ,'on' => 'create'],
            [['ward_id', 'lga_id'], 'integer'],
            [['ward_description'], 'string'],
            [['date_entered'], 'safe'],
            [['ward_name', 'entered_by_user', 'user_ip_address'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'uniqueid' => 'Uniqueid',
            'ward_id' => 'Ward ID',
            'ward_name' => 'Ward Name',
            'lga_id' => 'Lga ID',
            'ward_description' => 'Ward Description',
            'entered_by_user' => 'Entered By User',
            'date_entered' => 'Date Entered',
            'user_ip_address' => 'User Ip Address',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WardQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WardQuery(get_called_class());
    }

    public function getPollingUnit()
    {
        return $this->hasMany(PollingUnit::class,['uniquewardid' => 'uniqueid']);
    }
    public function getLga()
    {
        return $this->hasOne(Lga::class, ['lga_id' => 'lga_id'])->with('state');
    }
}
