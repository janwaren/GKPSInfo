<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "strata".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property FullTimer[] $fullTimers
 * @property KarirStudi[] $karirStudis
 */
class Strata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'strata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 20],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimers()
    {
        return $this->hasMany(FullTimer::className(), ['strata_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKarirStudis()
    {
        return $this->hasMany(KarirStudi::className(), ['strata_id' => 'id']);
    }
}
