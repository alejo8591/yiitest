<?php
class ProjectTest extends CDbTestCase
{
	/*
	public function testCRUD() 
	{ 
		
		$prjs = $this->projects;
		
		
		//Create a new project 
		$newProject=new Project; 
		$newProjectName = 'Test Project 1'; 
		$newProject->setAttributes(
								array( 
		                        	'name' => $newProjectName, 
		                            'description' => 'Test project number one', 
		                            'create_time' => '2010-01-01 00:00:00', 
		                            'create_user_id' => 1, 
		                            'update_time' => '2010-01-01 00:00:00', 
		                            'update_user_id' => 1, 
		                            )
								); 
		$this->assertTrue($newProject->save(false)); 
		
		//READ back the newly created project 
		$retrievedProject=Project::model()->findByPk($newProject->id); 
		$this->assertTrue($retrievedProject instanceof Project); 
		$this->assertEquals($newProjectName,$retrievedProject->name); 
		
		//UPDATE the newly created project  
		$updatedProjectName = 'Updated Test Project 1'; 
		$newProject->name = $updatedProjectName; 
		$this->assertTrue($newProject->save(false)); 

		//read back the record again to ensure the update worked   
		$updatedProject=Project::model()->findByPk($newProject->id); 
		$this->assertTrue($updatedProject instanceof Project); 
		$this->assertEquals($updatedProjectName,$updatedProject->name); 

		//DELETE the project  
		$newProjectId = $newProject->id; 
		$this->assertTrue($newProject->delete()); 
		$deletedProject=Project::model()->findByPk($newProjectId); 
		$this->assertEquals(NULL,$deletedProject); 
	}*/

	public $fixtures=array(
		'projects' => 'Project',
		'users' => 'User',
		'projUsrAssign' => ':tbl_project_user_assignment',
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
		$retreivedProject= $this->projects('project3');
		$this->assertTrue($retreivedProject instanceof Project);
		$this->assertEquals('Test Project 1', $retreivedProject->name);
	}

	public function testUpdate()
	{
		$project = $this->projects('project5');
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
		$project = $this->projects('project5');
		$savedProjectId = $project->id;
		$this->assertTrue($project->delete());
		$deletedProject=Project::model()->findByPk($savedProjectId);
		$this->assertEquals(NULL,$deletedProject);
	}
	
    /*
	public function testGetUserOptions()
	{
		$project = $this->projects('project4');
		$options = $project->userOptions;
		$this->assertTrue(is_array($options));
		$this->assertTrue(count($options) > 0);
	} */
}

?>