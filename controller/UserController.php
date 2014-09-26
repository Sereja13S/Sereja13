<?php
namespace controller;
use model\entity\User;
use model\service\UserService;
use util\Request;

class UserController extends BaseController {
    private $userService;
    
    /**
     * 
     * @return UserService
     */
    private function getUserService() {
        if (empty($this->userService)) {
            $this->userService = new UserService();
        }
        return $this->userService;
    }
    

    
    function logInAction() {
        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($this->getUserService()->authorize(
                    $request->getPostValue('name'),
                    $request->getPostValue('password'))) {
                $this->getRequest()->setSessionValue('loggedIn', $request->getPostValue('name'));
                $this->redirect('welcome');
            } else {
                $this->view->message = 'Login incorrect';
                return 'login';
            }
        } else {
            return 'login';
        }
    }
    
    function usersAction() {//
        $this->view->users = $this->getUserService()->getUserList();
        return 'users';//
    }//
    
    function editUserAction() {//
        $r = $this->getRequest();//
        
        if (!empty($r->getGetValue('id'))) {//
            $user = $this->getUserService()->findId($r->getGetValue('id'));//
        } else {//
            $user = new User();//
        }//
        
        if (!$user) {//
            $user = new User();//
        }//
        
        if ($r->isPost()) {//
            $user->setId($r->getPostValue('id'));
            $user->setName($r->getPostValue('name'));
            $user->setEmail($r->getPostValue('email'));
            $user->setPassword($r->getPostValue('password'));
            if (!$this->getUserService()->addUser($user)) {//
                $error = \util\MySQL::$db->errorInfo();//
                print_r($error);//
                $this->view->message = 'Error! ' . $error[2];//
            }//
            else if ($this->getUserService()->addUser($user)) {
                $this->view->message = "Is Fain!";
        }
        }//
        
        $this->view->user = $user;//
        $this->view->users = $this->getUserService()->getUserList();//
        return 'editUser';//
    }
}
