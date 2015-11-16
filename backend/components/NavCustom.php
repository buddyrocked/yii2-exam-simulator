<?php
namespace backend\components;

use webvimark\modules\UserManagement\components\GhostMenu;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

class NavCustom extends GhostMenu {
	public $submenuTemplate = "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n";

	public $linkTemplate = '<a href="{url}"><i class="fa fa-{icon}"></i><span>{label}</span><i class="fa fa-angle-left pull-right"></i></a>';

    public $linkChildTemplate = '<a href="{url}"><i class="fa fa-{icon}"></i><span>{label}</span><i class="fa pull-right"></i></a>';

	/**
     * Renders the content of a menu item.
     * Note that the container and the sub-menus are not rendered here.
     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
     * @return string the rendering result
     */
    protected function renderItem($item)
    {
        if (isset($item['url'])) {

            if(isset($item['items'])):
                $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
            else:
                $template = ArrayHelper::getValue($item, 'template', $this->linkChildTemplate);
            endif;

            return strtr($template, [
                '{url}' => Html::encode(Url::to($item['url'])),
                '{label}' => $item['label'],
                '{icon}' => isset($item['icon'])?$item['icon']:'',
            ]);
        } else {
            $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);

            return strtr($template, [
                '{label}' => $item['label'],
            ]);
        }
    }
}