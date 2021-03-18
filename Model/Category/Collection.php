<?php

namespace Model\Category;

class Collection
{
    protected $collectionData = [];

    public function setData($collectionData)
    {
        $this->collectionData = $collectionData;
        return $this;
    }

    public function getData()
    {
        return $this->collectionData;
    }
}
