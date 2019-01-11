<?php
class NoteModel extends Model{
	public function index(){
		$this->query('SELECT * FROM notes WHERE `user_id` = :user_id ORDER BY `date` DESC');
		$this->bind('user_id', $_SESSION['user_data']['id']);
		$rows = $this->resultSet();
		return $rows;
	}

	public function note($id){
		$this->query('SELECT * FROM notes WHERE `user_id` = :user_id and `id`=:id ORDER BY `date` DESC');
		$this->bind('user_id', $_SESSION['user_data']['id']);
		$this->bind('id', $id);
		$single = $this->single();
		if ($single) {
			return $single;
		} else {
			header('Location:'. ROOT_URL);
		}
		
	}

	public function add(){
		$note = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if ($note['add']) {
			if ($note['name'] == '' || $note['content'] == '') {
				echo 'Fill all fields';
				return;
			}

			$this->query('INSERT INTO notes (name, content, user_id) VALUES (:name, :content, :user_id)');
			$this->bind(':name', $note['name']);
			$this->bind(':content', $note['content']);
			$this->bind(':user_id', $_SESSION['user_data']['id']);
			$this->execute();

			if ($this->lastInsertId()) {
				header('Location:'. ROOT_URL);
				return;
			}
		}
	}

	public function update($id){
		$note = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if ($note['update']) {
			if ($note['name'] == '' || $note['content'] == '') {
				echo 'Fill all fields';
				return;
			}

			$this->query('UPDATE notes SET name=:name, content=:content WHERE `id`=:id and `user_id`=:user_id');
			$this->bind(':name', $note['name']);
			$this->bind(':content', $note['content']);
			$this->bind(':user_id', $_SESSION['user_data']['id']);
			$this->bind(':id', $id);
			$this->execute();

			if ($this->lastUpdateId()) {
				header('Location:'. ROOT_URL);
				return;
			} else {
				echo 'change something';
			}
		}
	}

	public function delete($id){
		$note = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if ($note['delete']) {

			$this->query('DELETE FROM `notes` WHERE `id`=:id and `user_id`=:user_id');
			$this->bind(':user_id', $_SESSION['user_data']['id']);
			$this->bind(':id', $id);
			$this->execute();

			if ($this->lastUpdateId()) {
				header('Location:'. ROOT_URL);
				return;
			}
		}
	}
}
?>