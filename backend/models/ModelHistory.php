<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "modelhistory".
 *
 * @property string $id
 * @property string $date
 * @property string $table
 * @property string $model_name
 * @property string $model_label
 * @property string $field_name
 * @property string $field_id
 * @property string $field_label
 * @property string $old_value
 * @property string $new_value
 * @property integer $type
 * @property string $user_id
 */
class ModelHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'modelhistory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'table', 'model_name', 'model_label', 'field_name', 'field_id', 'field_label', 'type', 'user_id'], 'required'],
            [['date'], 'safe'],
            [['old_value', 'new_value'], 'string'],
            [['type'], 'integer'],
            [['table', 'model_name', 'field_name', 'field_id', 'user_id'], 'string', 'max' => 255],
            [['model_label'], 'string', 'max' => 40],
            [['field_label'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'table' => 'Table',
            'model_name' => 'Model Name',
            'model_label' => 'Model Label',
            'field_name' => 'Field Name',
            'field_id' => 'Field ID',
            'field_label' => 'Field Label',
            'old_value' => 'Old Value',
            'new_value' => 'New Value',
            'type' => 'Type',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getFieldCaption()
    {
        $class = $this->model_name;
        $fieldObject = ($class::findOne($this->field_id));
        return isset($fieldObject) ? $fieldObject->getNamaFull() : 'Record #' . $this->field_id . ' sudah dihapus';
    }    
}
