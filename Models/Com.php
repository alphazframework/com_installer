<?php

/**
 * This file is part of the Zest Framework.
 *
 * @author   Muhammad Umer Farooq <lablnet01@gmail.com>
 * @author-profile https://www.facebook.com/Muhammadumerfarooq01/
 *
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @since 3.0.0
 *
 * @license MIT
 */

namespace App\Components\com_installer\Models;

use Zest\Component\Components;
use Zest\Files\FileHandling;
use Zest\Hashing\Hash;
use Zest\Session\Session;

class Com extends Components
{

    public function isInstalled()
    {
        return file_exists(route('storage.data').md5('com_installer').'.json') ? true : false;
    }

    public function register($usr,$pwd)
    {
        $user = [];
        $user['username'] = $usr;
        $user['password'] = Hash::make($pwd);
        $json = json_encode($user);
        $file = new FileHandling();
        $userFile = route('storage.data').md5($usr).'.json';
        if (!file_exists($userFile)) {
            $file->open($userFile, 'writeOnly')->write($json);
            $file->open(route('storage.data').md5('com_installer').'.json','writeOnly')->write('installed');
            $file->close();
            return true;
        }

        return false;
    }
    public function login($usr, $pwd)
    {
        $file = new FileHandling();
        $userFile = route('storage.data').md5($usr).'.json';
        if (file_exists($userFile)) {
            $auth = $file->open($userFile, 'readOnly')->read();
            $auth = json_decode($auth, true);
            if (Hash::verify($pwd, $auth['password'])) {
                Session::set(md5('com_installer_user'),true);
                return true;
            }
        }
        return false;
    }

    public function logout()
    {
        Session::delete(md5('com_installer_user'));
    }

    public function isLogin()
    {
        return Session::has(md5('com_installer_user')) ? true : false;
    }

    public function getIconAvailability($version, $comparator)
    {
        if ($this->isSupported($version, $comparator)) {
            $icon = 'fa fa-check close green';
        } else {
            $icon = 'fa fa-times close red';
        }

        return $icon;
    }    
}
