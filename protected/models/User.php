<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $profile
 *
 * The followings are the available model relations:
 * @property Process[] $processes
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('username, password, profile', 'required'),
			array('username, password', 'length', 'max'=>32),
			array('profile', 'length', 'max'=>16),
                    
			array('username', 'safe'),
			array('password', 'safe'),
			array('profile' , 'safe'),
                    
			array('id, username, password, profile', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array('processes' => array(self::HAS_MANY, 'Process', 'user_id'));
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'       => 'ID',
			'username' => Yii::t('sagq', 'Username'),
			'password' => Yii::t('sagq', 'Password'),
			'profile'  => Yii::t('sagq', 'Profile'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('profile',$this->profile,true);

		return new CActiveDataProvider(get_class($this), array('criteria'=>$criteria));
	}
}