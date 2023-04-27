<?php

class ResErrorClassMessage
{
    public bool $StatusErr = false;
    public array $errmesage = [];
    public string $ResFunction_Str = '';
    public array $ResFunction_Array = [];

    public function addResFunction_Array($mess)
    {
        if (is_array($mess)) {
            foreach ($mess as $item) {
                array_push($this->errmesage, $item);
            }
        } else {
            $this->errmesage[] = $mess;
        }
    }
}