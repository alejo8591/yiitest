<?php
abstract class TrackmanActiveRecord extends CActiveRecord
{
	/**
<<<<<<< HEAD
	 * Prepares create_time, create_user_id, update_time and update_user_id
	 */
}
=======
	 * Prepare create_time, create_user_id, update_time and update_user_id
	 * attributes before performing validation.
	 */
	protected function beforeValidate()
	{
		if($this->isNewRecord)
		{
			// set the create_time, last update, create_user_id and update_user_id
			$this->create_time=$this->update_time=new CDbExpression('NOW()');
			$this->create_user_id=$this->update_user_id=Yii::app()->user->id;
		}
		else
		{
			// not a new record, so
			$this->update_time=new CDbExpression('NOW()');
			$this->update_user_id=Yii::app()->user->id;
		}
	    return parent::beforeValidate();
	}

	/**
	 * Performs the AJAX validation.
	 * @param password for encryption in md5
	 */	
	protected function afterValidate()
	{
		parent::afterValidate();
		$this->password = $this->encrypt($this->password);
	}

	protected function encrypt($value){
		return md5 ($value);
	}
	
}
?>
>>>>>>> f7a52e989494ff77e0d15b87768c951c04189413
