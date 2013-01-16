<?php

/**
 * This file is part of the Kdyby (http://www.kdyby.org)
 *
 * Copyright (c) 2008 Filip Procházka (filip@prochazka.su)
 *
 * For the full copyright and license information, please view the file license.md that was distributed with this source code.
 */

namespace Kdyby\Curl\DI;
use Kdyby;
use Nette;



/**
 * @author Filip Procházka <filip@prochazka.su>
 */
class CurlExtension extends Nette\Config\CompilerExtension
{

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$builder->addDefinition($this->prefix('curl'))
			->setClass('Kdyby\Curl\CurlSender');

		if (!$builder->parameters['productionMode']) {
			$builder->addDefinition($this->prefix('curl.panel'))
				->setFactory('Kdyby\Curl\Diagnostics\Panel::register')
				->addTag('run', TRUE);
		}
	}

}
