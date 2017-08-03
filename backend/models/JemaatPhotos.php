<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jemaat_photos".
 *
 * @property integer $id
 * @property integer $jemaat_id
 * @property string $href
 * @property string $title
 * @property string $type
 * @property string $thumbnail
 *
 * @property Jemaat $jemaat
 */
class JemaatPhotos extends \yii\db\ActiveRecord
{

    public $photoFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jemaat_photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jemaat_id', 'href', 'title', 'type', 'thumbnail'], 'required'],
            [['jemaat_id'], 'integer'],
            [['href', 'thumbnail'], 'string', 'max' => 255],
            [['photoFile'], 'file'],            
            [['title'], 'string', 'max' => 100],
            [['type'], 'string', 'max' => 20],
            [['jemaat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jemaat::className(), 'targetAttribute' => ['jemaat_id' => 'id']],
        ];
    }

    public function behaviors(){
        return [
            'history' => [
                'class' => \nhkey\arh\ActiveRecordHistoryBehavior::className(),
                'managerOptions' => [
                    'modelLabel' => 'Foto',
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
            'href' => 'Href',
            'title' => 'Title',
            'type' => 'Type',
            'thumbnail' => 'Thumbnail',
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
        return $this->title . ' ' . $this->jemaat->namaFull;
    }     
}
