<?php

/**
 * This is the model class for table "process_requirement".
 *
 * The followings are the available columns in table 'process_requirement':
 * @property string $id
 * @property string $process_id
 * @property string $requirement_id
 *
 * The followings are the available model relations:
 * @property Requirement $requirement
 * @property Process $process
 */
class ProcessRequirement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ProcessRequirement the static model class
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
		return 'process_requirement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('process_id, requirement_id', 'required'),
			array('process_id, requirement_id', 'length', 'max'=>10),
			array('id, process_id, requirement_id', 'safe', 'on'=>'search'),
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
			'requirement' => array(self::BELONGS_TO, 'Requirement', 'requirement_id'),
			'process' => array(self::BELONGS_TO, 'Process', 'process_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'process_id' => 'Process',
			'requirement_id' => 'Requirement',
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
		$criteria->compare('process_id',$this->process_id,true);
		$criteria->compare('requirement_id',$this->requirement_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}