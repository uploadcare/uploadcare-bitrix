# 1C-Bitrix plugin for Uploadcare

This is a plugin for [1C-Bitrix][5] to work with [Uploadcare][1]

It's based on a [uploadcare-php][4] library.

## Requirements

- 1C-Bitrix 12.0
- PHP 5.2+
- php-curl

# ENG

## Install 

Clone module from github inside your project:

    git clone git://github.com/uploadcare/uploadcare-bitrix.git bitrix/modules/uploadcare --recursive

Install plugin inside "System Settings" -> "Modules" section.

Follow "System Settings" -> "Module Settings" -> "Uploadcare"

Set your public and secret keys and save settings form.

## Usage

### HTML editor

Add or edit any html-block with html editor.

Press Uploadcare icon. You will see "Uploadcare" widget.

Upload a file using widget and crop it as you like.

### User Property.

There's and "Uploadcare" property you can add to any object.

You can add this field at "Information Block" setting or add it using "User field".

## Contributors

- [@grayhound](https://github.com/grayhound)

## Security issues

If you think you ran into something in Uploadcare libraries
which might have security implications, please hit us up at
[bugbounty@uploadcare.com](mailto:bugbounty@uploadcare.com)
or Hackerone.

We'll contact you personally in a short time to fix an issue
through co-op and prior to any public disclosure.

# RU

## Установка

Установите модуль в свой проект: 

	git clone git://github.com/uploadcare/uploadcare-bitrix.git bitrix/modules/uploadcare --recursive
	
Установите модуль в разделе "Настройка продукта" -> "Модули"

Пройдите в раздел "Настройка продукта" -> "Настройки модулей" -> "Uploadcare".

Установите значения "Public key" и "Secret key".

## Как пользоваться

При редактировании, в визуальном редакторе появится иконка "Uploadcare".

Нажав на неё, вы увидите виджет для загрузки файлов и изображений.

Загрузите файл или изображение, установите видимые границы.

После нажатия на кнопку "Save" изображение или ссылка на файл будут вставлены 
в визуальный редактор.

### Пользовательские поля

Модуль предоставляет возможность создавать пользовательские поля типа "Uploadcare".

Вы можете создать их в разделе "Пользовательские поля".

Поле так же доступно при создании или редактировании свойств информационных блоков.

[1]: https://uploadcare.com/
[2]: https://uploadcare.com/documentation/reference/basic/cdn.html
[4]: https://github.com/uploadcare/uploadcare-php
[5]: http://www.1c-bitrix.ru/
