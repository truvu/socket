<?php

class TimetableController extends ControllerBase
{
	private $user = 0;
	public function onConstruct()
	{
		if($this->session->has('uid')){
			if($this->request->isPost()) $this->user = $this->session->get('uid');
		}
	}
	public function createAction()
	{
		if($this->user){
			$date = $this->request->getPost('date');
			$content = $this->request->getPost('content');
			if($date&&$content){
				$time = strtotime($date);
				$new = new Timetable;
				$new->user = $this->user;
				$new->content = $content;
				$new->created = $time;
				$new->text_time = $date;
				if($new->create()){
					$now = time();
					if($time==$now) $new->status = 'in comming';
					elseif($time>$now) $new->status = 'on going';
					else $new->status = 'passed';
					echo json_encode($new);
				}
			}
		}
	}
	public function editAction($id=null){
		if($this->user&&preg_match('/^[0-9]{1,11}$/', $id)){
			$id = (float)$id;
			$date = $this->request->getPost('date');
			$content = $this->request->getPost('content');
			if($id&&$date&&$content){
				$table = Timetable::findFirstById($id);
				if($table){
					$time = strtotime($date);
					if($table->created!=$time||$table->content!=$content){
						$table->created = $time;
						$table->content = $content;
						$table->text_time = $date;
						if($table->update()){
							$now = time();
							if($time==$now) $status = 'in comming';
							elseif($time>$now) $status = 'on going';
							else $status = 'passed';
							echo $status;
						}
					}
				}
			}
		}
	}
	public function deleteAction($id=null)
	{
		if($this->user&&preg_match('/^[0-9]{1,11}$/', $id)){
			$id = (float)$id;
			$row = Timetable::findFirstById($id);
			if($row) $row->delete();
		}
	}
}

?>