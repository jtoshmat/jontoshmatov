<?php

namespace app\Repositories;
use Illuminate\Support\Facades\Auth;

class SideBarItems
{
    protected $role = null;
	public function __construct(){
		if (!Auth::check()){
			return false;
		}
		if ($role = Auth::user()->role) {
			foreach ($role as $rol) {
				$this->role[] = $rol->title;
			}
		}
		if (Auth::check()) {
            if (Auth::user()->type==1) {
                unset($this->role);
                $this->role[] = 'site_admin';
            }
        }
    }

	public function getAll()
    {
	    $tags['site_admin'] = array(
			    'Members' => '/users/members',
			    'Roles' => '/users/members',
			    'Ditricts' => '/districts',
			    'Organizations' => '/organizations',
			    'Groups' => '/groups',
			    'Upload CSV' => '/admin/importfiles',
			    'Cloudinary Image' => '/admin/playground',
	    );

	    $tags['super_admin'] = array(
		    'Members' => '/users/members',
		    'Roles' => '/users/members',
		    'Ditricts' => '/districts',
		    'Organizations' => '/organizations',
		    'Groups' => '/groups',
	    );

	    $tags['admin'] = array(
		    'Members' => '/users/members',
		    'Roles' => '/users/members',
		    'Ditricts' => '/districts',
		    'Organizations' => '/organizations',
		    'Groups' => '/groups',
		    'Upload CSV' => '/admin/importfiles',
		    'Cloudinary Image' => '/admin/playground',
        );

	    $tags['principal'] = array(
		    'Principal' => '/users/principal',
		    'Organizations' => '/organizations',
		    'Groups' => '/groups',
	    );

	    $tags['teacher'] = array(
		    'Teacher' => '/users/teachers',
	    );

	    $tags['guardian'] = array(
		    'guardian' => '/guardian',
	    );

	    $tags['student'] = array(
		    'Student' => '/student',
	    );

		$combinedTags = array();

	    if ($this->role) {
		    foreach ($this->role as $role) {
			    foreach ($tags[ $role ] as $title => $link) {
				    $combinedTags[ $title ] = $link;
			    }
		    }
	    }else{
		    $combinedTags[ "home" ] = "/";
		    $combinedTags[ "login" ] = "/auth/login";
		    $combinedTags[ "register" ] = "/auth/register";
	    }
	    return $combinedTags;
	}

}
