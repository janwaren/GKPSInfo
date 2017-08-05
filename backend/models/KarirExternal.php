<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "karir_external".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property integer $jabatan_id
 * @property integer $external_org_id
 * @property string $tahun_mulai
 * @property string $tahun_selesai
 *
 * @property FullTimer $fullTimer
 * @property KarirEtcJabatan $jabatan
 * @property OrganisasiLuarGkps $externalOrg
 */
class KarirExternal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'karir_external';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'jabatan_id', 'external_org_id', 'tahun_mulai', 'tahun_selesai'], 'required'],
            [['full_timer_id', 'jabatan_id', 'external_org_id'], 'integer'],
            [['tahun_mulai', 'tahun_selesai'], 'safe'],
            [['keterangan'], 'string'],
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => KarirEtcJabatan::className(), 'targetAttribute' => ['jabatan_id' => 'id']],
            [['external_org_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrganisasiLuarGkps::className(), 'targetAttribute' => ['external_org_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Pelayanan Oikoumenis',
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
            'full_timer_id' => 'Full Timer ID',
            'jabatan_id' => 'Jabatan',
            'external_org_id' => 'Organisasi',
            'tahun_mulai' => 'Tahun Mulai',
            'tahun_selesai' => 'Tahun Selesai',
            'keterangan' => 'Keterangan'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimer()
    {
        return $this->hasOne(FullTimer::className(), ['id' => 'full_timer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(KarirEtcJabatan::className(), ['id' => 'jabatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExternalOrg()
    {
        return $this->hasOne(OrganisasiLuarGkps::className(), ['id' => 'external_org_id']);
    }

    public function getNamaFull()
    {
        return $this->fullTimer->namaFull . ' di ' . $this->externalOrg->namaFull;
    }            

}
