<?php

namespace frontend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

use frontend\models\JemaatDemografi;

/**
 * This is the model class for table "jemaat".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $super_id
 * @property integer $level_jemaat_id
 * @property integer $status_jemaat_id
 * @property Jemaat $super
 * @property Jemaat[] $jemaats
 * @property LevelJemaat $levelJemaat
 * @property JemaatStatus $jemaatStatus
 * @property JemaatDetails[] $jemaatDetails
 */
class Jemaat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'level_jemaat_id'], 'required'],
            [['super_id', 'level_jemaat_id', 'status_jemaat_id'], 'integer'],
            [['nama'], 'string', 'max' => 50],
            [['super_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['super_id' => 'id']],
            [['level_jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => LevelJemaat::className(), 'targetAttribute' => ['level_jemaat_id' => 'id']],
            [['status_jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => JemaatStatus::className(), 'targetAttribute' => ['status_jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Informasi Jemaat',
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
            'nama' => 'Nama',
            'super_id' => 'Jemaat Induk',
            'level_jemaat_id' => 'Level Jemaat',
            'status_jemaat_id' => 'Status Jemaat ID',
            'levelJemaatNama' => 'Level',
            'superNama' => 'Nama Induk',
            'superNamaFull' => 'Nama Induk',
            'namaFull' => 'Nama',
            'statusJemaatNama' => 'Status Jemaat',
        ];
    }

    public function getNamaFull()
    {
        if ($this->statusJemaat->status != 'Aktif')
            return $this->statusJemaat->status . ' ' . $this->nama;
        else
            return $this->levelJemaatNama . ' ' . $this->nama;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuper()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'super_id']);
    }

    public function getSuperNama()
    {
        return isset($this->super) ? $this->super->nama : 'Tidak ada' ;
    }

    public function getSuperNamaFull()
    {
        return isset($this->super) ? $this->super->levelJemaatNama . ' ' . $this->super->nama : 'Tidak ada';
    }

    public function getAllSuper()
    {

        $upperLevel = isset($this->levelJemaat) ? $this->levelJemaat->level - 1 : 1;
        // get level_jemaat value/tingkat from database
        $upperLevelJemaat = LevelJemaat::find()->where(['level' => $upperLevel])->one();
        if (!empty($upperLevelJemaat)) {
            // get all super id from database Jemaat
            return $this->find()->where(['level_jemaat_id' => $upperLevelJemaat->id])->all();
        } else {
            return ['Tidak Ada'];
        }


    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaats()
    {
        return $this->hasMany(Jemaat::className(), ['super_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevelJemaat()
    {
        return $this->hasOne(LevelJemaat::className(), ['id' => 'level_jemaat_id']);
    }

    public function getLevelJemaatNama()
    {
        return isset($this->levelJemaat) ? $this->levelJemaat->nama : 'Level tidak ada';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusJemaat()
    {
        return $this->hasOne(JemaatStatus::className(), ['id' => 'status_jemaat_id']);
    }

    public function getStatusJemaatNama()
    {
        return $this->statusJemaat->status;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatDetails()
    {
        return $this->hasMany(JemaatDetails::className(), ['jemaat_id' => 'id']);
    }

}
