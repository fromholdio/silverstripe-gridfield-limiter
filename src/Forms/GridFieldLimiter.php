<?php

namespace Fromholdio\GridFieldLimiter\Forms;

use SilverStripe\Forms\GridField\GridField_HTMLProvider;
use SilverStripe\Model\ArrayData;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;

class GridFieldLimiter implements GridField_HTMLProvider
{

    public function __construct(protected readonly int    $limit = 0,
                                protected readonly string $targetFragment = 'before',
                                protected bool            $showLimitReachedMessage = false)
    {
        Requirements::css('fromholdio/silverstripe-gridfield-limiter:client/css/gridfieldlimiter.css');
    }

    public function getHTMLFragments($gridField): array
    {
        $data = ArrayData::create([
            'TargetFragmentName' => $this->targetFragment,
            'LeftFragment' => "\$DefineFragment(limiter-{$this->targetFragment}-left)",
            'RightFragment' => "\$DefineFragment(limiter-{$this->targetFragment}-right)",
            'Limit' => $this->limit,
            'Count' => $gridField->getManipulatedList()->count(),
            'ShowLimitReachedMessage' => $this->showLimitReachedMessage
        ]);

        $templates = SSViewer::get_templates_by_class($this, '', __CLASS__);
        return [
            $this->targetFragment => $data->renderWith($templates)
        ];
    }

    public function setShowLimitReachedMessage($bool): GridFieldLimiter
    {
        $this->showLimitReachedMessage = (bool)$bool;
        return $this;
    }
}
