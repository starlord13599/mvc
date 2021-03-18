<?php

namespace Model\Admin;

class Collection
{
    protected $data = [];

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
