<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_kebaktian_minggu".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property string $jam
 * @property string $bahasa
 *
 * @property Jemaat $jemaat
 */
class JemaatKebaktianMinggu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_kebaktian_minggu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'jam', 'bahasa'], 'required'],
            [['jemaat_id'], 'integer'],
            [['jam'], 'safe'],
            [['bahasa'], 'string'],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Kebaktian Minggu',
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
            'jam' => 'Jam',
            'bahasa' => 'Bahasa',
        ];
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
