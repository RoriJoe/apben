<?php

/**
 * This is the model class for table "suboutput".
 *
 * The followings are the available columns in table 'suboutput':
 * @property string $id
 * @property string $dipa_uid
 * @property integer $dipa_version
 * @property string $output_uid
 * @property string $kode
 * @property string $uid
 * @property integer $version
 * @property integer $trash
 */
class Suboutput extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Suboutput the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'suboutput';
    }

    public static function getDropDownList($output) {
        $sql = "select kode_suboutput as kode, uid_suboutput as uid, uraian from ((select b.dipa_uid,b.dipa_version,b.kode_output,b.kode_suboutput,c.uraian, b.uid_suboutput,b.kode_uid,  a.kode , a.sumber_dana, a.pagu from master_suboutput c, mak a
INNER JOIN
(select b.dipa_uid,b.dipa_version,b.kode as kode_output, a.kode as kode_suboutput, a.uid as uid_suboutput, a.kode_uid as kode_uid from suboutput a INNER JOIN
( select a.dipa_uid,a.dipa_version, a.kode ,a.uid from output a, (select dipa_uid,dipa_version from output group by dipa_uid desc) b 
where a.dipa_uid = b.dipa_uid && a.dipa_version = b. dipa_version) b 
where a.output_uid = b.uid && a.dipa_version = b.dipa_version && a.dipa_uid = b.dipa_uid) b where a.suboutput_uid = b.uid_suboutput  && a.dipa_uid = b.dipa_uid && 
a.dipa_version = b.dipa_version && c.uid = b.kode_uid group by kode_output, kode_suboutput)) a where kode_output = '{$output}'";
        $rawData = Yii::app()->db->createCommand($sql)->queryAll();
        $dropdown = array();
        foreach ($rawData as $k => $r) {
            $dropdown[$r['uid'] . "-" . $r['kode']] = "{$r['kode']} - {$r['uraian']}";
        }
        return $dropdown;
    }
    
    public function getDetail() {
        return MasterSuboutput::model()->find(array('condition' => 'kode = ' . $this->kode . ' and uid = ' . $this->kode_uid));
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('dipa_uid, dipa_version, output_uid, kode', 'required'),
            array('dipa_version, kode_uid', 'numerical', 'integerOnly' => true),
            array('dipa_uid, output_uid', 'length', 'max' => 20),
            array('kode', 'length', 'max' => 25),
            array('target', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, dipa_uid, dipa_version, output_uid, kode', 'safe', 'on' => 'search'),
        );
    }

    public function afterSave() {
        parent::afterSave();
        if ($this->uid == 0) {
            $a = self::model()->findByPk($this->id);
            $a->saveAttributes(array('uid'=>$this->id));
            $this->uid = $this->id;
        }
        
        return true;
    }
    
    public function afterFind() {

        if ($this->uid == 0) {
            $this->saveAttributes(array(
                'uid' => $this->id
            ));
        }

        return true;
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'mak' => array(self::HAS_MANY, 'Mak', array('suboutput_uid' => 'uid', 'dipa_version' => 'dipa_version', 'dipa_uid' => 'dipa_uid')),
            'output' => array(self::BELONGS_TO, 'Output', array('output_uid' => 'uid', 'dipa_version' => 'dipa_version', 'dipa_uid' => 'dipa_uid')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'dipa_uid' => 'Dipa',
            'dipa_version' => 'Dipa Version',
            'output_uid' => 'Output Uid',
            'kode' => 'Kode',
            'uid' => 'Uid',
            'version' => 'Version',
            'trash' => 'Trash',
            'target' => 'Target',
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
        $criteria->compare('dipa_uid', $this->dipa_uid, true);
        $criteria->compare('dipa_version', $this->dipa_version);
        $criteria->compare('output_uid', $this->output_uid, true);
        $criteria->compare('kode', $this->kode, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}