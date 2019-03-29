<?php
namespace schmasterz\agGrid;
use yii\web\AssetBundle;

class AgGridAsset extends AssetBundle
{
    public $sourcePath = '@bower/ag-grid/dist';
    public $js = [
        'ag-grid-community.js'
    ];
    public $css = [
        'styles/ag-grid.css',
        'styles/ag-theme-material.css',
        'styles/ag-theme-bootstrap.css',
        'styles/ag-theme-balham.css',
        'styles/ag-theme-balham-dark.css',
        'styles/ag-theme-fresh',
        'styles/ag-theme-blue',
        'styles/compiled-icons.css'
    ];
}