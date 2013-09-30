<?php
class DbTest extends CTestCase
   {
        public function testConnection()
        {
           $this->assertNotEquals('yopo', Yii::app()->db);
        }
}
?>