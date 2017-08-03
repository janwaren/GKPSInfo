<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "level_kantor_pusat".
 *
 * @property integer $id
 * @property string $nama
 * @property string $deskripsi
 * @property integer $level
 *
 * @property OrganisasiKantorPusat[] $organisasiKantorPusats
 */
class LevelKantorPusat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level_kantor_pusat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'deskripsi'], 'required'],
            [['deskripsi'], 'string'],
            [['level'], 'integer'],
            [['nama'], 'string', 'max' => 60],
            [['nama'], 'unique'],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Level Organisasi Kantor Pusat',
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
            'deskripsi' => 'Deskripsi',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganisasiKantorPusats()
    {
        return $this->hasMany(OrganisasiKantorPusat::className(), ['level_internal_id' => 'id']);
    }

    public function getNamaFull()
    {
        return $this->nama;
    }       
}
