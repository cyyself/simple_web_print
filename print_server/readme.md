# Print Server

A server running on Windows Machine connected to printer.

`PDFtoPrinter.exe` binary is from [http://www.columbia.edu/~em36/pdftoprinter.html](http://www.columbia.edu/~em36/pdftoprinter.html)

## 1. Requirements

1. pandoc
2. miktex
3. php

All these requirements can be installed by `choco install`.

## 2. Configure

See `config.php`

## 3. Running

```
cd $this_path
php -S 0.0.0.0:2333
```
