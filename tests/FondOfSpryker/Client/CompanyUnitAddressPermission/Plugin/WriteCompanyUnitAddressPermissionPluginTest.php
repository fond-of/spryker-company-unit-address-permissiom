<?php


namespace FondOfSpryker\Client\CompanyUnitAddressPermission\Plugin;

use Codeception\Test\Unit;

class WriteCompanyUnitAddressPermissionPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyUnitAddressPermission\Plugin\WriteCompanyUnitAddressPermissionPlugin
     */
    protected $writeCompanyUnitAddressPermissionPlugin;

    /**
     * @var array
     */
    protected $configuration;


    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->configuration = [
           WriteCompanyUnitAddressPermissionPlugin::CONFIG_COMPANY_IDS => [1, 2, 3],
        ];

        $this->writeCompanyUnitAddressPermissionPlugin = new WriteCompanyUnitAddressPermissionPlugin();
    }

    /**
     * @return void
     */
    public function testCanWithNullContext(): void
    {
        $this->assertFalse($this->writeCompanyUnitAddressPermissionPlugin->can($this->configuration, null));
    }

    /**
     * @return void
     */
    public function testCanWithInvalidConfiguration(): void
    {
        $this->assertFalse($this->writeCompanyUnitAddressPermissionPlugin->can([], 1));
    }

    /**
     * @return void
     */
    public function testCanWithInvalidContext(): void
    {
        $this->assertFalse($this->writeCompanyUnitAddressPermissionPlugin->can($this->configuration, 4));
    }

    /**
     * @return void
     */
    public function testCan(): void
    {
        $this->assertTrue($this->writeCompanyUnitAddressPermissionPlugin->can($this->configuration, 2));
    }

    /**
     * @return void
     */
    public function testGetKey(): void
    {
        $this->assertEquals(
            WriteCompanyUnitAddressPermissionPlugin::KEY,
            $this->writeCompanyUnitAddressPermissionPlugin->getKey()
        );
    }

    /**
     * @return void
     */
    public function testGetConfigurationSignature(): void
    {
        $configurationSignature = $this->writeCompanyUnitAddressPermissionPlugin->getConfigurationSignature();

        $this->assertIsArray(
            $configurationSignature
        );

        $this->assertCount(0, $configurationSignature);
    }
}
