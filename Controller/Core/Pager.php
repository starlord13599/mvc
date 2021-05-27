<?php

namespace Controller\Core;

class Pager
{
    protected $start = 1;
    protected $end = null;
    protected $currentPage = 1;
    protected $next = null;
    protected $previous = null;
    protected $totalRecords = null;
    protected $recordsPerPage = null;
    protected $noOfPages = null;



    public function setStart($start)
    {
        $this->start = $start;
        return $this;
    }

    public function getStart()
    {
        return $this->start;
    }


    public function setEnd($end)
    {
        $this->end = $end;
        return $this;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }


    public function setNext($next)
    {
        $this->next = $next;
        return $this;
    }

    public function getNext()
    {
        return $this->next;
    }
    public function setPrevious($previous)
    {
        $this->previous = $previous;
        return $this;
    }

    public function getPrevious()
    {
        return $this->previous;
    }

    public function setTotalRecords($totalRecords)
    {
        $this->totalRecords = $totalRecords;
        return $this;
    }

    public function getTotalRecords()
    {
        return $this->totalRecords;
    }

    public function setRecordsPerPage($record)
    {
        $this->recordsPerPage = $record;
        return $this;
    }

    public function getRecordsPerPage()
    {
        return $this->recordsPerPage;
    }

    public function setNoOfPages($data)
    {
        $this->noOfPages = $data;
        return $this;
    }

    public function getNoOfPages()
    {
        return $this->noOfPages;
    }

    public function calculate()
    {
        if ($this->getTotalRecords() <= $this->getRecordsPerPage()) {
            $this->setNoOfPages(1);
            $this->setPrevious(null);
            $this->setNext(null);
            return $this;
        }

        $page = ceil($this->getTotalRecords() / $this->getRecordsPerPage());
        $this->setEnd($page);
        $this->setNoOfPages($page);

        if ($this->getCurrentPage() > $this->getNoOfPages()) {
            $this->setCurrentPage($this->getNoOfPages());
            return $this;
        }

        if ($this->getCurrentPage() < $this->getStart()) {
            $this->setCurrentPage($this->getStart());
            return $this;
        }


        if ($this->getCurrentPage() == $this->getStart()) {
            $this->setPrevious(null);
            $this->setStart(null);

            if ($this->getCurrentPage() <= $this->getNoOfPages()) {
                $this->setNext($this->getCurrentPage() + 1);
            }

            return $this;
        }

        if ($this->getCurrentPage() == $this->getEnd()) {
            $this->setNext(null);
            $this->setEnd(null);

            if ($this->getCurrentPage() >= $this->getNoOfPages()) {
                $this->setPrevious($this->getCurrentPage() - 1);
            }
            return $this;
        }

        if ($this->getCurrentPage() > $this->getStart() && $this->getCurrentPage() < $this->getEnd()) {
            $this->setPrevious($this->getCurrentPage() - 1);
            $this->setNext($this->getCurrentPage() + 1);
            return $this;
        }
    }
}
