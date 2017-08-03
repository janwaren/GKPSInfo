<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\SqlDataProvider;
use backend\models\FullTimerKarir;

/**
 * FullTimerKarirSearch represents the model behind the search form about `backend\models\FullTimerKarir`.
 */
class FullTimerKarirSearch extends FullTimerKarir
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['original_id', 'full_timer_id'], 'integer'],
            [['tahun_mulai', 'tahun_selesai', 'keterangan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {      
        $mySql = "
          SELECT full_timer_id, universitas_id as penempatan_id, CONCAT('FullTimerKuliah') as model, CONCAT('Akademis') as tipe, CONCAT('Studi ', etc_strata.nama) as posisi, etc_universitas.nama as penempatan, tahun_masuk as tahun_mulai, tahun_masuk as tahun_selesai, judul_thesis as keterangan
            FROM full_timer_kuliah
            INNER JOIN etc_universitas
            ON full_timer_kuliah.universitas_id = etc_universitas.id          
            INNER JOIN etc_strata
            ON full_timer_kuliah.strata_id = etc_strata.id
          WHERE full_timer_id = :full_timer_id         
          UNION
          SELECT full_timer_id, jemaat_id as penempatan_id, CONCAT('KarirJemaat') as model, CONCAT('Pelayanan Jemat') as tipe, karir_etc_jabatan.posisi, CONCAT(tblJemaat.level, ' ', tblJemaat.nama) as penempatan, tahun_mulai, tahun_selesai, karir_jemaat.keterangan 
          FROM karir_jemaat 
          INNER JOIN  ( SELECT jemaat.id, jemaat.nama, level_jemaat.nama as level 
                          FROM jemaat 
                          INNER JOIN level_jemaat ON jemaat.level_jemaat_id = level_jemaat.id
                      ) AS tblJemaat 
          ON karir_jemaat.jemaat_id = tblJemaat.id 
          INNER JOIN karir_etc_jabatan 
          ON karir_jemaat.jabatan_id = karir_etc_jabatan.id
        WHERE full_timer_id = :full_timer_id 
        UNION 
        SELECT full_timer_id, organisasi_kantor_pusat_id as penempatan_id, CONCAT('KarirKantorPusat') as model, CONCAT('Tugas Kantor Pusat') as tipe, karir_etc_jabatan.posisi, CONCAT(tblOrgKantorPusat.level, ' ', tblOrgKantorPusat.nama) as penempatan, tahun_mulai, tahun_selesai, karir_kantor_pusat.keterangan 
          FROM karir_kantor_pusat 
          INNER JOIN  ( SELECT organisasi_kantor_pusat.id, organisasi_kantor_pusat.nama, level_kantor_pusat.nama as level 
                        FROM organisasi_kantor_pusat 
                        INNER JOIN level_kantor_pusat ON organisasi_kantor_pusat.level_internal_id = level_kantor_pusat.id
                      ) as tblOrgKantorPusat
          ON karir_kantor_pusat.organisasi_kantor_pusat_id = tblOrgKantorPusat.id 
          INNER JOIN karir_etc_jabatan 
          ON karir_kantor_pusat.jabatan_id = karir_etc_jabatan.id 
        WHERE full_timer_id = :full_timer_id
        UNION
        SELECT full_timer_id, kepanitiaan_id as penempatan_id, CONCAT('KarirKepanitiaan') as model, CONCAT('Tugas Kepanitiaan') as tipe, karir_etc_jabatan.posisi, organisasi_kepanitiaan.nama as penempatan, tahun as tahun_mulai, tahun as tahun_selesai, karir_kepanitiaan.keterangan
          FROM karir_kepanitiaan
          INNER JOIN organisasi_kepanitiaan
          ON karir_kepanitiaan.kepanitiaan_id = organisasi_kepanitiaan.id
          INNER JOIN karir_etc_jabatan 
          ON karir_kepanitiaan.posisi_id = karir_etc_jabatan.id 
        WHERE full_timer_id = :full_timer_id 
        UNION
        SELECT full_timer_id, external_org_id as penempatan_id, CONCAT('KarirExternal') as model, CONCAT('Tugas Oikoumenis') as tipe, karir_etc_jabatan.posisi, organisasi_luar_gkps.nama as penempatan, tahun_mulai, tahun_selesai, karir_external.keterangan 
          FROM karir_external
          INNER JOIN organisasi_luar_gkps
          ON karir_external.external_org_id = organisasi_luar_gkps.id
          INNER JOIN karir_etc_jabatan 
          ON karir_external.jabatan_id = karir_etc_jabatan.id 
        WHERE full_timer_id = :full_timer_id 
        ORDER BY tahun_mulai DESC";

        $mySqlCount = "SELECT COUNT(*) FROM (
        SELECT full_timer_id, jemaat_id as penempatan_id, CONCAT('KarirJemaat') as model, karir_etc_jabatan.posisi, CONCAT(tblJemaat.level, ' ', tblJemaat.nama) as penempatan, tahun_mulai, tahun_selesai, karir_jemaat.keterangan 
          FROM karir_jemaat 
          INNER JOIN  ( SELECT jemaat.id, jemaat.nama, level_jemaat.nama as level 
                          FROM jemaat 
                          INNER JOIN level_jemaat ON jemaat.level_jemaat_id = level_jemaat.id
                      ) AS tblJemaat 
          ON karir_jemaat.jemaat_id = tblJemaat.id 
          INNER JOIN karir_etc_jabatan 
          ON karir_jemaat.jabatan_id = karir_etc_jabatan.id
        WHERE full_timer_id = :full_timer_id 
        UNION 
        SELECT full_timer_id, organisasi_kantor_pusat_id as penempatan_id, CONCAT('KarirKantorPusat') as model, karir_etc_jabatan.posisi, CONCAT(tblOrgKantorPusat.level, ' ', tblOrgKantorPusat.nama) as penempatan, tahun_mulai, tahun_selesai, karir_kantor_pusat.keterangan 
          FROM karir_kantor_pusat 
          INNER JOIN  ( SELECT organisasi_kantor_pusat.id, organisasi_kantor_pusat.nama, level_kantor_pusat.nama as level 
                        FROM organisasi_kantor_pusat 
                        INNER JOIN level_kantor_pusat ON organisasi_kantor_pusat.level_internal_id = level_kantor_pusat.id
                      ) as tblOrgKantorPusat
          ON karir_kantor_pusat.organisasi_kantor_pusat_id = tblOrgKantorPusat.id 
          INNER JOIN karir_etc_jabatan 
          ON karir_kantor_pusat.jabatan_id = karir_etc_jabatan.id 
        WHERE full_timer_id = :full_timer_id
        UNION
        SELECT full_timer_id, kepanitiaan_id as penempatan_id, CONCAT('KarirKepanitiaan') as model, karir_etc_jabatan.posisi, organisasi_kepanitiaan.nama as penempatan, tahun as tahun_mulai, tahun as tahun_selesai, karir_kepanitiaan.keterangan
          FROM karir_kepanitiaan
          INNER JOIN organisasi_kepanitiaan
          ON karir_kepanitiaan.kepanitiaan_id = organisasi_kepanitiaan.id
          INNER JOIN karir_etc_jabatan 
          ON karir_kepanitiaan.posisi_id = karir_etc_jabatan.id 
        WHERE full_timer_id = :full_timer_id 
        UNION
        SELECT full_timer_id, external_org_id as penempatan_id, CONCAT('KarirExternal') as model, karir_etc_jabatan.posisi, organisasi_luar_gkps.nama as penempatan, tahun_mulai, tahun_selesai, karir_external.keterangan 
          FROM karir_external
          INNER JOIN organisasi_luar_gkps
          ON karir_external.external_org_id = organisasi_luar_gkps.id
          INNER JOIN karir_etc_jabatan 
          ON karir_external.jabatan_id = karir_etc_jabatan.id 
        WHERE full_timer_id = :full_timer_id 
        UNION
        SELECT full_timer_id, universitas_id as penempatan_id, CONCAT('FullTimerKuliah') as model, CONCAT('Studi ', etc_strata.nama) as posisi, etc_universitas.nama as penempatan, tahun_masuk as tahun_mulai, tahun_masuk as tahun_selesai, judul_thesis as keterangan
          FROM full_timer_kuliah
          INNER JOIN etc_universitas
          ON full_timer_kuliah.universitas_id = etc_universitas.id          
          INNER JOIN etc_strata
          ON full_timer_kuliah.strata_id = etc_strata.id
        WHERE full_timer_id = :full_timer_id 
        ORDER BY tahun_mulai DESC) AS tblMain";

        $count = Yii::$app->db->createCommand($mySqlCount, [':full_timer_id' => $params['FullTimerKarirSearch']['full_timer_id']])->queryScalar();

        // add conditions that should always apply here

        $dataProvider = new SqlDataProvider([
            'sql' => $mySql,
            'params' => [':full_timer_id' => $params['FullTimerKarirSearch']['full_timer_id']],
            'totalCount' => $count,
        ]);

        return $dataProvider;
    }
}
