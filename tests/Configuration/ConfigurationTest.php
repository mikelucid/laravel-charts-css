<?php

namespace Maartenpaauw\Chart\Tests\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;
use Maartenpaauw\Chart\Types\Column;

class ConfigurationTest extends TestCase
{
    private Identity $identity;

    private Legend $legend;

    private Modifications $modifications;

    private ConfigurationContract $configuration;

    private ColorschemeContract $colorscheme;

    protected function setUp(): void
    {
        parent::setUp();

        $this->identity = new Identity('my-chart', 'My chart', new Column());
        $this->legend = new Legend();
        $this->modifications = new Modifications();
        $this->colorscheme = new Colorscheme();

        $this->configuration = new Configuration(
            $this->identity,
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );
    }

    /** @test */
    public function it_can_access_the_identity(): void
    {
        $this->assertEquals($this->identity, $this->configuration->identity());
    }

    /** @test */
    public function it_can_access_the_legend(): void
    {
        $this->assertEquals($this->legend, $this->configuration->legend());
    }

    /** @test */
    public function it_can_access_the_modifications(): void
    {
        $this->assertEquals($this->modifications, $this->configuration->modifications());
    }

    /** @test */
    public function it_can_access_the_colorscheme(): void
    {
        $this->assertEquals($this->colorscheme, $this->configuration->colorscheme());
    }
}
