<?php
class ProjectTest extends CDbTestCase
{
	public $fixtures=array(
		'projects' => 'Project',
	);
	
	public function testCRUD()
	{
		// Create a new project
		$newProject = new Project;
		$newProjectName = 'Test Project 1';
		$newProject->setAttributes(
			array(
				'name' => $newProjectName,
				'description' => 'Test project for app',
				'create_time' => '2013-01-01 00:00:00',
				'create_user_id' => 1,
				'update_time' => '2013-09-30 00:00:00',
				'update_user_id' => 1,
			)
		);
		// assertion
		$this->assertTrue($newProject->save(false));

		//READ back the newly created project
		$retreiveProject = Project::model()->findByPk($newProject->id);
		$this->assertTrue($retreiveProject instanceof Project);
		$this->assertEquals($newProjectName, $retreiveProject->name);

		//DELETE the project
		$newProjectId = $newProject->id;
		$this->assertTrue($newProject->delete());
		$deletedProject=Project::model()->findByPk($newProjectId);
		$this->assertEquals(NULL,$deletedProject);
	}
}

?>