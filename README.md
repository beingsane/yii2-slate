#Yii2 Slate Controller

## About

This project is build dynamic way files MarkDown to [Slate](https://github.com/lord/slate) documentation through of a controller. 

You don´t need to build your slate documentation before. This is done runtime.

> ADVICE: Use [pahanini/yii2-rest-doc](https://github.com/pahanini/yii2-rest-doc) to make you MarkDown file dynamically.

## Install

- Add `"dalencar/yii2-slate": "*"` to required section of your composer.json  
- Add in your controller a action. For example, `DocController` with a action named `api`

``` php
public function actions()
{
    return [
        'api' => [
            'class' => 'dalencar\slate\SlateAction',
            'sourceBase' => '@backend/views/doc/api',
            'configFile' => '@backend/views/doc/api/config.json',
        ],
    ];
}

```

- Copy Slate templates

Copy all files and folders from you `vendor/dalencar/yii2-slate/view` to you controller's action's folder, for example `views/doc/api`.  

    /fonts
    /images
    /includes
    /javascripts
    /stylesheets
    apis.md [will be created dynamically]
    authentication.md
    introduction.md
    config.json
     
- Set `config.json` file      
     
```
{
    "title": "API Reference",
    "language_tabs": ["bash", "javascript"],
    "toc_footers": [],
    "search": true,
    "menu": [
        "introduction",
        "authentication",
        "apis"
    ],
    "menu_includes": [
        "errors"
    ],
    "custom": {
        "BASE_URL": "http://localhost"
    }
}
```     
