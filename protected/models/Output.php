<?php

/**
 * This is the model class for table "output".
 *
 * The followings are the available columns in table 'output':
 * @property string $id
 * @property string $dipa_uid
 * @property string $dipa_version
 * @property string $kode
 * @property string $uid
 * @property integer $version
 * @property integer $trash
 */
class Output extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Output the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'output';
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
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('dipa_uid, dipa_version, kode', 'required'),
            array('dipa_uid, kode_uid,dipa_version', 'length', 'max' => 20),
            array('kode', 'length', 'max' => 25),
            array('satuan_target', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, dipa_uid, dipa_version, kode', 'safe', 'on' => 'search'),
        );
    }

    public function getDetail() {
        return MasterOutput::model()->find(array('condition' => 'kode = ' . $this->kode));
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'suboutput' => array(self::HAS_MANY, 'Suboutput', array('output_uid' => 'uid')),
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
            'kode' => 'Kode',
            'satuan_target' => 'Satuan Target'
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
        $criteria->compare('dipa_version', $this->dipa_version, true);
        $criteria->compare('kode', $this->kode, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}