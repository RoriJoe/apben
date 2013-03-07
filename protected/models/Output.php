<?php

/**
 * This is the model class for table "output".
 *
 * The followings are the available columns in table 'output':
 * @property string $id
 * @property string $dipa_id
 * @property string $dipa_version
 * @property string $kode
 * @property string $uid
 * @property integer $version
 * @property integer $trash
 */
class Output extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Output the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'output';
	}


    public function behaviors() {
        return array(
            'Revision' => array(
                'class' => 'application.components.RevisionBehavior',
            )
        );
    }
    
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dipa_id, dipa_version, kode', 'required'),
			array('version, trash', 'numerical', 'integerOnly'=>true),
			array('dipa_id, kode_uid,dipa_version, uid', 'length', 'max'=>20),
			array('kode', 'length', 'max'=>25),
            array('satuan_target','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dipa_id, dipa_version, kode, uid, version, trash', 'safe', 'on'=>'search'),
		);
	}

    public function getDetail() {
        if ($this->kode_uid != 0) {
            return MasterOutput::model()->find(array('condition' => 'kode = ' . $this->kode . " and uid = " . $this->kode_uid));
        } else {
            return MasterOutput::model()->find(array('condition' => 'kode = ' . $this->kode));
        }
    }
    
    public function recalculate() {
        $ds = $this->suboutput;
        $pagu = 0;
        foreach ($ds as $d) {
            $pagu += $d->pagu;
        }
        
        $this->saveAttributes(array('pagu' => $pagu));
    }
    
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'suboutput' => array(self::HAS_MANY, 'Suboutput', array('output_uid'=>'uid'),'scopes'=>array('lastRevisionScope')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dipa_id' => 'Dipa',
			'dipa_version' => 'Dipa Version',
			'kode' => 'Kode',
			'uid' => 'Uid',
			'version' => 'Version',
			'trash' => 'Trash',
            'satuan_target' => 'Satuan Target'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('dipa_id',$this->dipa_id,true);
		$criteria->compare('dipa_version',$this->dipa_version,true);
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('version',$this->version);
		$criteria->compare('trash',$this->trash);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}