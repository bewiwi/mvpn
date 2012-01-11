<?php

/**
 * server actions.
 *
 * @package    m-vpn
 * @subpackage server
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class serverActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->servers = Doctrine_Core::getTable('server')
            ->createQuery('a')
            ->execute();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new serverForm();
    }

    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new serverForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($server = Doctrine_Core::getTable('server')->find(array($request->getParameter('id'))), sprintf('Object server does not exist (%s).', $request->getParameter('id')));
        $this->form = new serverForm($server);
    }

    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($server = Doctrine_Core::getTable('server')->find(array($request->getParameter('id'))), sprintf('Object server does not exist (%s).', $request->getParameter('id')));
        $this->form = new serverForm($server);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($server = Doctrine_Core::getTable('server')->find(array($request->getParameter('id'))), sprintf('Object server does not exist (%s).', $request->getParameter('id')));
        $server->delete();

        $this->redirect('server/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $server = $form->save();

            $this->redirect('server/edit?id='.$server->getId());
        }

    }
    public function executeConfig(sfWebRequest $request)
    {
        $server = Doctrine_Core::getTable('server')->find(array($request->getParameter('id')));
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.$server->getName().'.ovpn"');
        header('Content-Transfer-Encoding: binary');
        echo $server->getConfig();
        exit();

    }

    public function executeCa(sfWebRequest $request)
    {
        $server = Doctrine_Core::getTable('server')->find(array($request->getParameter('id')));
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="ca.crt"');
        header('Content-Transfer-Encoding: binary');
        echo $server->getCa();
        exit();

    }


}
