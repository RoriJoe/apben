<?php

class LaporanController extends Controller {

    public $defaultAction = "realisasi";

    public function actionRealisasi() {
        $tgl_spp = "";
        $tgl_sp2d = "";
        $tgl_spm = "";
        if (@$_GET['tgl_awal'] != "" && @$_GET['tgl_akhir'] != "") {

            $tgl_awal = Format::date2sql(@$_GET['tgl_awal']);
            $tgl_akhir = Format::date2sql(@$_GET['tgl_akhir']);

            $tgl_spp = "&& a.tanggal_spp > '{$tgl_awal}' && a.tanggal_spp < '{$tgl_akhir}'";
            $tgl_sp2d = "&& a.tanggal_sp2d > '{$tgl_awal}' && a.tanggal_sp2d < '{$tgl_akhir}'";
            $tgl_spm = "&& a.tanggal_spm > '{$tgl_awal}' && a.tanggal_spm < '{$tgl_akhir}'";
        }

        $sql = "select @row := @row + 1 as row ,a.* from (select c.dipa_uid,c.kode_output, c.kode_suboutput,c.uid_suboutput, c.kode , c.sumber_dana, c.pagu, 
d.realisasi_spp,(d.realisasi_spp/c.pagu*100) as prosentase_spp,
f.realisasi_spm,(f.realisasi_spm/c.pagu*100) as prosentase_spm,
e.realisasi_sp2d,(e.realisasi_sp2d/c.pagu*100) as prosentase_sp2d
from 
(select b.dipa_uid,b.dipa_version,b.kode_output,b.kode_suboutput,b.uid_suboutput, a.kode , a.sumber_dana, a.pagu from mak a
INNER JOIN
(select b.dipa_uid,b.dipa_version,b.kode as kode_output, a.kode as kode_suboutput, a.uid as uid_suboutput from suboutput a INNER JOIN
( select a.dipa_uid,a.dipa_version, a.kode ,a.uid from output a, (select dipa_uid,dipa_version from output group by dipa_uid desc) b 
where a.dipa_uid = b.dipa_uid && a.dipa_version = b. dipa_version) b 
where a.output_uid = b.uid && a.dipa_version = b.dipa_version && a.dipa_uid = b.dipa_uid) b where a.suboutput_uid = b.uid_suboutput  && a.dipa_uid = b.dipa_uid && 
a.dipa_version = b.dipa_version) c
LEFT JOIN 
(select a.kode_output, a.kode_suboutput,a.kode_suboutput_uid, a.kode_mak, sum(jumlah_tagihan*kurs) as realisasi_spp, a.sumber_dana from tagihan a where a.kode_output is not null 
&& a.nomor_spp is not null {$tgl_spp} 
group by a.kode_output, a.kode_suboutput, a.kode_mak, a.sumber_dana) d
ON
c.kode_output = d.kode_output && c.kode_suboutput = d.kode_suboutput && c.kode =d.kode_mak && c.sumber_dana = d.sumber_dana && c.uid_suboutput = d.kode_suboutput_uid
LEFT JOIN 
(select a.kode_output, a.kode_suboutput,a.kode_suboutput_uid, a.kode_mak, sum(jumlah_tagihan*kurs) as realisasi_sp2d, a.sumber_dana from tagihan a where a.kode_output is not null 
&& a.nomor_sp2d is not null {$tgl_sp2d} 
group by a.kode_output, a.kode_suboutput, a.kode_mak, a.sumber_dana) e
ON
c.kode_output = e.kode_output && c.kode_suboutput = e.kode_suboutput && c.kode =e.kode_mak && c.sumber_dana = e.sumber_dana && c.uid_suboutput = e.kode_suboutput_uid
LEFT JOIN 
(select a.kode_output, a.kode_suboutput,a.kode_suboutput_uid, a.kode_mak, sum(jumlah_tagihan*kurs) as realisasi_spm, a.sumber_dana from tagihan a where a.kode_output is not null 
&& a.nomor_spm is not null {$tgl_spm}
group by a.kode_output, a.kode_suboutput, a.kode_mak, a.sumber_dana) f
ON
c.kode_output = f.kode_output && c.kode_suboutput = f.kode_suboutput && c.kode = f.kode_mak && c.sumber_dana = f.sumber_dana && c.uid_suboutput = f.kode_suboutput_uid

) a,(SELECT @row := 0) r";


        $rawData = Yii::app()->db->createCommand($sql)->queryAll();

        $dataProvider = new CArrayDataProvider($rawData, array(
            'keyField' => 'row',
            'pagination' => array(
                'pageSize' => 30,
            ),
        ));
        $this->render('realisasi', array(
            'dataProvider' => $dataProvider,
        ));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}