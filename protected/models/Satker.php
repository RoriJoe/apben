<?php

/**
 * This is the model class for table "satker".
 *
 * The followings are the available columns in table 'satker':
 * @property string $id
 * @property string $kode
 * @property string $satker
 * @property string $kegiatan
 * @property string $tanggal_dipa
 * @property string $nomor_dipa
 * @property integer $version
 */
class Satker extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Satker the static model class
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
		return 'satker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kode, satker, kegiatan, tanggal_dipa, nomor_dipa, version', 'required'),
			array('version', 'numerical', 'integerOnly'=>true),
			array('kode', 'length', 'max'=>25),
			array('satker, kegiatan', 'length', 'max'=>255),
			array('nomor_dipa', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kode, satker, kegiatan, tanggal_dipa, nomor_dipa, version', 'safe', 'on'=>'search'),
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
			'satker' => 'Satker',
			'kegiatan' => 'Kegiatan',
			'tanggal_dipa' => 'Tanggal Dipa',
			'nomor_dipa' => 'Nomor Dipa',
			'version' => 'Version',
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
		$criteria->compare('satker',$this->satker,true);
		$criteria->compare('kegiatan',$this->kegiatan,true);
		$criteria->compare('tanggal_dipa',$this->tanggal_dipa,true);
		$criteria->compare('nomor_dipa',$this->nomor_dipa,true);
		$criteria->compare('version',$this->version);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}