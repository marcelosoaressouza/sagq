<?php

/**
 * This is the model class for table "requirement".
 *
 * The followings are the available columns in table 'requirement':
 * @property string $id
 * @property string $desc
 * @property integer $status
 * @property timestamp $created
 * @property string $process_id
 *
 * The followings are the available model relations:
 * @property Process $process
 */
class Requirement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Requirement the static model class
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
		return 'requirement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('process_id', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('process_id', 'length', 'max'=>11),
			array('desc', 'safe'),
			array('status', 'safe'),
			array('created', 'safe'),
			array('process_id', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, desc, status, created, process_id', 'safe', 'on'=>'search'),
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
                    'attachments' => array(self::HAS_MANY, 'Attachment', 'requirement_id'),
                    'process' => array(self::BELONGS_TO, 'Process', 'process_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'         => 'ID',
			'desc'       => Yii::t('sagq', 'Description'),
			'status'     => Yii::t('sagq', 'Status'),
			'created'    => Yii::t('sagq', 'Created'),
			'process_id' => Yii::t('sagq', 'Process'),
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
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created',$this->created);
		$criteria->compare('process_id',$this->process_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}