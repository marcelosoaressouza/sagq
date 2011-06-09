<?php

/**
 * This is the model class for table "attachment".
 *
 * The followings are the available columns in table 'attachment':
 * @property string $id
 * @property string $desc
 * @property string $file
 * @property string $created
 * @property string $updated
 * @property string $requirement_id
 *
 * The followings are the available model relations:
 * @property Requirement $requirement
 */
class Attachment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Attachment the static model class
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
		return 'attachment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created, requirement_id', 'required'),
			array('file', 'length', 'max'=>256),
			array('requirement_id', 'length', 'max'=>10),
			array('desc, updated', 'safe'),
			array('id, desc, file, created, updated, requirement_id', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'desc' => Yii::t('sagq', 'Description'),
			'file' => Yii::t('sagq', 'File'),
			'created' => Yii::t('sagq', 'Created'),
			'updated' => Yii::t('sagq', 'Updated'),
			'requirement_id' => Yii::t('sagq', 'Requirement'),
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
		$criteria->compare('file',$this->file,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('requirement_id',$this->requirement_id,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}