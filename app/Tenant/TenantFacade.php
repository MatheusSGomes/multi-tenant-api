<?php

namespace App\Tenant;

use Illuminate\Support\Facades\Facade;

class TenantFacade extends Facade
{
    /**
     * Método retorna o que precisa ser carregado como serviço.
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        //parent::getFacadeAccessor();
        return TenantManager::class;
    }
}
