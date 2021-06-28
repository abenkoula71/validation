<?php
/*
 * This file is part of The Framework Validation Library.
 *
 * (c) Natan Felles <natanfelles@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
return [
	'alpha' => 'El campo {field} sólo requiere caracteres alfabéticos.',
	'alphaNumber' => 'El campo {field} sólo requiere caracteres alfabéticos y numéricos.',
	'number' => 'El campo {field} sólo requiere caracteres numéricos.',
	'uuid' => 'El campo {field} requiere un UUID válido.',
	'timezone' => 'El campo {field} requiere una timezone válida.',
	'base64' => 'El campo {field} requiere una string base64 válida.',
	'md5' => 'El campo {field} requiere un hash MD5 válido.',
	'hex' => 'El campo {field} requiere una string hexadecimal válida.',
	'json' => 'El campo {field} requiere una string JSON válida.',
	'regex' => 'El campo {field} no coincide con el estándar requerido.',
	'notRegex' => 'El campo {field} coincide con un estándar no válido.',
	'email' => 'El campo {field} requiere una dirección de e-mail válida.',
	'in' => 'El campo {field} no tiene un valor permitido.',
	'notIn' => 'El campo {field} tiene un valor no permitido.',
	'ip' => 'El campo {field} requiere una dirección de IP válida.',
	'url' => 'El campo {field} requiere una dirección de URL válida.',
	'datetime' => 'El campo {field} no coincide con el formato datetime requerido.',
	'between' => 'El campo {field} debe estar entre {0} y {1}.',
	'notBetween' => 'El campo {field} no puede estar entre {0} y {1}.',
	'equals' => 'El campo {field} debe ser igual al campo {0}.',
	'notEquals' => 'El campo {field} no puede ser igual al campo {0}.',
	'maxLength' => 'El campo {field} requiere {0} o menos caracteres en tamaño.',
	'minLength' => 'El campo {field} requiere {0} o más caracteres en tamaño.',
	'length' => 'El campo {field} requiere exactamente {0} caracteres en tamaño.',
	'required' => 'Se requiere el campo {field}.',
	'isset' => 'El campo {field} debe enviarse.',
	'latin' => 'El campo {field} sólo requiere caracteres latinos.',
	'uploaded' => 'El campo {field} requiere que se cargue un archivo.',
	'maxSize' => 'El campo {field} requiere un archivo que no exceda el tamaño máximo de {0} kilobytes.',
	'ext' => 'El campo {field} requiere un archivo con una extensión aceptada: {params}.',
	'mimes' => 'El campo {field} requiere un archivo con un tipo MIME aceptado: {params}.',
	'image' => 'El campo {field} requiere una imagen.',
	'maxDim' => 'El campo {field} requiere una imagen que no exceda las dimensiones máximas de {0} de ancho y {1} de alto. ',
	'minDim' => 'El campo {field} requiere una imagen que tenga las dimensiones mínimas de {0} de ancho y {1} de alto.',
	'dim' => 'El campo {field} requiere una imagen con las dimensiones exactas de {0} de ancho y {1} de alto.',
];
