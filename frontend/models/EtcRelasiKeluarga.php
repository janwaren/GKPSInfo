<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "etc_relasi_keluarga".
 *
 * @property integer $id
 * @property string $nama_relasi
 *
 * @property FullTimerKeluarga[] $fullTimerKeluargas
 */
class EtcRelasiKeluarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_relasi_keluarga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_relasi'], 'required'],
            [['nama_relasi'], 'string', 'max' => 30],
            [['nama_relasi'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_relasi' => 'Nama Relasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimerKeluargas()
    {
        return $this->hasMany(FullTimerKeluarga::className(), ['relasi_id' => 'id']);
    }
}
