<?php  

class Notes extends Controller{
	protected function index(){
		if (!isset($_SESSION['is_logged_in'])) {
			header('Location: '. ROOT_PATH.'users/login');
		}
		$viewmodel = new NoteModel();
		$this->returnView($viewmodel->index(), true);
	}

	protected function add(){
		if (!isset($_SESSION['is_logged_in'])) {
			header('Location: '. ROOT_PATH.'users/login');
		}
		$viewmodel = new NoteModel();
		$this->returnView($viewmodel->add(), true);
	}

	protected function note(){
		if (!isset($_SESSION['is_logged_in'])) {
			header('Location: '. ROOT_PATH.'users/login');
		}
		$viewmodel = new NoteModel();
		$this->returnView($viewmodel->note($_GET['id']), true);
		if (isset($_POST['update'])) {
			$viewmodel->update($_GET['id']);
		}
		if (isset($_POST['delete'])) {
			$viewmodel->delete($_GET['id']);
		}
		if (isset($_POST['add'])) {
			$viewmodel->add();
		}
	}
}

?>