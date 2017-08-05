<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jemaat_location".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property string $address
 * @property double $lat
 * @property double $lng
 * @property string $type
 *
 * @property JemaatDetails[] $jemaatDetails
 * @property Jemaat $jemaat
 */
class JemaatLocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'address', 'lat', 'lng', 'type'], 'required'],
            [['jemaat_id'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['address'], 'string', 'max' => 200],
            [['type'], 'string', 'max' => 30],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Lokasi Geografis',
                ],
            ],
        ];
    }       

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jemaat_id' => 'Jemaat ID',
            'address' => 'Address',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatDetails()
    {
        return $this->hasMany(JemaatDetails::className(), ['jemaat_location_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaat()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_id']);
    }

    public function getNamaFull()
    {
        return  $this->jemaat->namaFull;
    }     
}
