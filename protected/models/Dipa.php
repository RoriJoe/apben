<?php

/**
 * This is the model class for table "dipa".
 *
 * The followings are the available columns in table 'dipa':
 * @property string $id
 * @property integer $tahun_anggaran
 * @property string $satker
 * @property string $kegiatan
 * @property string $tanggal_dipa
 * @property string $nomor_dipa
 * @property integer $version
 */
class Dipa extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Dipa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'dipa';
    }
    
    public function afterFind() {
        if ($this->uid == 0) {
            $this->saveAttributes(array(
                'uid' => $this->id
            ));
        }
        
        return true;
    }
    
    public function defaultScope() {
        parent::defaultScope();
        return array(
            'condition' => 'version=(SELECT MAX(version) FROM dipa i where i.uid = t.uid)',
            'order' => 'uid'
        );
    }

    public function saveRev() {
        $this->calculate();
        
        
        $new = new Dipa;
        $new->attributes = $this->attributes;
        $new->version += 1;
        $new->save();
        
        $sql = "CREATE TEMPORARY TABLE tmp SELECT * from [table] where dipa_uid = {$this->uid} and dipa_version = {$this->version};
UPDATE tmp SET dipa_version = [version];
ALTER TABLE tmp drop ID; 
INSERT INTO [table] SELECT 0,tmp.* FROM tmp;
DROP TABLE tmp;";

        $db = Yii::app()->db;
        $detail_input = str_replace(array('[table]', '[version]'), array('detail_input', $new->version), $sql);
        $db->createCommand($detail_input)->execute();

        $mak = str_replace(array('[table]', '[version]'), array('mak', $new->version), $sql);
        $db->createCommand($mak)->execute();

        $suboutput = str_replace(array('[table]', '[version]'), array('suboutput', $new->version), $sql);
        $db->createCommand($suboutput)->execute();

        $output = str_replace(array('[table]', '[version]'), array('output', $new->version), $sql);
        $db->createCommand($output)->execute();
    }

    public function calculate() {
        $sql = "update detail_input set jumlah = volume * frequensi * tarif;
update mak set pagu = (select sum(jumlah) from detail_input where mak_uid = mak.uid and dipa_version = [dipa_version] and dipa_uid = [dipa_uid] group by mak_uid);
update suboutput set pagu = (select sum(pagu) from mak where suboutput_uid = suboutput.uid and dipa_version = [dipa_version] and dipa_uid = [dipa_uid] group by suboutput_uid);
update output set pagu = (select sum(pagu) from suboutput where output_uid = output.uid and dipa_version = [dipa_version] and dipa_uid = [dipa_uid] group by output_uid);
update dipa set pagu = (select sum(pagu) from mak where dipa_uid = dipa.id and dipa_version = [dipa_version] group by dipa_uid);";
        
        $sql = str_replace(array('[dipa_version]','[dipa_uid]'),array($this->version,$this->id),$sql);
        $db = Yii::app()->db;
        $db->createCommand($sql)->execute();
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tahun_anggaran, satker, kegiatan, tanggal_dipa, nomor_dipa, kode_kegiatan', 'required'),
            array('tahun_anggaran, version', 'numerical', 'integerOnly' => true),
            array('satker, kegiatan', 'length', 'max' => 255),
            array('nomor_dipa', 'length', 'max' => 30),
            array('uid','safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, tahun_anggaran, satker, kegiatan, tanggal_dipa, nomor_dipa, version',
                'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'output' => array(self::HAS_MANY, 'Output', array('dipa_uid' => 'uid')),
            'suboutput' => array(self::HAS_MANY, 'Suboutput', array('dipa_uid' => 'uid')),
            'mak' => array(self::HAS_MANY, 'Mak', array('dipa_uid' => 'uid')),
            'detail_input' => array(self::HAS_MANY, 'DetailInput', array('dipa_uid' => 'uid')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tahun_anggaran' => 'Thn Anggaran',
            'satker' => 'Satuan Kerja (SATKER)',
            'kegiatan' => 'Kegiatan',
            'tanggal_dipa' => 'Tanggal Dipa',
            'nomor_dipa' => 'Nomor Dipa',
            'version' => 'Rev.',
            'kode_kegiatan' => 'Kode Kegiatan'
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
        $criteria->compare('tahun_anggaran', $this->tahun_anggaran);
        $criteria->compare('satker', $this->satker, true);
        $criteria->compare('kegiatan', $this->kegiatan, true);
        $criteria->compare('tanggal_dipa', $this->tanggal_dipa, true);
        $criteria->compare('nomor_dipa', $this->nomor_dipa, true);
        $criteria->compare('version', $this->version);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}