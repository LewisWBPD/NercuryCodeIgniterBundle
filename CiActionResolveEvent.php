<?php

/*
 * Copyright 2012 Nerijus Arlauskas <nercury@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Nercury\CodeIgniterBundle;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

class CiActionResolveEvent extends Event
{
    /**
     *
     * @var Request
     */
    protected $request;

    /**
     * Possible CI controllers and methods
     *
     * @var array
     */
    protected $possibleMethods = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     *
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Set possible controller and method for current request
     *
     * @param string $controller
     * @param string $method
     * @param string $locale
     */
    public function addPossibleAction($controller, $method, $locale)
    {
        $this->possibleMethods[] = array(
            'controller' => $controller,
            'method' => $method,
            'locale' => $locale,
        );
    }

    /**
     * Get resolved possible controllers and methods
     *
     * @return array
     */
    public function getResolvedActions()
    {
        return $this->possibleMethods;
    }
}
