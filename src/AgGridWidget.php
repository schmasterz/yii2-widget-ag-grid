<?php
namespace schmasterz\agGrid;

use yii\base\Widget;
use yii\helpers\Html;

class AgGridWidget extends Widget
{
    public $columns = [];

    public $data;

    public $fetch;


    /**
     * @var string
     * Wrapper tag name. If set to false no tag will be rendered
     */
    public $container = 'div';

    public $options = [];
    /**
     * @var array default HTML attributes for the container tag of the grid view.
     */
    protected $defaultOptions = ['class' => 'ag-theme-bootstrap'];
    /**
     * @var array the HTML attributes for the container tag of the grid view.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */



    /**
     * @var array
     * Additional javascript options
     */
    public $pluginOptions = [];

    public function init()
    {
        if (empty($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        $this->options = array_merge($this->defaultOptions, $this->options);

        AgGridAsset::register($this->getView());
        $this->registerJs();
    }

    public function run()
    {
        //TODO: run with DataProvider on both cases with or without ajax
        return Html::tag($this->container, '', $this->options);
       // return '<div id="myGrid" style="height: 600px;width:500px;" class="ag-theme-balham"></div>';

    }

    protected function registerJs()
    {
        $this->getView()->registerJs(' var columnDefs = [
      {headerName: "Make", field: "make"},
      {headerName: "Model", field: "model"},
      {headerName: "Price", field: "price"}
    ];
    
    // specify the data
    var rowData = [
      {make: "Toyota", model: "Celica", price: 35000},
      {make: "Ford", model: "Mondeo", price: 32000},
      {make: "Porsche", model: "Boxter", price: 72000}
    ];
    
    // let the grid know which columns and what data to use
    var gridOptions = {
      columnDefs: columnDefs,
      rowData: rowData
    };

  // lookup the container we want the Grid to use
  var eGridDiv = document.querySelector(\'#'.$this->options['id'].'\');

  // create the grid passing in the div to use together with the columns & data we want to use
  new agGrid.Grid(eGridDiv, gridOptions);');
    }
}