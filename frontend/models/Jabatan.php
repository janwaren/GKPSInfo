<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jabatan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $deskripsi
 *
 * @property FullTimer[] $fullTimers
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'deskripsi'], 'required'],
            [['nama'], 'string', 'max' => 30],
            [['deskripsi'], 'string', 'max' => 200],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFullTimers()
    {
        return $this->hasMany(FullTimer::className(), ['jabatan_id' => 'id']);
    }
}
