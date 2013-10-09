<?php
class ProjectTest extends CDbTestCase{
	public function testCRUD(){
		// CREATE a new Project
		$newProject = new Project;
		$newProjectName = "Test project 1";
		$newProject -> setAttributes(
			array(
				'name' => $newProjectName,
				'description' => 'this is a New project',
				'create_time' => '2013-08-11 00:00:00',
				'create_user_id' => 1,
				'update_time' => '2010-01-01 00:00:00',
                'update_user_id' => 1
			)
		);
		// first assertion
		$this->assertTrue($newProject->save(false));
		
		// READ for database
		$retreivedProject=Project::model()->findBypk($newProject->id);
		// Read Assertions
		$this->assertTrue($retreivedProject instanceof Project);
		$this->assertEquals($newProjectName, $retreivedProject->name);

		// UPDATE for database
		$updatedProjectName = "Update name for project 1";
		$newProject->name = $updatedProjectName;
		$this->assertTrue($newProject->save(false));
		// read data save in database
		$retreivedUpdateProject=Project::model()->findBypk($newProject->id);
		$this->assertTrue($retreivedUpdateProject instanceof Project);
		$this->assertEquals($updatedProjectName, $retreivedUpdateProject->name);

		// DELETE for database
		$newProjectId = $newProject->id;
		$this->assertTrue($newProject->delete());
		$deletedProject =Project::model()->findBypk($newProject->id);
		$this->assertEquals(NULL,$deletedProject);

	}
}