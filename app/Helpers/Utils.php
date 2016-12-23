<?php
namespace App\Helpers;

class Utils
{
	public static function isOwner($loginUserId, $assocModelUserId)
	{
		if( (int) $loginUserId !== (int) $assocModelUserId )
            return false;
        return true;
	}
}