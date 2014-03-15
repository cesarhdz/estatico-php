<?php

namespace Estatico\Documento;

class File implements DocumentFormat
{

    public function isSupported(\SplFileInfo  $argument1)
    {
        return true;
    }
}
