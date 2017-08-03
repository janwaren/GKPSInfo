<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "etc_strata".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property FullTimerKuliah[] $fullTimerKuliahs
 */
class EtcStrata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'etc_strata';
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
    public function getFullTimerKuliahs()
    {
        return $this->hasMany(FullTimerKuliah::className(), ['strata_id' => 'id']);
    }
}
