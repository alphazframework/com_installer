<?php

namespace App\Components\com_installer\Controllers;

use Zest\Component\View\View;
use Zest\Data\Conversion;
use Zest\Files\Files;

define("__COM_INSTALLER__", 'com_installer/Views/');

class Home extends \Zest\Controller\Controller
{

    public function init()
    {
        return new \App\Components\com_installer\Models\Com();
    }
    public function isLogin()
    {
        if (!$this->init()->isLogin()) {
            redirect(site_base_url().'/com/installer/login');
        }
    }

    public function alreadyLogin()
    {
        if ($this->init()->isLogin()) {
            redirect(site_base_url().'/com/installer/index');
        }
    }

    public function setup()
    {
        View::rander(__COM_INSTALLER__.'Home/setup');
    }

    public function setupProcess()
    {
        if (input('submit')) {
            $usr = escape(input('usr'));
            $pwd = escape(input('pwd'));
            $this->init()->register($usr,$pwd);
            redirect(site_base_url().'/com/installer/login');
        }
    }

    public function enable()
    {
        $this->isLogin();
        $name = $this->input->name;
        $c = $this->init()->getConponentConfigByName($name);
        if (strtolower($name) !== 'com_installer' && $this->init()->isSupported($c['requires']['version'], $c['requires']['comparator'])) {
            $this->init()->enable($name);
            add_system_message($name.": ".printl('enable:msg:com:installer'), 'success');
        }
        add_system_message(printl('disable:msg:n:com:installer'), 'error');
        redirect(site_base_url().'/com/installer/index');
    }

    public function disable()
    {
        $this->isLogin();
        $name = $this->input->name;
        $c = $this->init()->getConponentConfigByName($name);
        if (strtolower($name) !== 'com_installer' && $this->init()->isSupported($c['requires']['version'], $c['requires']['comparator'])) {
            $this->init()->disable($name);
            add_system_message($name.": ".printl('disable:msg:com:installer'), 'success');
        }
        add_system_message(printl('disable:msg:n:com:installer'), 'error');
        redirect(site_base_url().'/com/installer/index');
    }

    public function delete()
    {
        $this->isLogin();
        $name = $this->input->name;
        $this->init()->delete($name);
        add_system_message($name.": ".printl('delete:msg:com:installer'), 'success');
        redirect(site_base_url().'/com/installer/index');
    }

    public function all()
    {
        $this->isLogin();
        View::rander(__COM_INSTALLER__.'Home/all',Conversion::objectArray($this->init()->getAll()));
    }

    public function login()
    {
        $this->alreadyLogin();
        View::rander(__COM_INSTALLER__."Home/login");
    }

    public function loginProcess()
    {
        $this->alreadyLogin();
        if (input("submit")) {
            $usr = escape(input('usr'));
            $pwd = escape(input('pwd'));
            if ($this->init()->login($usr,$pwd)) {
                add_system_message(printl('auth:success:com:installer'),'success');
            } else {
                add_system_message(printl('auth:error:com:installer'), 'error');
            }
            redirect(site_base_url().'/com/installer/index');
        } 
    }
    public function logout()
    {
        $this->init()->logout();
        add_system_message(printl('success:login:com:installer'), 'information');
        redirect(site_base_url().'/com/installer/login');
    }

    public function upload()
    {
        $this->isLogin();
        View::rander(__COM_INSTALLER__."Home/upload");
    }

    public function uploadProcess()
    {
        if (input('submit')) {
            $files = new Files();
            $status = $files->fileUpload($_FILES['file'], route()->storage_data, 'zip');
            if ($status['status'] === 'success') {
                $ret = $this->init()->install($status['code'], $status['name']);
                if ($ret)
                    add_system_message(printl('success:com:installer'), 'success');
                else 
                    add_system_message(printl('error:n:com:installer'), 'error');
            } else {
                add_system_message(printl('error:file:com:installer'), 'error');
            }
        }
        redirect(site_base_url().'/com/installer/index');
    }
}
