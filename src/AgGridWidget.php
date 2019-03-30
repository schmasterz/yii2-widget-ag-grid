<?php
namespace schmasterz\agGrid;

use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

class AgGridWidget extends Widget
{


    /**
     * @var string
     * Wrapper tag name. If set to false no tag will be rendered
     */
    public $container = 'div';

    /**
     * @var array the HTML attributes for the container tag of the grid view.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */

    public $options = [];
    /**
     * @var array default HTML attributes for the container tag of the grid view.
     */

    protected $defaultOptions = ['class' => 'ag-theme-blue'];


    /**
     * @var array
     * Additional javascript options
     */
    public $gridOptions = [];

    /**
     * @var array
     * Default additional javascript options
     */
    protected $defaultGridOptions = ['rowData' => []];

    public function init()
    {
        if (empty($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if(empty($this->gridOptions['columnDefs'])) {
            throw new InvalidConfigException('You must define your columns');
        }
        $this->options = array_merge($this->defaultOptions, $this->options);
        $this->gridOptions = array_merge($this->defaultGridOptions, $this->gridOptions);

        AgGridAsset::register($this->getView());
        $this->addJs();
    }

    public function run()
    {
        //TODO: run with DataProvider on both cases with or without ajax
        return Html::tag($this->container, '', $this->options);
       // return '<div id="myGrid" style="height: 600px;width:500px;" class="ag-theme-balham"></div>';

    }

    protected function addJs()
    {
        $js = 'var columnDefs = '.Json::encode($this->gridOptions['columnDefs']).';';
        $js .= 'var rowData ='.Json::encode($this->gridOptions['rowData']).';';
        $js .= 'var gridOptions = {columnDefs: columnDefs,rowData: rowData};';
        $js.= 'var eGridDiv = document.querySelector("#'.$this->options['id'].'");';

        $js .= 'new agGrid.Grid(eGridDiv, gridOptions);';
        $this->getView()->registerJs($js);

    }
}