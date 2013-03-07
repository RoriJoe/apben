<?php

/**
 * This is the model class for table "master_output".
 *
 * The followings are the available columns in table 'master_output':
 * @property string $id
 * @property string $kode
 * @property string $uraian
 * @property string $uid
 * @property integer $version
 * @property integer $trash
 */
class MasterOutput extends ActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MasterOutput the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function getDropDownList() {
        $raw = self::model()->findAll();
        $dropdown = array();
        foreach ($raw as $k=>$r) {
            $dropdown[$r->kode] = "{$r->kode} - {$r->uraian}";
        }
        return $dropdown;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'master_output';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kode, uraian', 'required'),
            array('version, trash', 'numerical', 'integerOnly' => true),
            array('kode', 'length', 'max' => 25),
            array('uraian', 'length', 'max' => 255),
            array('uid', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, kode, uraian, uid, version, trash', 'safe', 'on' => 'search'),
        );
    }

    public function behaviors() {
        return array(
            'Revision' => array(
                'class' => 'application.components.RevisionBehavior',
            )
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
            'kode' => 'Kode',
            'uraian' => 'Uraian',
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
        $criteria->compare('kode', $this->kode, true);
        $criteria->compare('uraian', $this->uraian, true);
        $criteria->compare('uid', $this->uid, true);
        $criteria->compare('version', $this->version);
        $criteria->compare('trash', $this->trash);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}