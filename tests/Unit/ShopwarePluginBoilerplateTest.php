<?php

declare(strict_types=1);

namespace Kommandhub\Shopware\Boilerplate\Tests\Unit;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Kommandhub\Shopware\Boilerplate\ShopwarePluginBoilerplate;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;

#[CoversClass(ShopwarePluginBoilerplate::class)]
class ShopwarePluginBoilerplateTest extends TestCase
{
    private ShopwarePluginBoilerplate $plugin;

    protected function setUp(): void
    {
        $this->plugin = new ShopwarePluginBoilerplate(true, '');
    }

    public function testPluginIsInstantiable(): void
    {
        $this->assertInstanceOf(ShopwarePluginBoilerplate::class, $this->plugin);
        $this->assertInstanceOf(Plugin::class, $this->plugin);
    }

    public function testInstall(): void
    {
        $context = $this->createMock(InstallContext::class);
        $this->plugin->install($context);
        $this->assertTrue(true);
    }

    public function testUninstallWithKeepUserData(): void
    {
        $context = $this->createMock(UninstallContext::class);
        $context->method('keepUserData')->willReturn(true);

        $this->plugin->uninstall($context);
        $this->assertTrue(true);
    }

    public function testUninstallWithoutKeepUserData(): void
    {
        $context = $this->createMock(UninstallContext::class);
        $context->method('keepUserData')->willReturn(false);

        $this->plugin->uninstall($context);
        $this->assertTrue(true);
    }

    public function testActivate(): void
    {
        $context = $this->createMock(ActivateContext::class);
        $this->plugin->activate($context);
        $this->assertTrue(true);
    }

    public function testDeactivate(): void
    {
        $context = $this->createMock(DeactivateContext::class);
        $this->plugin->deactivate($context);
        $this->assertTrue(true);
    }

    public function testUpdate(): void
    {
        $context = $this->createMock(UpdateContext::class);
        $this->plugin->update($context);
        $this->assertTrue(true);
    }

    public function testPostInstall(): void
    {
        $context = $this->createMock(InstallContext::class);
        $this->plugin->postInstall($context);
        $this->assertTrue(true);
    }

    public function testPostUpdate(): void
    {
        $context = $this->createMock(UpdateContext::class);
        $this->plugin->postUpdate($context);
        $this->assertTrue(true);
    }

    public function testExecuteComposerCommands(): void
    {
        $this->assertTrue($this->plugin->executeComposerCommands());
    }
}
