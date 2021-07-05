<?php

namespace Maartenpaauw\Chart\Examples\Axes;

use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Appearance\ShowDataAxes;
use Maartenpaauw\Chart\Appearance\ShowLabels;
use Maartenpaauw\Chart\Appearance\ShowPrimaryAxis;
use Maartenpaauw\Chart\Appearance\ShowSecondaryAxes;
use Maartenpaauw\Chart\Chart;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Data\Axes\Axes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Types\Bar;
use Maartenpaauw\Chart\Types\ChartType;

class AxesExample11 extends Chart
{
    protected function id(): string
    {
        return 'axes-example-11';
    }

    protected function heading(): string
    {
        return 'Axes Example #11';
    }

    protected function type(): ChartType
    {
        return new Bar();
    }

    protected function datasets(): DatasetsContract
    {
        return new Datasets(
            new Axes('Year', 'Progress'),
            new Dataset([
                new Entry(new Value(0.25, ''), new Label('2016')),
                new Entry(new Value(0.5, ''), new Label('2017')),
                new Entry(new Value(0.125, ''), new Label('2018')),
                new Entry(new Value(0.75, ''), new Label('2019')),
                new Entry(new Value(0.25, ''), new Label('2020')),
            ]),
        );
    }

    protected function configuration(): ConfigurationContract
    {
        return new Configuration(
            $this->identity(),
            $this->legend(),
            $this->modifications(),
            $this->colorscheme(),
        );
    }

    protected function modifications(): Modifications
    {
        return parent::modifications()
            ->add(new ShowLabels())
            ->add(new ShowPrimaryAxis())
            ->add(new ShowDataAxes())
            ->add(new ShowSecondaryAxes(4));
    }
}
