<?php

declare(strict_types=1);

namespace App\Tenant;

use App\Models\Company;

/**
 * TenantManager é um serviço compartilhado na aplicação inteira.
 * A facede torna essa classe um serviço sem precisar registrar no service provider.
 */
class TenantManager
{
    private $tenant;

    /**
     * @return Company
     */
    public function getTenant(): ?Company // null or Company
    {
        return $this->tenant;
    }

    /**
     * @param Company $tenant
     */
    public function setTenant($tenant): void
    {
        $this->tenant = $tenant;
    }
}
