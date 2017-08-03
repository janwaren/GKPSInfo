<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "full_timer".
 *
 * @property integer $id
 * @property string $gelar_depan
 * @property string $nama
 * @property string $gelar_belakang
 * @property integer $jabatan_id
 * @property string $jenis_kelamin
 * @property string $email
 * @property string $hp
 * @property string $alamat_rumah
 * @property integer $user_id
 * @property string $no_induk
 * @property string $photo_file
 *
 * @property FullTimerJabatan $jabatan
 * @property User $user
 * @property FullTimerKeluarga[] $fullTimerKeluargas
 * @property FullTimerKuliah[] $fullTimerKuliahs
 * @property FullTimerKursus[] $fullTimerKursuses
 * @property FullTimerPelayanan[] $fullTimerPelayanans
 * @property FullTimerRiwayatHidup[] $fullTimerRiwayatHidups
 * @property FullTimerSekolah[] $fullTimerSekolahs
 * @property KarirExternal[] $karirExternals
 * @property KarirJemaat[] $karirJemaats
 * @property KarirKantorPusat[] $karirKantorPusats
 * @property KarirKepanitiaan[] $karirKepanitiaans
 * @property ZzzKarir[] $zzzKarirs
 * @property ZzzKarirExternal[] $zzzKarirExternals
 */
class FullTimer extends \yii\db\ActiveRecord
{


    public $photoFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_timer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'jabatan_id'], 'required'],
            [['jabatan_id', 'user_id'], 'integer'],
            [['jenis_kelamin', 'alamat_rumah'], 'string'],
            [['hp', 'no_induk'], 'string', 'max' => 20],
            [['gelar_depan', 'gelarDepan', 'gelar_belakang', 'gelarBelakang'], 'safe'],
            [['nama', 'email'], 'string', 'max' => 40],
            [['photo_file'], 'string', 'max' => 255],
            [['photoFile'], 'file'],
            [['user_id'], 'unique'],
            [['jabatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => FullTimerJabatan::className(), 'targetAttribute' => ['jabatan_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

     public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Full Timer',
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
            'gelar_depan' => 'Gelar Depan',
            'nama' => 'Nama',
            'gelar_belakang' => 'Gelar Belakang',
            'jabatan_id' => 'Jabatan',
            'jenis_kelamin' => 'Jenis Kelamin',
            'email' => 'Email',
            'hp' => 'Hp',
            'alamat_rumah' => 'Alamat Rumah',
            'user_id' => 'User ID',
            'no_induk' => 'No Induk',
            'photo_file' => 'Photo File',
            'namaAndGelar' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(FullTimerJabatan::className(), ['id' => 'jabatan_id']);
    }

    public function setGelarDepan($gelarDepan)
    {
        $this->gelarDepan = $gelarDepan;
    }

    public function setGelarBelakang($gelarBelakang)
    {
        $this->gelarBelakang = $gelarBelakang;
    }    

    public function getGelarDepan()
    {
        return !empty($this->gelar_depan) ? explode(", ", $this->gelar_depan) : [];
    }

    public function getGelarBelakang()
    {
        return !empty($this->gelar_belakang) ? explode(", ", $this->gelar_belakang) : [];
    }

    public function getNamaAndGelar()
    {
        return $this->gelar_depan . ' ' . $this->nama . ', ' . $this->gelar_belakang;
    }

    public function getNamaFull()
    {
        return  (!empty($this->jabatan->singkatan) ? $this->jabatan->singkatan . ' '  : '') . 
                (!empty($this->gelar_depan) ? $this->gelar_depan . ' '  : '') . 
                $this->nama . 
                (!empty($this->gelar_belakang) ? ', ' . $this->gelar_belakang : '');
    }    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimerKeluargas()
    {
        return $this->hasMany(FullTimerKeluarga::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimerKuliahs()
    {
        return $this->hasMany(FullTimerKuliah::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimerKursuses()
    {
        return $this->hasMany(FullTimerKursus::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimerPelayanans()
    {
        return $this->hasMany(FullTimerPelayanan::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimerRiwayatHidups()
    {
        return $this->hasMany(FullTimerRiwayatHidup::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimerSekolahs()
    {
        return $this->hasMany(FullTimerSekolah::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirExternals()
    {
        return $this->hasMany(KarirExternal::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirJemaats()
    {
        return $this->hasMany(KarirJemaat::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirKantorPusats()
    {
        return $this->hasMany(KarirKantorPusat::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirKepanitiaans()
    {
        return $this->hasMany(KarirKepanitiaan::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZzzKarirs()
    {
        return $this->hasMany(ZzzKarir::className(), ['full_timer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZzzKarirExternals()
    {
        return $this->hasMany(ZzzKarirExternal::className(), ['full_timer_id' => 'id']);
    }
}
