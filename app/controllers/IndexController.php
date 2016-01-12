<?php

class IndexController extends ControllerBase
{
	public function setStatus($time){
		$now = time();
		if($time==$now) $status = 'in comming';
		elseif($time<$now) $status = 'on going';
		else $status = 'passed';
		return $status;
	}
    public function indexAction()
    {
    	if(!$this->session->has('uid')){
    		echo $this->view->render('account', 'login');
    	}else{
    		$user = $this->session->get('uid');
    		$list = Timetable::find(array(
    			'conditions' => 'user=:user:',
    			'bind' => array('user'=>$user),
    			'order' => 'id desc',
    			'limit' => 10
    		));
    		$this->view->status = $this->setStatus;
    		$this->view->list = $list;
    	}
    }

}
