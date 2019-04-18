# yii2-widget-ag-grid
This extension provides the [agGrid](https://www.ag-grid.com/) integration for the Yii2 framework.

### Requirements

The minimum requirement by yii2-widget-ag-grid that your Web server supports PHP 7.1.

### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Run

```
$ php composer.phar require schmasterz-v/yii2-widget-ag-grid "master@dev"
```

### Usage

```php
<?= \schmasterz\agGrid\AgGridWidget::widget([
        'id' => 'ag-grid',
        'options' => [
            'style' => 'height: 600px;width:500px;'
        ],
        'gridOptions' => [
            'columnDefs' => [
                ['headerName' => 'Make', 'field' => 'make', 'sortable' => true],
                ['headerName' => 'Model', 'field' => 'model', 'sortable' => true],
                ['headerName' => 'Price', 'field' => 'price', 'sortable' => true],
            ],
            
        ]
     ]);
?>
```
You can also use agGrid in the JavaScript layer of your application. To achieve this, you need to include agGrid as a dependency of your Asset file
```php
public $depends = [
    'schmasterz\agGrid\AgGridAsset',
];
```
or add it to your view file
```php
schmasterz\agGrid\AgGridAsset::register($this);
```


