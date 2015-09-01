<?php
namespace backend\components;

use yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\sidenav\SideNav;
use kartik\sidenav\SideNavAsset;

class SideNavCustom extends SideNav {

	public $iconPrefix = 'glyphicon glyphicon-';

	public $indItem = '';

	public $linkOptions = [];

	public function init()
    {
        parent::init();
        SideNavAsset::register($this->getView());
        $this->activateParents = true;
        $this->submenuTemplate = "\n<ul class='nav nav-pills nav-stacked'>\n{items}\n</ul>\n";
        $this->linkTemplate = '<a href="{url}" {linkOptions}>{icon}{label}</a>';
        $this->labelTemplate = '{icon}{label}';
        $this->markTopItems();
        Html::addCssClass($this->options, 'nav nav-pills nav-stacked kv-sidenav');
    }

	/**
     * Renders the content of a side navigation menu item.
     *
     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
     * @return string the rendering result
     * @throws InvalidConfigException
     */
    protected function renderItem($item)
    {
        $this->validateItems($item);
        $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
        $url = Url::to(ArrayHelper::getValue($item, 'url', '#'));
        $linkOptions = '';
        if(isset($item['linkOptions'])){
            foreach ($item['linkOptions'] as $key => $value) {
                $options[] = $key.'="'.$value.'"';  
            }
            $linkOptions = implode(' ', $options);
        }
        if (empty($item['top'])) {
            if (empty($item['items'])) {
                $template = str_replace('{icon}', $this->indItem . '{icon}', $template);
            } else {
                $template = isset($item['template']) ? $item['template'] :'<a href="{url}" class="kv-toggle">{icon}{label}</a>';
                $openOptions = ($item['active']) ? ['class' => 'opened'] : ['class' => 'opened', 'style' => 'display:none'];
                $closeOptions = ($item['active']) ? ['class' => 'closed', 'style' => 'display:none'] : ['class' => 'closed'];
                $indicator = Html::tag('span', $this->indMenuOpen, $openOptions) . Html::tag('span', $this->indMenuClose, $closeOptions);
                $template = str_replace('{icon}', $indicator . '{icon}', $template);
            }
        }
        $icon = empty($item['icon']) ? '' : '<span class="' . $this->iconPrefix . $item['icon'] . '"></span> &nbsp;';
        unset($item['icon'], $item['top']);
        return strtr($template, [
            '{url}' => $url,
            '{label}' => $item['label'],
            '{icon}' => $icon,
            '{linkOptions}'=>$linkOptions,
        ]);
    }
}