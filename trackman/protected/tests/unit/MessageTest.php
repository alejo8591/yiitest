<?php
Yii::import('application.components.Controller');

class MessageTest extends CTestCase
{
	public function repeat($inputString)
	{
		return $inputString;
	}
	public function testRepeat()
	{
		$message = new MessageController('messageTest');
		$this->assertEquals($message->repeat('hello'), 'hello');
	}
}
?>