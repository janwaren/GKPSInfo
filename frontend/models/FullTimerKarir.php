<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "full_timer".
 *
 * @property integer $full_timer_id
 */

class FullTimerKarir extends \yii\db\ActiveRecord
{
	public $full_timer_id;
	public $penempatan_id;
	public $model;
	public $tipe;
	public $posisi;
	public $penempatan;
	public $tahun_mulai;
	public $tahun_selesai;
	public $keterangan;

    public function rules()
    {
        return [
            [['full_timer_id', 'penempatan_id'], 'required'],
            [['full_timer_id', 'penempatan_id'], 'integer'],
            [['tipe', 'tahun_mulai', 'tahun_selesai', 'keterangan', 'model', 'posisi', 'penempatan'], 'safe'],
            [['tipe', 'model', 'posisi', 'penempatan','keterangan'], 'string'],
        ];
    }	

	public function attributeLabels() 
	{
		return [
			'full_timer_id' => 'Full Timer ID',
			'penempatan_id' => 'Penempatan ID',
			'model' => 'Model',
			'tipe' => 'Tipe',
			'posisi' => 'Posisi',
			'penempatan' => 'Penempatan',
			'tahun_mulai' => 'Tahun Mulai',
			'tahun_selesai' => 'Tahun Selesai',
			'keterangan' => 'Keterangan',
		];

	}

}

?>