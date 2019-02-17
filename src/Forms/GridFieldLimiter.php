<?php

namespace Fromholdio\GridFieldLimiter\Forms;

use SilverStripe\Forms\GridField\GridField_HTMLProvider;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;
use SilverStripe\View\SSViewer;

class GridFieldLimiter implements GridField_HTMLProvider
{
    protected $targetFragment;
    protected $limit;
    protected $showLimitReachedMessage;

    public function __construct($limit = 0, $targetFragment = 'before', $showLimitReachedMessage = false)
    {
        $this->limit = $limit;
        $this->targetFragment = $targetFragment;
        $this->showLimitReachedMessage = $showLimitReachedMessage;

        Requirements::css('fromholdio/silverstripe-gridfield-limiter:client/css/gridfieldlimiter.css');
    }

    public function getHTMLFragments($gridField)
    {
        $data = ArrayData::create([
            'TargetFragmentName'    =>  $this->targetFragment,
            'LeftFragment'          =>  "\$DefineFragment(limiter-{$this->targetFragment}-left)",
            'RightFragment'         =>  "\$DefineFragment(limiter-{$this->targetFragment}-right)",
            'Limit'                 =>  (int) $this->limit,
            'Count'                 =>  (int) $gridField->getManipulatedList()->count(),
            'ShowLimitReachedMessage' => $this->showLimitReachedMessage
        ]);

        $templates = SSViewer::get_templates_by_class($this, '', __CLASS__);
        return [
            $this->targetFragment => $data->renderWith($templates)
        ];
    }

    public function setShowLimitReachedMessage($bool)
    {
        $this->showLimitReachedMessage = (bool) $bool;
        return $this;
    }
}
