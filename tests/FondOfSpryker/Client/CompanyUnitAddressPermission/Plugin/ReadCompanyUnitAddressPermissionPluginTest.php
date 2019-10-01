<?php


namespace FondOfSpryker\Client\CompanyUnitAddressPermission\Plugin;

use Codeception\Test\Unit;

class ReadCompanyUnitAddressPermissionPluginTest extends Unit
{
    /**
     * @var \FondOfSpryker\Client\CompanyUnitAddressPermission\Plugin\ReadCompanyUnitAddressPermissionPlugin
     */
    protected $readCompanyUnitAddressPermissionPlugin;

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
            ReadCompanyUnitAddressPermissionPlugin::CONFIG_COMPANY_IDS => [1, 2, 3],
        ];

        $this->readCompanyUnitAddressPermissionPlugin = new ReadCompanyUnitAddressPermissionPlugin();
    }

    /**
     * @return void
     */
    public function testCanWithNullContext(): void
    {
        $this->assertFalse($this->readCompanyUnitAddressPermissionPlugin->can($this->configuration, null));
    }

    /**
     * @return void
     */
    public function testCanWithInvalidConfiguration(): void
    {
        $this->assertFalse($this->readCompanyUnitAddressPermissionPlugin->can([], 1));
    }

    /**
     * @return void
     */
    public function testCanWithInvalidContext(): void
    {
        $this->assertFalse($this->readCompanyUnitAddressPermissionPlugin->can($this->configuration, 4));
    }

    /**
     * @return void
     */
    public function testCan(): void
    {
        $this->assertTrue($this->readCompanyUnitAddressPermissionPlugin->can($this->configuration, 2));
    }

    /**
     * @return void
     */
    public function testGetKey(): void
    {
        $this->assertEquals(
            ReadCompanyUnitAddressPermissionPlugin::KEY,
            $this->readCompanyUnitAddressPermissionPlugin->getKey()
        );
    }

    /**
     * @return void
     */
    public function testGetConfigurationSignature(): void
    {
        $configurationSignature = $this->readCompanyUnitAddressPermissionPlugin->getConfigurationSignature();

        $this->assertIsArray(
            $configurationSignature
        );

        $this->assertCount(0, $configurationSignature);
    }
}
