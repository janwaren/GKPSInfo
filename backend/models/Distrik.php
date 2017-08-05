<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $super_id
 * @property integer $level_jemaat_id
 * @property string $deskripsi
 * @property string $alamat
 * @property string $telp
 * @property string $email
 * @property string $tanggal_berdiri
 * @property integer $status_jemaat_id
 * @property integer $jumlah_tangga_banggal
 * @property integer $jumlah_tangga_etek
 * @property integer $jumlah_jiwa
 * @property integer $jumlah_sintua
 * @property integer $jumlah_syamas
 * @property string $nama_pengantar_jemaat
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * @property Distrik $super
 * @property Distrik[] $distriks
 * @property LevelJemaat $levelJemaat
 * @property StatusJemaat $statusJemaat
 * @property User $createdBy
 * @property User $updatedBy
 * @property JemaatDetails[] $jemaatDetails
 */
class Distrik extends \yii\db\ActiveRecord
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
            [['nama', 'level_jemaat_id', 'email', 'jumlah_tangga_banggal', 'jumlah_tangga_etek', 'jumlah_jiwa', 'jumlah_sintua', 'jumlah_syamas', 'nama_pengantar_jemaat', 'created_by', 'updated_by'], 'required'],
            [['super_id', 'level_jemaat_id', 'status_jemaat_id', 'jumlah_tangga_banggal', 'jumlah_tangga_etek', 'jumlah_jiwa', 'jumlah_sintua', 'jumlah_syamas', 'created_by', 'updated_by'], 'integer'],
            [['deskripsi', 'alamat'], 'string'],
            [['tanggal_berdiri', 'created_at', 'updated_at'], 'safe'],
            [['nama', 'email'], 'string', 'max' => 50],
            [['telp'], 'string', 'max' => 30],
            [['nama_pengantar_jemaat'], 'string', 'max' => 60],
            [['super_id'], 'exist', 'skipOnError' => true, 'targetClass' => Distrik::className(), 'targetAttribute' => ['super_id' => 'id']],
            [['level_jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => LevelJemaat::className(), 'targetAttribute' => ['level_jemaat_id' => 'id']],
            [['status_jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatusJemaat::className(), 'targetAttribute' => ['status_jemaat_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            'super_id' => 'Super ID',
            'level_jemaat_id' => 'Level Jemaat ID',
            'deskripsi' => 'Deskripsi',
            'alamat' => 'Alamat',
            'telp' => 'Telp',
            'email' => 'Email',
            'tanggal_berdiri' => 'Tanggal Berdiri',
            'status_jemaat_id' => 'Status Jemaat ID',
            'jumlah_tangga_banggal' => 'Jumlah Tangga Banggal',
            'jumlah_tangga_etek' => 'Jumlah Tangga Etek',
            'jumlah_jiwa' => 'Jumlah Jiwa',
            'jumlah_sintua' => 'Jumlah Sintua',
            'jumlah_syamas' => 'Jumlah Syamas',
            'nama_pengantar_jemaat' => 'Nama Pengantar Jemaat',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuper()
    {
        return $this->hasOne(Distrik::className(), ['id' => 'super_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistriks()
    {
        return $this->hasMany(Distrik::className(), ['super_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevelJemaat()
    {
        return $this->hasOne(LevelJemaat::className(), ['id' => 'level_jemaat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusJemaat()
    {
        return $this->hasOne(StatusJemaat::className(), ['id' => 'status_jemaat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatDetails()
    {
        return $this->hasMany(JemaatDetails::className(), ['jemaat_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return DistrikQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DistrikQuery(get_called_class());
    }
}
