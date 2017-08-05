<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "karir_etc_jabatan".
 *
 * @property integer $id
 * @property string $posisi
 *
 * @property KarirExternal[] $karirExternals
 * @property KarirJemaat[] $karirJemaats
 * @property KarirKantorPusat[] $karirKantorPusats
 * @property KarirKepanitiaan[] $karirKepanitiaans
 * @property LevelJemaat[] $levelJemaats
 * @property ZzzKarir[] $zzzKarirs
 * @property ZzzKarirExternal[] $zzzKarirExternals
 */
class KarirEtcJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karir_etc_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['posisi'], 'required'],
            [['posisi'], 'string', 'max' => 100],
            [['posisi'], 'unique'],
            [['posisi'], 'unique'],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Tugas Jabatan',
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
            'posisi' => 'Posisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirExternals()
    {
        return $this->hasMany(KarirExternal::className(), ['jabatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirJemaats()
    {
        return $this->hasMany(KarirJemaat::className(), ['jabatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirKantorPusats()
    {
        return $this->hasMany(KarirKantorPusat::className(), ['jabatan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirKepanitiaans()
    {
        return $this->hasMany(KarirKepanitiaan::className(), ['posisi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevelJemaats()
    {
        return $this->hasMany(LevelJemaat::className(), ['posisi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZzzKarirs()
    {
        return $this->hasMany(ZzzKarir::className(), ['posisi_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZzzKarirExternals()
    {
        return $this->hasMany(ZzzKarirExternal::className(), ['posisi_id' => 'id']);
    }

    public function getNamaFull()
    {
        return $this->posisi;
    }        
}
