<?php declare(strict_types=1);
/*
 * This file is part of Aplus Framework Validation Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Framework\Validation;

use Framework\Language\Language;

/**
 * Class ValidationGroup.
 *
 * @package validation
 */
abstract class ValidationGroup
{
    abstract public function getRules() : array;

    public function getMessages() : array
    {
        return [];
    }

    public function getLabels() : array
    {
        return [];
    }
}

class UserValidation extends ValidationGroup
{
    protected Language $language;

    public function getRules() : array
    {
        return [
            'name' => Ruler::create()->minLength(5)->maxLength(64),
            'email' => Ruler::create()->email(),
            'birthday' => Ruler::create()->datetime('Y-m-d'),
            'password' => Ruler::create()->minLength(8)->maxLength(255)->specialChar(),
            'confirmPassword' => Ruler::create()->equals('password'),
            'bio' => Ruler::create()->optional()->maxLength(255),
        ];
    }

    public function getLabels() : array
    {
        return [
            'name' => $this->getLabel('name'),
            'email' => $this->getLabel('name'),
        ];
    }

    public function getLabel(string $field) : string
    {
        return $this->language->render('user', $field);
    }

    public function getMessages() : array
    {
        return [
            'name' => [
                'minLength' => 'Min foo baba',
                'maxLength' => 'Max foo baba',
            ],
            'email' => 'E-mail invalido',
        ];
    }

    public function validation() : Validation
    {
        $validation = new Validation();
        $validation->setRules($this->getRules());
        $validation->setMessages($this->getMessages());
        $validation->setLabels($this->getLabels());
        return $validation;
    }
}
