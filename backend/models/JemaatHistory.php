<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_history".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property string $tanggal_permulaan_kebaktian
 * @property string $tanggal_peresmian
 * @property string $tanggal_patibal_batu_onjolan
 * @property integer $tanggal_pamongkoton
 * @property string $narasi
 *
 * @property Jemaat $jemaat
 */
class JemaatHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id'], 'required'],
            [['jemaat_id'], 'integer'],
            [['tanggal_permulaan_kebaktian', 'tanggal_peresmian', 'tanggal_patibal_batu_onjolan', 'tanggal_pamongkoton'], 'safe'],
            [['narasi'], 'string'],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Sejarah',
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
            'tanggal_permulaan_kebaktian' => 'Tanggal Permulaan Kebaktian',
            'tanggal_peresmian' => 'Tanggal Peresmian',
            'tanggal_patibal_batu_onjolan' => 'Tanggal Patibal Batu Onjolan',
            'tanggal_pamongkoton' => 'Tanggal Pamongkoton',
            'narasi' => 'Narasi',
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
