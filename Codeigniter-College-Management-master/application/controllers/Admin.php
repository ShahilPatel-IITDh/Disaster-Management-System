<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('user_id')) {
			return redirect('welcome/login');
		}
	}

	public function dashboard()
	{
		$this->load->model('queries');
		$collegeUsers = $this->queries->viewAllColleges();
		$this->load->view('dashboard', ['collegeUsers' => $collegeUsers]);
	}

	public function addCollege()
	{
		$this->load->view('addCollege');
	}

	public function createCollege()
	{
		$this->form_validation->set_rules('collegename','College Name', 'required');
		$this->form_validation->set_rules('branch','Branch Name', 'required');
		if ($this->form_validation->run()) {
			$data = $this->input->post();
			$this->load->model('queries');
			if ($this->queries->insertCollege($data)) {
				$this->session->set_flashdata('message', 'College Added Successfully');
			} else {
				$this->session->set_flashdata('message', 'Failed To Add!');
			}

			return redirect('admin/addcollege');
		} else {
			$this->addCollege();
		}
	}

	public function addStudent()
	{
		$this->load->model('queries');
		$colleges = $this->queries->getColleges();
		$this->load->view('addStudent', ['colleges'=>$colleges]);
	}

	public function createStudent()
	{
		$this->form_validation->set_rules('studentname','Student Name', 'required');
		$this->form_validation->set_rules('college_id','College Name', 'required');
		$this->form_validation->set_rules('email','Email', 'required');
		$this->form_validation->set_rules('gender','Gender', 'required');
		$this->form_validation->set_rules('course','Course', 'required');

		if ($this->form_validation->run()) {
			$data = $this->input->post();

			$this->load->model('queries');
			if ($this->queries->insertStudent($data)) {
				$this->session->set_flashdata('message', 'Student Added Successfully');
			} else {
				$this->session->set_flashdata('message', 'Failed To Add!');
			}

			return redirect('admin/addStudent');
		} else {
			$this->addStudent();
		}
	}

	public function viewstudents($college_id)
	{
		$this->load->model('queries');
		$students = $this->queries->getStudents($college_id);
		$this->load->view('viewStudents', ['students' => $students]);
	}

	public function editStudent($student_id)
	{
		$this->load->model('queries');
		$colleges = $this->queries->getColleges();
		$studentInfo = $this->queries->getStudentRecord($student_id);
		$this->load->view('editStudent', ['colleges' => $colleges, 'studentInfo' => $studentInfo]);
	}

	public function addModerator()
	{
		$this->load->model('queries');
		$colleges = $this->queries->getColleges();
		$roles = $this->queries->getRoles();
		// echo "<pre>";
		// print_r($colleges);
		// echo "</pre>";
		// exit();
		$this->load->view('addModerator', ['colleges' => $colleges, 'roles' => $roles]);
	}

	public function createModerator()
	{
		$this->form_validation->set_rules('username','Username', 'required');
		$this->form_validation->set_rules('college_id','College Name', 'required');
		$this->form_validation->set_rules('email','Email', 'required');
		$this->form_validation->set_rules('gender','Gender', 'required');
		$this->form_validation->set_rules('role_id','Role', 'required');
		$this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('confpwd','Password Confirmation', 'required');

		if ($this->form_validation->run()) {
			$data = $this->input->post();
			$data['password'] = sha1($this->input->post('password'));
			$data['confpwd'] = sha1($this->input->post('confpwd'));

			$this->load->model('queries');
			if ($this->queries->insertModerator($data)) {
				$this->session->set_flashdata('message', 'Moderator Added Successfully');
			} else {
				$this->session->set_flashdata('message', 'Failed To Add!');
			}

			return redirect('admin/addModerator');
		} else {
			$this->addModerator();
		}
	}

	public function modifystudent($id)
	{
		$this->form_validation->set_rules('studentname','Student Name', 'required');
		$this->form_validation->set_rules('college_id','College Name', 'required');
		$this->form_validation->set_rules('email','Email', 'required');
		$this->form_validation->set_rules('gender','Gender', 'required');
		$this->form_validation->set_rules('course','Course', 'required');

		if ($this->form_validation->run()) {
			$data = $this->input->post();

			$this->load->model('queries');
			if ($this->queries->updateStudent($data, $id)) {
				$this->session->set_flashdata('message', 'Student Updated Successfully');
			} else {
				$this->session->set_flashdata('message', 'Failed To Update!');
			}

			return redirect('admin/addStudent');
		} else {
			$this->editStudent();
		}
	}

	public function deletestudent($id)
	{
		$this->load->model('queries');
		if($this->queries->removeStudent($id))
		{
			return redirect('admin/dashboard');
		} else {
			return redirect('admin/dashboard');
		}
	}

	public function moderator()
	{
		$this->load->model('queries');
		$moderator = $this->queries->viewAllColleges();
		$this->load->view('viewModerator', ['moderator'=>$moderator]);
	}

}
