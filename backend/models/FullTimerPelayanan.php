<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "full_timer_pelayanan".
 *
 * @property integer $id
 * @property integer $full_timer_id
 * @property integer $jemaat_tahbis_id
 * @property string $tanggal_tahbis
 * @property integer $golongan
 * @property integer $ruang
 * @property integer $gaji_terakhir
 * @property string $refleksi_pribadi_pelayanan
 * @property string $pencapaian_pelayanan
 * @property string $visi_pribadi
 * @property string $misi_pribadi
 * @property string $motto
 *
 * @property FullTimer $fullTimer
 * @property Jemaat $jemaatTahbis
 */
class FullTimerPelayanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_timer_pelayanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_timer_id', 'jemaat_tahbis_id', 'tanggal_tahbis', 'golongan', 'ruang', 'gaji_terakhir', 'refleksi_pribadi_pelayanan', 'pencapaian_pelayanan', 'visi_pribadi', 'misi_pribadi', 'motto'], 'required'],
            [['full_timer_id', 'jemaat_tahbis_id', 'gaji_terakhir'], 'integer'],
            [['tanggal_tahbis'], 'safe'],
            [['refleksi_pribadi_pelayanan', 'pencapaian_pelayanan', 'visi_pribadi', 'misi_pribadi', 'motto'], 'string'],
            [['full_timer_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimer::className(), 'targetAttribute' => ['full_timer_id' => 'id']],
            [['jemaat_tahbis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_tahbis_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Informasi Pelayanan',
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
            'jemaat_tahbis_id' => 'Jemaat Penahbisan',
            'tanggal_tahbis' => 'Tanggal Tahbis',
            'golongan' => 'Golongan',
            'ruang' => 'Ruang',
            'gaji_terakhir' => 'Gaji Terakhir',
            'refleksi_pribadi_pelayanan' => 'Refleksi Pribadi Pelayanan',
            'pencapaian_pelayanan' => 'Pencapaian Pelayanan',
            'visi_pribadi' => 'Visi Pribadi',
            'misi_pribadi' => 'Misi Pribadi',
            'motto' => 'Motto',
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
    public function getJemaatTahbis()
    {
        return $this->hasOne(Jemaat::className(), ['id' => 'jemaat_tahbis_id']);
    }

    public function getNamaJemaatTahbis()
    {
        isset($this->jemaatTahbis) ? $this->jemaatTahbis->nama : 'Belum ada data' ;
    }

    public function getNamaFull()
    {
        return $this->fullTimer->namaFull;
    }     

}
