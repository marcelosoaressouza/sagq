<?php

/**
 * This is the model class for table "process".
 *
 * The followings are the available columns in table 'process':
 * @property integer $id
 * @property string $title
 * @property string $desc
 * @property integer $status
 * @property datetime $created
 * @property timestamp $updated
 * @property integer $process_id
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Requirement[] $requirements
 * @property Process[] $processes
 */
class Process extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Process the static model class
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
		return 'process';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, desc, status, created, updated, user_id', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title', 'safe'),
			array('desc', 'safe'),
			array('status', 'safe'),
			array('created', 'safe'),
			array('updated', 'safe'),
			array('process_id', 'safe'),
			array('user_id', 'safe'),
			array('id, title, desc, status, created, updated, process_id, user_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'requirements' => array(self::HAS_MANY  , 'Requirement', 'process_id'),
			'processes'    => array(self::HAS_MANY  , 'Process'    , 'process_id'),
                        'author'       => array(self::BELONGS_TO, 'User'       , 'user_id')
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'         => 'ID',
			'title'      => Yii::t('sagq', 'Title'),
			'desc'       => Yii::t('sagq', 'Description'),
			'status'     => Yii::t('sagq', 'Status'),
			'created'    => Yii::t('sagq', 'Created'),
			'updated'    => Yii::t('sagq', 'Updated'),
			'process_id' => Yii::t('sagq', 'Process'),
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

		$criteria->compare('id'         ,$this->id   ,true);
		$criteria->compare('title'      ,$this->title,true);
		$criteria->compare('desc'       ,$this->desc ,true);
		$criteria->compare('status'     ,$this->status);
		$criteria->compare('created'    ,$this->created);
		$criteria->compare('updated'    ,$this->updated);
		$criteria->compare('process_id' ,$this->process_id);
		$criteria->compare('user_id'    ,$this->user_id);

		return new CActiveDataProvider(get_class($this), array('criteria'=>$criteria,));
	}

        /*
         * Get only Macro Process, process without process_id (null)
         * return CActiveDataProvider
         */
	public function searchMacroProcess()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id'     ,$this->id,true);
		$criteria->compare('title'  ,$this->title,true);
		$criteria->compare('desc'   ,$this->desc,true);
		$criteria->compare('status' ,$this->status);
		$criteria->compare('created',$this->status);
		$criteria->compare('updated',$this->status);
		$criteria->compare('user_id',$this->user_id);
                
		$criteria->condition = ' process_id IS NULL ';
                
                if(!isSet($_GET['Process_sort']) || isSet($_GET['Process_page']))
                {
                    $criteria->order = 't.created DESC';
                }
                
                $criteria->order = 'created ASC';

		return new CActiveDataProvider(get_class($this), array('criteria'=>$criteria,));
	}
}
