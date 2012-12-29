# 1C-Bitrix plugin for Uploadcare

This is a plugin for [1C-Bitrix][5] to work with [Uploadcare][1]

It's based on a [uploadcare-php][4] library.

## Requirements

- 1C-Bitrix 12.0
- PHP 5.2+
- php-curl

## Install 

Clone module from github inside your project:

    git clone git://github.com/uploadcare/uploadcare-bitrix.git bitrix/modules/uploadcare --recursive

Install plugin inside "System Settings" -> "Modules" section.

Follow "System Settings" -> "Module Settings" -> "Uploadcare"

Set your public and secret keys and save settings form.

## Usage

Add or edit any html-block with html editor.

Press Uploadcare icon. You will see, that new window "Uploadcare".

Upload a file using widget and press "Store File". 

When the file is stored a new page with file operations will be available.

Apply operations and press "Insert". The image will be inserted in your post.

[More information on file operations can be found here][2]

[1]: https://uploadcare.com/
[2]: https://uploadcare.com/documentation/reference/basic/cdn.html
[4]: https://github.com/uploadcare/uploadcare-php
[5]: http://www.1c-bitrix.ru/