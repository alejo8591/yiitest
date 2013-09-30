<?php
class ProjectTest extends CDbTestCase
{
	public $fixtures=array(
		'projects' => 'Project',
	);

	public function testCreate()
	{
		// CREATE a new project
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

	}

	public function testRead()
	{
		$retreivedProject= $this->projects('project1');
		$this->assertTrue($retreivedProject instanceof Project);
		$this->assertEquals('Test Project 1', $retreivedProject->name);
	}

	public function testUpdate()
	{
		$project = $this->projects('project4');
		$updatedProjectName = 'Updated Test Project 2';
		$project->name = $updatedProjectName;
		$this->assertTrue($project->save(false));
		// READ back the record
		$updatedProject = Project::model()->findByPk($project->id);
		$this->assertTrue($updatedProject instanceof Project);
		$this->assertEquals($updatedProjectName, $updatedProject->name);

	}

	public function testDelete()
	{
		//DELETE the project
		$project = $this->projects('project3');
		$savedProjectId = $project->id;
		$this->assertTrue($project->delete());
		$deletedProject=Project::model()->findByPk($savedProjectId);
		$this->assertEquals(NULL,$deletedProject);
	}
}

?>