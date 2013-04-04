<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $nip
 * @property string $roles
 * @property string $password
 * @property string $nama
 * @property string $telepon
 */
class User extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    private static function fjt($nama) {
        return array(
            'name' => $nama,
            'value' => 'Format::currency($data->'.$nama.')'
        );
    }

    public static function itemAlias($type, $code = NULL) {
        $_items = array(
            "Roles" => array(
                "kpa" => "Kuasa Pengguna Anggaran (KPA)",
                "ppk" => "Pejabat Pembuat Komitmen (PPK)",
                "ptspm" => "Penandatangan SPM",
                "bp" => "Bendahara Pengeluaran",
                "bpp" => "Bendahara Pengeluaran Pembantu",
                "vrf" => "Verifikator",
                "psppm" => "Pembuat SPP dan SPM",
                "psptb" => "Pembuat SPTB",
                "ar" => "Pembuat Tagihan (AR)",
                "pta" => "Pengelola Teknis Anggaran (PTA)",
                "pst" => "Pejabat Struktural",
                "plpk" => "Penyusun LPK PHLN",
                "ksbp" => "KASUBBID Perencanaan Beasiswa",
                "admin" => "Administrator"
            ),
            "menu" => array(
                "kpa" => array('dipa' => 'view', 'realisasi' => 'view', 'laporan' => 'view'),
                "ppk" => array('dipa' => 'view', 'realisasi' => 'view', 'laporan' => 'view'),
                "ptspm" => array('dipa' => 'view', 'realisasi' => 'view', 'laporan' => 'view'),
                "bp" => array('dipa' => 'view', 'realisasi' => 'edit', 'laporan' => 'view'),
                "bpp" => array('dipa' => 'view', 'realisasi' => 'edit', 'laporan' => 'view'),
                "vrf" => array('dipa' => 'view', 'realisasi' => 'edit', 'laporan' => 'view'),
                "psppm" => array('dipa' => 'view', 'realisasi' => 'edit', 'laporan' => 'view'),
                "psptb" => array('dipa' => 'view', 'realisasi' => 'edit', 'laporan' => 'view'),
                "ar" => array('dipa' => 'view', 'realisasi' => 'edit', 'laporan' => 'view'),
                "pta" => array('dipa' => 'edit', 'master' => 'edit'),
                "pst" => array('dipa' => 'view', 'realisasi' => 'view', 'laporan' => 'view'),
                "plpk" => array('dipa' => 'view', 'realisasi' => 'view', 'laporan' => 'edit'),
                "ksbp" => array('dipa' => 'view', 'realisasi' => 'view', 'laporan' => 'view'),
                "admin" => array('user' => 'edit'),
            ),
            "realisasi_view" => array(
                "kpa" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline'),
                "ppk" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline'),
                "ptspm" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline'),
                "bp" => array('uraian_tagihan', 'pihak_penerima',  self::fjt('jumlah_tagihan'), 'mata_uang', 'tanggal_sp2d', 'tanggal_deadline'),
                "bpp" => array('uraian_tagihan', 'pihak_penerima',  self::fjt('jumlah_tagihan'), 'mata_uang', 'tanggal_sp2d', 'tanggal_deadline'),
                "vrf" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline'),
                "psppm" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline'),
                "psptb" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan'), 'mata_uang', 'tanggal_deadline', 'tanggal_sp2d'),
                "ar" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan'), 'mata_uang', 'jenis_kurs', 'tanggal_deadline', 'tanggal_sp2d'),
                "pta" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline'),
                "pst" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline'),
                "plpk" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline'),
                "ksbp" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline'),
                "admin" => array('uraian_tagihan', 'pihak_penerima', self::fjt('jumlah_tagihan_rupiah'), 'tanggal_sp2d', 'tanggal_deadline')
            ),
            "realisasi_hide" => array(
                "kpa" => array(),
                "ppk" => array(),
                "ptspm" => array(),
                "bp" => array(),
                "bpp" => array(),
                "vrf" => array('tanggal_trm_tagihan'),
                "psppm" => array('tanggal_trm_tagihan'),
                "psptb" => array(),
                "ar" => array(),
                "pta" => array(),
                "pst" => array(
                    'tanggal_trm_tagihan',
                    'tanggal_tagihan',
                    'kode_output',
                    'kode_suboutput',
                    'kode_mak',
                    'tanggal_sptb',
                    'nomor_sptb',
                    'tanggal_verifikasi',
                    'tanggal_ke_tu',
                    'jenis_tagihan',
                    'kode_lpk',
                    'mata_uang',
                    'kurs',
                    'jenis_kurs'
                ),
                "plpk" => array(),
                "ksbp" => array(),
                "admin" => array(),
            ),
            "ilang_ilangan" => array(
                'bp' => true,
                'bpp' => true,
                'vrf' => true,
                'psppm' => true,
                'psptb' => true
            ),
            "realisasi_edit" => array(
                "kpa" => array(),
                "ppk" => array(),
                "ptspm" => array(),
                "bp" => array(
                    'tanggal_sp2d',
                    'nomor_sp2d',
                ),
                "bpp" => array(
                    'tanggal_sp2d',
                    'nomor_sp2d',
                ),
                "vrf" => array('tanggal_verifikasi'),
                "psppm" => array(
                    'nomor_spp',
                    'tanggal_spp',
                    'nomor_spm',
                    'tanggal_spm',
                ),
                "psptb" => array(
                    'kode_output',
                    'kode_suboutput',
                    'kode_mak',
                    'tanggal_sptb',
                    'nomor_sptb',
                    'tanggal_ke_tu',
                    'jenis_tagihan',
                    'sumber_dana',
                    'kode_lpk',
                    'id_p_ppk',
                    'dasar_tagihan',
                    'jenis_penerima'
                ),
                "ar" => array(
                    'tanggal_trm_tagihan',
                    'tanggal_deadline',
                    'jumlah_tagihan',
                    'uraian_tagihan',
                    'tanggal_tagihan',
                    'pihak_penerima',
                    'ppn',
                    'pph_21',
                    'pph_22',
                    'pph_23',
                    'pph_25',
                    'mata_uang',
                    'kurs',
                    'jenis_kurs'
                ),
                "pta" => array(),
                "pst" => array(),
                "plpk" => array(),
                "ksbp" => array(),
                "admin" => array(),
            )
        );
        if (isset($code))
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        else
            return isset($_items[$type]) ? $_items[$type] : false;
    }

    public $role = "";
    public $roles_text = "";
    public $roles_count = 0;
    public $roles_arr = array();

    public function afterFind() {
        $this->roles_arr = explode(",", $this->roles);
        $this->role = $this->roles_arr[0];
        $rt = array();
        foreach ($this->roles_arr as $r) {
            if ($r != "") {
                $rt[] = User::itemAlias('Roles', $r);
                $this->roles_count++;
            }
        }
        $this->roles_text = implode(", ", $rt);

        return true;
    }

    public static function getListByRole($role) {
        $user = User::model()->findAll(array('condition'=>'roles like "%ppk%"'));
        $list = array();
        $list[] = "---";
        
        foreach ($user as $u) {
            $list[$u->id] = $u->nama . "({$u->nip})";
        }
        return $list;
        
    }
    
    public function getRoles_menu() {
        $menu = array();
        foreach ($this->roles_arr as $r) {
            if ($r != "") {
                $menu[] = array(
                    'label' => User::itemAlias('Roles', $r),
                    'url' => array('/user/changerole?role=' . $r),
                    'icon' => (Yii::app()->user->role == $r ? "ok" : "")
                );
            }
        }
        return $menu;
    }

    public function isMenuAllowed($menu) {

        if (Yii::app()->user->isGuest)
            return false;

        $setting = self::itemAlias('menu', Yii::app()->user->role);

        if (isset($setting[$menu])) {
            return true;
        } else {
            return false;
        }
    }

    public function menuMode($menu) {
        if (Yii::app()->user->isGuest)
            return false;

        $setting = self::itemAlias('menu', Yii::app()->user->role);
        if (isset($setting[$menu])) {
            return $setting[$menu];
        } else {
            return false;
        }
    }

    public function beforeValidate() {
        $this->roles = implode(",", $this->roles_arr);

        return true;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('nip, roles, password, nama', 'required'),
            array('nip, telepon', 'length', 'max' => 25),
            array('roles', 'length', 'max' => 40),
            array('nama', 'length', 'max' => 50),
            array('password', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, nip, roles, password, nama, telepon', 'safe', 'on' => 'search'),
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
            'nip' => 'Nomor Induk Pegawai (NIP)',
            'roles' => 'Roles',
            'roles_text' => 'Roles',
            'password' => 'Password',
            'nama' => 'Nama',
            'telepon' => 'Telepon',
        );
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
        $criteria->compare('nip', $this->nip, true);
        $criteria->compare('roles', $this->roles, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('telepon', $this->telepon, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}