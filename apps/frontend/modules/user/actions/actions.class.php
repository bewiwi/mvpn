<?php

/**
 * user actions.
 *
 * @package    m-vpn
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->users = Doctrine_Core::getTable('user')
            ->createQuery('a')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new userForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new userForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($user = Doctrine_Core::getTable('user')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
        $this->form = new userForm($user);

        $this->servers = Doctrine_Core::getTable('server')
            ->createQuery('a')
            ->execute();

        $this->user_servers = Doctrine_Core::getTable('serveruser')
            ->createQuery('a')
            ->where('user_id = '.$user->getId())
            ->execute();

    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($user = Doctrine_Core::getTable('user')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
        $this->form = new userForm($user);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeUpdateServer(sfWebRequest $request)
    {

        $servs = Doctrine_Core::getTable('serveruser')
            ->createQuery('a')
            ->where('user_id = '.$request->getParameter('id'))
            ->execute()->delete();

        $sers =  $request->getPostParameter('server_no[]','false');
        foreach($sers as $ser){
            $userServ = new ServerUser();
            $userServ->setUserId($request->getParameter('id'));
            $userServ->setServerId($ser);
            $userServ->save();

        }
        //$this->setTemplate('edit');
        $this->redirect('user/index');
    }


    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($user = Doctrine_Core::getTable('user')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
        $user->delete();

        $this->redirect('user/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $user = $form->save();

            $this->redirect('user/edit?id='.$user->getId());
        }
    }
    protected function processForm2(sfWebRequest $request, sfForm $form)
    {
        $user = Doctrine_Core::getTable('user')->find(array($request->getParameter('id')));

        $user->setFirstname($request->getPostParameter('user[firstname]',false));
        $user->setLastname($request->getPostParameter('user[lastname]',false));
        $user->setLogin($request->getPostParameter('user[login]',false));
        $user->setLocked('0');
        if($request->getPostParameter('user[locked]',false) === "on");
            $user->setLocked('0');
        if($request->getPostParameter('password',false) != ''){
            $user->setPassword($request->getPostParameter('user[password]',false));
        }
        $user->save();
        //$this->redirect('user/edit?id='.$user->getId());
    }
}
