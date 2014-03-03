<?php

namespace Lv\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class LvUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
