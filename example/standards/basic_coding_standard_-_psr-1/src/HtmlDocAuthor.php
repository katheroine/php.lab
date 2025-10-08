<?php

namespace PHPLab\StandardPSR1;

class HtmlDocAuthor
{
    const EMAIL_DOMAIN = 'php.lab';

    public $name = 'Some Author';
    public $email = 'author@' . self::EMAIL_DOMAIN;
}