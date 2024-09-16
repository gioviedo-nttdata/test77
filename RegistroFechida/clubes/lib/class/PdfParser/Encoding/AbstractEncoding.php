<?php

namespace PdfParser\Encoding;

abstract class AbstractEncoding
{
    abstract public function getTranslations(): array;
}
