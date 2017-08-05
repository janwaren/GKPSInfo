<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "etc_jenis_surat_tanah".
 *
 * @property integer $id
 * @property string $jenis_surat_tanah
 *
 * @property JemaatAsetSuratTanah[] $jemaatAsetSuratTanahs
 */
class EtcJenisSuratTanah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_jenis_surat_tanah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_surat_tanah'], 'required'],
            [['jenis_surat_tanah'], 'string', 'max' => 30],
            [['jenis_surat_tanah'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_surat_tanah' => 'Jenis Surat Tanah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJemaatAsetSuratTanahs()
    {
        return $this->hasMany(JemaatAsetSuratTanah::className(), ['jenis_surat_tanah_id' => 'id']);
    }
}
