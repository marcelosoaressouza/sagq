<?php

/**
 * This is the model class for table "requirement".
 *
 * The followings are the available columns in table 'requirement':
 * @property int       $id
 * @property string    $desc
 * @property integer   $status
 * @property datetime  $created
 * @property timestamp $updated
 * @property int       $user_id
 *
 * The followings are the available model relations:
 * @property Process_Requirement $process
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
			array('status, created, updated', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('desc', 'safe'),
			array('status', 'safe'),
			array('created', 'safe'),
			array('updated', 'safe'),
			array('user_id', 'safe'),
			array('id, desc, status, created, updated, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
                    'attachments' => array(self::HAS_MANY  , 'Attachment', 'requirement_id'),
                    'author'      => array(self::BELONGS_TO , 'User'     , 'user_id'),
                    'processes'   => array(self::MANY_MANY,  'Process'   , 'process_requirement(requirement_id, process_id)'),                    
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
			'updated'    => Yii::t('sagq', 'Updated'),
                        'user_id'    => Yii::t('sagq', 'Author'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id'     ,$this->id,true);
		$criteria->compare('desc'   ,$this->desc,true);
		$criteria->compare('status' ,$this->status);
		$criteria->compare('created',$this->created);
		$criteria->compare('updated',$this->updated);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider(get_class($this), array('criteria'=>$criteria,));
	}
}