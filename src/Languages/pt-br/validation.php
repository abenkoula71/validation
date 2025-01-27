<?php
/*
 * This file is part of Aplus Framework Validation Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
return [
    'alpha' => 'O campo {field} requer apenas caracteres alfabéticos.',
    'alphaNumber' => 'O campo {field} requer apenas caracteres alfabéticos e numéricos.',
    'number' => 'O campo {field} requer apenas caracteres numéricos.',
    'uuid' => 'O campo {field} requer um UUID válido.',
    'timezone' => 'O campo {field} requer uma timezone válida.',
    'base64' => 'O campo {field} requer uma string base64 válida.',
    'md5' => 'O campo {field} requer um hash MD5 válido.',
    'hex' => 'O campo {field} requer uma string hexadecimal válida.',
    'hexColor' => 'O campo {field} requer uma cor hexadecimal válida.',
    'json' => 'O campo {field} requer uma string JSON válida.',
    'regex' => 'O campo {field} não corresponde ao padrão requerido.',
    'notRegex' => 'O campo {field} corresponde a um padrão inválido.',
    'email' => 'O campo {field} requer um endereço de e-mail válido.',
    'greater' => 'O campo {field} deve ser maior que {0}.',
    'greaterOrEqual' => 'O campo {field} deve ser maior ou igual a {0}.',
    'less' => 'O campo {field} deve ser menor que {0}.',
    'lessOrEqual' => 'O campo {field} deve ser menor ou igual a {0}.',
    'in' => 'O campo {field} não possui um valor permitido.',
    'notIn' => 'O campo {field} possui um valor não permitido.',
    'ip' => 'O campo {field} requer um endereço de IP válido.',
    'url' => 'O campo {field} requer um endereço de URL válido.',
    'datetime' => 'O campo {field} não corresponde ao formato de datetime requerido.',
    'between' => 'O campo {field} deve estar entre {0} e {1}.',
    'notBetween' => 'O campo {field} não pode estar entre {0} e {1}.',
    'equals' => 'O campo {field} deve ser igual ao campo {0}.',
    'notEquals' => 'O campo {field} não pode ser igual ao campo {0}.',
    'maxLength' => 'O campo {field} requer {0} ou menos caracteres no tamanho.',
    'minLength' => 'O campo {field} requer {0} ou mais caracteres no tamanho.',
    'length' => 'O campo {field} requer exatamente {0} caracteres no tamanho.',
    'required' => 'O campo {field} é requerido.',
    'isset' => 'O campo {field} deve ser enviado.',
    'latin' => 'O campo {field} requer apenas caracteres latinos.',
    'uploaded' => 'O campo {field} requer que um arquivo seja carregado.',
    'maxSize' => 'O campo {field} requer um arquivo que não exceda o tamanho máximo de {0} kilobytes.',
    'ext' => 'O campo {field} requer um arquivo com uma extensão aceita: {args}.',
    'mimes' => 'O campo {field} requer um arquivo com um tipo MIME aceito: {args}.',
    'image' => 'O campo {field} requer uma imagem.',
    'maxDim' => 'O campo {field} requer uma imagem que não exceda as dimensões máximas de {0} de largura e {1} de altura.',
    'minDim' => 'O campo {field} requer uma imagem que possua as dimensões mínimas de {0} de largura e {1} de altura.',
    'dim' => 'O campo {field} requer uma imagem com as dimensões exatas de {0} de largura e {1} de altura.',
    'specialChar' => 'O campo {field} requer caracteres especiais.',
];
