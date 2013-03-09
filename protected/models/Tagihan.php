<?php

/**
 * This is the model class for table "tagihan".
 *
 * The followings are the available columns in table 'tagihan':
 * @property string $id
 * @property string $kode_ouput
 * @property string $kode_subouput
 * @property string $kode_mak
 * @property string $id_p_ar
 * @property string $tanggal_ar
 * @property string $id_p_sptb
 * @property string $tanggal_sptb
 * @property string $nomor_sptb
 * @property string $kode_lpk
 * @property string $nomor_spp
 * @property string $tanggal_spp
 * @property string $tanggal_verifikasi
 * @property string $tanggal_ke_tu
 * @property string $id_p_spm
 * @property string $tanggal_spm
 * @property string $tanggal_kirim
 * @property string $id_p_sp2d
 * @property string $tanggal_sp2d
 * @property string $nomor_sp2d
 * @property string $jenis_tagihan
 * @property string $tanggal_tagihan
 * @property string $uraian_tagihan
 * @property string $pihak_penerima
 * @property string $sumber_dana
 * @property string $mata_uang
 * @property string $jumlah_tagihan
 * @property string $ppn
 * @property string $pph_21
 * @property string $pph_22
 * @property string $pph_23
 * @property string $pph_25
 * @property string $kurs
 * @property string $jenis_kurs
 */
class Tagihan extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Tagihan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function itemAlias($type, $code = NULL) {
        $_items = array(
            'KodeLPK' => array(
                "S2LNWB" => "S2 Luar Negeri - World Bank",
                "S3LNWB" => "S3 Luar Negeri - World Bank",
                "S2LKWB" => "S2 Linkage - World Bank",
                "S2LNJICA" => "S2 Luar Negeri - JICA",
                "S3LNJICA" => "S3 Luar Negeri - JICA",
                "S2LKJICA" => "S2 Linkage - JICA",
                "S3LKJICA" => "S3 Linkage - JICA",
                "S2DNJICA" => "S2 Dalam Negeri - JICA",
                "PREDEP" => "Pre Departure Training (PREDEP)",
                "NDO" => "Non Degree Overseas (NDO)",
                "NDD" => "Non Degree Domestik (NDD)" 
            ),
            "JenisTagihan" => array(
                "UP" => "Uang Persediaan (UP)",
                "LS" => "Langsung (LS)",
                "TUP" => "Tambahan Uang Persediaan (TUP)",
                "GUP" => "Ganti Uang Persediaan (GUP)"
            ),
            "SumberDana" => array(
                "WB" => "WorldBank",
                "JICA" => "JICA",
                "RM" => "Rupiah Murni (RM)",
                "RMP" => "Rupiah Murni Pendamping (RMP)"
            ),
            "MataUang" => array(
                "IDR" => "IDR",
                "USD" => "USD",
                "AUD" => "AUD",
                "JPY" => "JPY",
                "GBP" => "GBP",
                "CAD" => "CAD",
                "EUR" => "EUR",
                "HKD" => "HKD",
                "SGD" => "SGD",
            ),
            "JenisKurs" => array(
                "Asumsi" => "Asumsi",
                "Fix" => "Fix"
            )
        );
        if (isset($code))
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        else
            return isset($_items[$type]) ? $_items[$type] : false;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tagihan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kode_ouput, kode_subouput, kode_mak, id_p_ar, tanggal_ar, id_p_sptb, nomor_sptb, kode_lpk, nomor_spp, id_p_spm, id_p_sp2d, nomor_sp2d, jenis_tagihan, uraian_tagihan, pihak_penerima, sumber_dana, mata_uang, jumlah_tagihan, ppn,  kurs, jenis_kurs', 'required'),
            array('kode_ouput, kode_subouput, kode_mak, sumber_dana, mata_uang, jenis_kurs', 'length', 'max' => 25),
            array('id_p_ar, id_p_sptb, nomor_sptb, kode_lpk, nomor_spp, id_p_spm, id_p_sp2d, nomor_sp2d, jumlah_tagihan, ppn, pph_21, pph_22, pph_23, kurs', 'length', 'max' => 20),
            array('jenis_tagihan', 'length', 'max' => 10),
            array('uraian_tagihan, pihak_penerima', 'length', 'max' => 255),
            array('tanggal_sptb, tanggal_spp, tanggal_verifikasi, tanggal_ke_tu, tanggal_spm, tanggal_kirim, tanggal_sp2d, tanggal_tagihan,pph_21, pph_22, pph_23, pph_25, tanggal_trm_tagihan', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, kode_ouput, kode_subouput, kode_mak, id_p_ar, tanggal_ar, id_p_sptb, tanggal_sptb, nomor_sptb, kode_lpk, nomor_spp, tanggal_spp, tanggal_verifikasi, tanggal_ke_tu, id_p_spm, tanggal_spm, tanggal_kirim, id_p_sp2d, tanggal_sp2d, nomor_sp2d, jenis_tagihan, tanggal_tagihan, uraian_tagihan, pihak_penerima, sumber_dana, mata_uang, jumlah_tagihan, ppn, pph_21, pph_22, pph_23, kurs, jenis_kurs', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'kode_ouput' => 'Kode Ouput',
            'kode_subouput' => 'Kode Subouput',
            'kode_mak' => 'Kode Mak',
            'id_p_ar' => 'Pembuat Tagihan',
            'tanggal_ar' => 'Tanggal Submit Tagihan',
            'id_p_sptb' => 'Pembuat SPTB',
            'tanggal_sptb' => 'Tanggal Submit SPTB',
            'nomor_sptb' => 'Nomor SPTB',
            'kode_lpk' => 'Kode LPK',
            'nomor_spp' => 'Nomor SPP',
            'tanggal_spp' => 'Tanggal SPP',
            'tanggal_verifikasi' => 'Tanggal Verifikasi',
            'tanggal_ke_tu' => 'Tanggal Ke TU',
            'id_p_spm' => 'Pembuat SPM',
            'tanggal_spm' => 'Tanggal Submit SPM',
            'tanggal_kirim' => 'Tanggal Kirim Dokumen',
            'id_p_sp2d' => 'Pembuat SP2D',
            'tanggal_sp2d' => 'Tanggal Submit SP2D',
            'nomor_sp2d' => 'Nomor SP2D',
            'jenis_tagihan' => 'Jenis Tagihan',
            'tanggal_tagihan' => 'Tanggal Tagihan',
            'tanggal_trm_tagihan' => 'Tanggal Terima Tagihan',
            'uraian_tagihan' => 'Uraian Tagihan',
            'pihak_penerima' => 'Pihak Penerima',
            'sumber_dana' => 'Sumber Dana',
            'mata_uang' => 'Mata Uang',
            'jumlah_tagihan' => 'Jumlah Tagihan',
            'ppn' => 'PPN',
            'pph_21' => 'PPH 21',
            'pph_22' => 'PPH 22',
            'pph_23' => 'PPH 23',
            'pph_25' => 'PPH 25',
            'kurs' => 'Kurs',
            'jenis_kurs' => 'Jenis Kurs',
        );
    }

    public function beforeSave() {
        $this->tanggal_ar = Format::date2sql($this->tanggal_ar);
        $this->tanggal_ke_tu = Format::date2sql($this->tanggal_ke_tu);
        $this->tanggal_kirim = Format::date2sql($this->tanggal_kirim);
        $this->tanggal_sp2d = Format::date2sql($this->tanggal_sp2d);
        $this->tanggal_spm = Format::date2sql($this->tanggal_spm);
        $this->tanggal_spp = Format::date2sql($this->tanggal_spp);
        $this->tanggal_sptb = Format::date2sql($this->tanggal_sptb);
        $this->tanggal_tagihan = Format::date2sql($this->tanggal_tagihan);
        $this->tanggal_trm_tagihan = Format::date2sql($this->tanggal_trm_tagihan);
        $this->tanggal_verifikasi = Format::date2sql($this->tanggal_verifikasi);
        
        return true;
    }
    
    public function afterFind() {
        $this->tanggal_ar = Format::date($this->tanggal_ar);
        $this->tanggal_ke_tu = Format::date($this->tanggal_ke_tu);
        $this->tanggal_kirim = Format::date($this->tanggal_kirim);
        $this->tanggal_sp2d = Format::date($this->tanggal_sp2d);
        $this->tanggal_spm = Format::date($this->tanggal_spm);
        $this->tanggal_spp = Format::date($this->tanggal_spp);
        $this->tanggal_sptb = Format::date($this->tanggal_sptb);
        $this->tanggal_tagihan = Format::date($this->tanggal_tagihan);
        $this->tanggal_trm_tagihan = Format::date($this->tanggal_trm_tagihan);
        $this->tanggal_verifikasi = Format::date($this->tanggal_verifikasi);
        
        return true;
    }
    
    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('kode_ouput', $this->kode_ouput, true);
        $criteria->compare('kode_subouput', $this->kode_subouput, true);
        $criteria->compare('kode_mak', $this->kode_mak, true);
        $criteria->compare('id_p_ar', $this->id_p_ar, true);
        $criteria->compare('tanggal_ar', $this->tanggal_ar, true);
        $criteria->compare('id_p_sptb', $this->id_p_sptb, true);
        $criteria->compare('tanggal_sptb', $this->tanggal_sptb, true);
        $criteria->compare('nomor_sptb', $this->nomor_sptb, true);
        $criteria->compare('kode_lpk', $this->kode_lpk, true);
        $criteria->compare('nomor_spp', $this->nomor_spp, true);
        $criteria->compare('tanggal_spp', $this->tanggal_spp, true);
        $criteria->compare('tanggal_verifikasi', $this->tanggal_verifikasi, true);
        $criteria->compare('tanggal_ke_tu', $this->tanggal_ke_tu, true);
        $criteria->compare('id_p_spm', $this->id_p_spm, true);
        $criteria->compare('tanggal_spm', $this->tanggal_spm, true);
        $criteria->compare('tanggal_kirim', $this->tanggal_kirim, true);
        $criteria->compare('id_p_sp2d', $this->id_p_sp2d, true);
        $criteria->compare('tanggal_sp2d', $this->tanggal_sp2d, true);
        $criteria->compare('nomor_sp2d', $this->nomor_sp2d, true);
        $criteria->compare('jenis_tagihan', $this->jenis_tagihan, true);
        $criteria->compare('tanggal_tagihan', $this->tanggal_tagihan, true);
        $criteria->compare('tanggal_trm_tagihan', $this->tanggal_trm_tagihan, true);
        $criteria->compare('uraian_tagihan', $this->uraian_tagihan, true);
        $criteria->compare('pihak_penerima', $this->pihak_penerima, true);
        $criteria->compare('sumber_dana', $this->sumber_dana, true);
        $criteria->compare('mata_uang', $this->mata_uang, true);
        $criteria->compare('jumlah_tagihan', $this->jumlah_tagihan, true);
        $criteria->compare('ppn', $this->ppn, true);
        $criteria->compare('pph_21', $this->pph_21, true);
        $criteria->compare('pph_22', $this->pph_22, true);
        $criteria->compare('pph_23', $this->pph_23, true);
        $criteria->compare('kurs', $this->kurs, true);
        $criteria->compare('jenis_kurs', $this->jenis_kurs, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}