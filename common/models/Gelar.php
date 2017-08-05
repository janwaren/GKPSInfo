<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gelar".
 *
 * @property integer $id
 * @property string $singkatan
 * @property string $nama
 * @property string $posisi
 *
 * @property KarirStudi[] $karirStudis
 */
class Gelar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gelar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['singkatan', 'nama', 'posisi'], 'required'],
            [['posisi'], 'string'],
            [['singkatan'], 'string', 'max' => 15],
            [['nama'], 'string', 'max' => 60],
            [['singkatan'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'singkatan' => 'Singkatan',
            'nama' => 'Nama',
            'posisi' => 'Posisi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirStudis()
    {
        return $this->hasMany(KarirStudi::className(), ['gelar_id' => 'id']);
    }
}
