<?php

namespace FondOfSpryker\Shared\CompanyUnitAddressPermission;

use Spryker\Shared\Kernel\AbstractBundleConfig;

class CompanyUnitAddressPermissionConfig extends AbstractBundleConfig
{
    public const PERMISSION_CONFIG_COMPANY_IDS = 'company_ids';
    public const READ_COMPANY_UNIT_ADDRESS_PERMISSION_PLUGIN_KEY = 'ReadCompanyUnitAddressPermissionPlugin';
    public const WRITE_COMPANY_UNIT_ADDRESS_PERMISSION_PLUGIN_KEY = 'WriteCompanyUnitAddressPermissionPlugin';
}
