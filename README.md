<p> 
<h4>Hello! My name is Alexander Bashtanov</h4>
    <br>
    The simple Task Tracker is a laconic, functional and free service for project management.<br>
    <br>Laconic. Nothing should distract from project implementation. This is the basis for focused work on tasks.<br>
    <br>Functional. The necessary functions to control the development of projects and their tasks are ready out of the box.<br>
    <br>Free. Use of this service is completely free. All the time.<br><br>
    </p>
<p>   
        During the development of the simple Task Tracker application, the following features of Yii2 advanced template were used.
        <br>
        <br> 1. The current time at the main page renders with PJAX.
       <br> 2. RBAC and ACF access filters is applied.
       <br> 3. PHP Unit test controls code algorithm.
       <br> 4. The Chat based on websocket technology is implemented on the Task page. Each Task has it's own Chat with unique history saved in data base.
       <br>  5. Each project has it's own tasks.
       <br>  6. Restful API functionality is implemented to obtain information about Tasks and to manage only user's tasks (by login and password).
       <br>  7. Helpers are also applied in the code. 
</p>

<p>
If you have any questions, please contact me: alexandr211@yandex.ru<br>
        <br> Thank you.<br>
</p>

<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
