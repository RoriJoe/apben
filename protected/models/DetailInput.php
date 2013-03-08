<?php

/**
 * This is the model class for table "detail_input".
 *
 * The followings are the available columns in table 'detail_input':
 * @property string $id
 * @property string $dipa_uid
 * @property integer $dipa_version
 * @property string $mak_uid
 * @property string $uraian
 * @property string $volume
 * @property string $satuan_volume
 * @property string $frequensi
 * @property string $satuan_frequensi
 * @property string $tarif
 * @property string $jumlah
 * @property string $uid
 * @property integer $version
 * @property integer $trash
 */
class DetailInput extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DetailInput the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'detail_input';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('dipa_uid, dipa_version, mak_uid, uraian, volume, satuan_volume, frequensi, satuan_frequensi, tarif', 'required'),
            array('dipa_version', 'numerical', 'integerOnly' => true),
            array('dipa_uid, mak_uid, volume, frequensi, tarif, jumlah', 'length', 'max' => 20),
            array('uraian', 'length', 'max' => 255),
            array('satuan_volume, satuan_frequensi', 'length', 'max' => 25),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, dipa_uid, dipa_version, mak_uid, uraian, volume, satuan_volume, frequensi, satuan_frequensi, tarif, jumlah', 'safe', 'on' => 'search'),
        );
    }

    public function beforeSave() {
        $this->jumlah = $this->volume * $this->frequensi * $this->tarif;

        return true;
    }
    
    public function afterSave() {
        parent::afterSave();
        if ($this->uid == 0) {
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
            'mak' => array(self::BELONGS_TO, 'Mak', array('mak_uid' => 'uid', 'dipa_version' => 'dipa_version', 'dipa_uid' => 'dipa_uid')),
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
            'mak_uid' => 'Mak Uid',
            'uraian' => 'Uraian',
            'volume' => 'Volume',
            'satuan_volume' => 'Satuan Volume',
            'frequensi' => 'Frequensi',
            'satuan_frequensi' => 'Satuan Frequensi',
            'tarif' => 'Tarif',
            'jumlah' => 'Jumlah',
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
        $criteria->compare('mak_uid', $this->mak_uid, true);
        $criteria->compare('uraian', $this->uraian, true);
        $criteria->compare('volume', $this->volume, true);
        $criteria->compare('satuan_volume', $this->satuan_volume, true);
        $criteria->compare('frequensi', $this->frequensi, true);
        $criteria->compare('satuan_frequensi', $this->satuan_frequensi, true);
        $criteria->compare('tarif', $this->tarif, true);
        $criteria->compare('jumlah', $this->jumlah, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}