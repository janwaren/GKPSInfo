<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_kebaktian_sektor".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property string $nama_sektor
 * @property string $hari
 * @property string $jam
 *
 * @property Jemaat $jemaat
 */
class JemaatKebaktianSektor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_kebaktian_sektor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'nama_sektor', 'hari', 'jam'], 'required'],
            [['jemaat_id'], 'integer'],
            [['hari'], 'string'],
            [['jam'], 'safe'],
            [['nama_sektor'], 'string', 'max' => 40],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Kebaktian Sektor',
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
            'nama_sektor' => 'Nama Sektor',
            'hari' => 'Hari',
            'jam' => 'Jam',
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
