<?php

/**
 * This is the model class for table "mak".
 *
 * The followings are the available columns in table 'mak':
 * @property string $id
 * @property string $dipa_uid
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

    public function getDetail() {
        return MasterMak::model()->find(array('condition' => 'kode = ' . $this->kode));
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('dipa_uid, dipa_version, suboutput_uid, kode, sumber_dana', 'required'),
            array('dipa_version, kode_uid', 'numerical', 'integerOnly' => true),
            array('dipa_uid, suboutput_uid, pagu', 'length', 'max' => 20),
            array('kode, sumber_dana', 'length', 'max' => 25),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, dipa_uid, dipa_version, suboutput_uid, kode, sumber_dana, pagu', 'safe', 'on' => 'search'),
        );
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
            'dipa' => array(self::BELONGS_TO, 'Dipa', 'dipa_uid'),
            'detail_input' => array(self::HAS_MANY, 'DetailInput', array('mak_uid' => 'uid')),
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
            'suboutput_uid' => 'Suboutput Uid',
            'kode' => 'Kode',
            'sumber_dana' => 'Sumber Dana',
            'pagu' => 'Pagu',
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
        $criteria->compare('suboutput_uid', $this->suboutput_uid, true);
        $criteria->compare('kode', $this->kode, true);
        $criteria->compare('sumber_dana', $this->sumber_dana, true);
        $criteria->compare('pagu', $this->pagu, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}