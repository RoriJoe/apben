<?php

/**
 * This is the model class for table "mak".
 *
 * The followings are the available columns in table 'mak':
 * @property string $id
 * @property string $dipa_id
 * @property integer $dipa_version
 * @property string $suboutput_uid
 * @property string $kode
 * @property string $sumber_dana
 * @property string $pagu
 * @property string $uid
 * @property integer $version
 * @property integer $trash
 *
 * The followings are the available model relations:
 * @property Dipa $dipa
 */
class Mak extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Mak the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'mak';
    }

    public function behaviors() {
        return array(
            'Revision' => array(
                'class' => 'application.components.RevisionBehavior',
            )
        );
    }

    public function getDetail() {
        if ($this->kode_uid != 0) {
            return MasterMak::model()->find(array('condition' => 'kode = ' . $this->kode . " and uid = " . $this->kode_uid));
        } else {
            return MasterMak::model()->find(array('condition' => 'kode = ' . $this->kode));
        }
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('dipa_id, dipa_version, suboutput_uid, kode, sumber_dana', 'required'),
            array('dipa_version, kode_uid, version, trash', 'numerical', 'integerOnly' => true),
            array('dipa_id, suboutput_uid, pagu, uid', 'length', 'max' => 20),
            array('kode, sumber_dana', 'length', 'max' => 25),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, dipa_id, dipa_version, suboutput_uid, kode, sumber_dana, pagu, uid, version, trash', 'safe', 'on' => 'search'),
        );
    }
    
    public function recalculate() {
        $ds = $this->detail_input;
        $pagu = 0;
        foreach ($ds as $d) {
            $pagu += $d->jumlah;
        }
        $this->saveAttributes(array('pagu' => $pagu));
    }
    

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'dipa' => array(self::BELONGS_TO, 'Dipa', 'dipa_id'),
            'detail_input' => array(self::HAS_MANY, 'DetailInput', array('mak_uid' => 'uid'), 'scopes' => array('lastRevisionScope')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'dipa_id' => 'Dipa',
            'dipa_version' => 'Dipa Version',
            'suboutput_uid' => 'Suboutput Uid',
            'kode' => 'Kode',
            'sumber_dana' => 'Sumber Dana',
            'pagu' => 'Pagu',
            'uid' => 'Uid',
            'version' => 'Version',
            'trash' => 'Trash',
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
        $criteria->compare('dipa_id', $this->dipa_id, true);
        $criteria->compare('dipa_version', $this->dipa_version);
        $criteria->compare('suboutput_uid', $this->suboutput_uid, true);
        $criteria->compare('kode', $this->kode, true);
        $criteria->compare('sumber_dana', $this->sumber_dana, true);
        $criteria->compare('pagu', $this->pagu, true);
        $criteria->compare('uid', $this->uid, true);
        $criteria->compare('version', $this->version);
        $criteria->compare('trash', $this->trash);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}