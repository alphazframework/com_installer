<?php

namespace App\Components\com_installer\Middleware;

class com_installer
{
	public function before($requst, $response, $params)
	{
		if (!(new \App\Components\com_installer\Models\Com())->isInstalled()) {
            redirect(site_base_url().'/com/installer/setup');
        }
        
	}

	public function after($request, $response, $params)
	{
		
	}
}