<?php

/**
 * This is the model class for table "master_mak".
 *
 * The followings are the available columns in table 'master_mak':
 * @property string $id
 * @property string $kode
 * @property string $uraian
 * @property integer $uid
 * @property integer $version
 * @property integer $trash
 */
class MasterMak extends ActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MasterMak the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public static function getDropDownList() {
        $raw = self::model()->findAll();
        $dropdown = array();
        foreach ($raw as $k=>$r) {
            $dropdown[$r->id . "-" . $r->kode] = "{$r->kode} - {$r->uraian}";
        }
        return $dropdown;
    }
    

    public static function sumberDanaList() {
        return array(
            "JC" => "JC",
            "WB" => "WB",
            "RM" => "RM",
            "RMP" => "RMP"
        );
    }
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'master_mak';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode, uraian', 'required'),
			array('kode', 'length', 'max'=>25),
			array('uraian', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode, uraian', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'kode' => 'Kode',
			'uraian' => 'Uraian',
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
		$criteria->compare('kode',$this->kode,true);
		$criteria->compare('uraian',$this->uraian,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}