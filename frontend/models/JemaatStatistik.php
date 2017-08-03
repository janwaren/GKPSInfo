<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jemaat_statistik".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property integer $jumlah_tangga_banggal
 * @property integer $jumlah_tangga_etek
 * @property integer $jumlah_jiwa
 * @property integer $jumlah_sintua
 * @property integer $jumlah_syamas
 * @property string $nama_pengantar_jemaat
 * @property string $tahun_data
 *
 * @property Jemaat $jemaat
 */
class JemaatStatistik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_statistik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'jumlah_tangga_banggal', 'jumlah_tangga_etek', 'jumlah_jiwa', 'jumlah_sintua', 'jumlah_syamas', 'nama_pengantar_jemaat', 'tahun_data'], 'required'],
            [['jemaat_id', 'jumlah_tangga_banggal', 'jumlah_tangga_etek', 'jumlah_jiwa', 'jumlah_sintua', 'jumlah_syamas'], 'integer'],
            [['tahun_data'], 'safe'],
            [['nama_pengantar_jemaat'], 'string', 'max' => 80],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Statistik',
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
            'jumlah_tangga_banggal' => 'Jumlah Tangga Banggal',
            'jumlah_tangga_etek' => 'Jumlah Tangga Etek',
            'jumlah_jiwa' => 'Jumlah Jiwa',
            'jumlah_sintua' => 'Jumlah Sintua',
            'jumlah_syamas' => 'Jumlah Syamas',
            'nama_pengantar_jemaat' => 'Nama Pengantar Jemaat',
            'tahun_data' => 'Tahun Data',
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
        return $this->jemaat->namaFull;
    }      
}
