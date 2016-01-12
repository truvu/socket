<?php

class IndexController extends ControllerBase
{
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
    		$this->view->user = $user;
    		$this->view->list = $list;
    	}
    }

}
