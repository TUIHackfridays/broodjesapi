<?php

namespace App\Models;

use Cloudoki\OaStack\Models\Account as OaAccount;

/**
 * Account Model
 *
 * @SWG\Definition(definition="Account", type="object", 
		@SWG\Property(property="id", type="integer", description="the resource unique id", example=1),
		@SWG\Property(property="slug", type="string", description="the url-friendly account name", example="acme"),
		@SWG\Property(property="name", type="string", description="the account name", example="Acme Co")
	)
 */
class Account extends OaAccount
{
	
}
