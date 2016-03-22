<?php

namespace App\Models;

use Cloudoki\OaStack\Models\User as OaUser;

/**
 * User Model
 *
 * @SWG\Definition(definition="User", type="object", 
		@SWG\Property(property="id", type="integer", description="the resource unique id", example=1),
		@SWG\Property(property="email", type="string", description="the resource e-mail address", example="zen@cloudoki.com"),
		@SWG\Property(property="firstname", type="string", description="the resource first name", example="Zen"),
		@SWG\Property(property="lastname", type="string", description="the resource last name", example="Bot"),
		@SWG\Property(property="password", type="string", description="hashed password string"),
		@SWG\Property(property="avatar", type="string", description="absolute uri to resource avatar image")
	)
 */
class User extends OaUser
{

}
