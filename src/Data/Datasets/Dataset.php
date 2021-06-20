<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\LabelContract;

class Dataset implements DatasetContract
{
    private array $entries;

    private LabelContract $label;

    public function __construct(array $entries, ?LabelContract $label = null)
    {
        $this->entries = $entries;
        $this->label = $label ?? new Label('');
    }

    public function entries(): array
    {
        return $this->entries;
    }

    public function max(): float
    {
        return max(array_map(fn (Entry $entry) => $entry->raw(), $this->entries));
    }

    public function label(): LabelContract
    {
        return $this->label;
    }

    public function hideLabel(): DatasetContract
    {
        $this->label->hide();

        return $this;
    }
}
