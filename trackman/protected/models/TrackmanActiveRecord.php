<?php
abstract class TrackmanActiveRecord extends CActiveRecord
{ 
     /*
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
}
?>
