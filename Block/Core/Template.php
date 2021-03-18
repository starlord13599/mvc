<?php

namespace Block\Core;

class Template
{

    protected $controller = null;
    protected $templateName = null;
    protected $children = [];
    protected $url = null;
    protected $request = null;


    // public function __construct()
    // {
    //     $this->setUrl();
    // }

    public function setTemplate($templateName)
    {
        $this->templateName = $templateName;
        return $this;
    }

    public function getTemplate()
    {
        return $this->templateName;
    }

    public function setChildren(array $children = [])
    {
        $this->children = $children;
        return $this;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function addChild(Template $child, $key = null)
    {
        if (!$key) {
            $key = get_class($child);
        }

        $this->children[$key] = $child;
        return $this;
    }

    public function getChild($key)
    {

        if (!array_key_exists($key, $this->children)) {
            return null;
        }
        return $this->children[$key];
    }

    public function removeChild($key)
    {
        if (array_key_exists($key, $this->children)) {
            unset($this->children[$key]);
        }
        return $this;
    }

    public function createBlock($className)
    {
        return \Mage::getBlock($className);
    }

    public function setUrl()
    {
        $this->url = \Mage::getModel('Model\Core\Url');
        return $this;
    }

    public function getUrl()
    {
        if (!$this->url) {
            $this->setUrl();
        }

        return $this->url;
    }

    public function getMessage()
    {
        return \Mage::getModel('Model\Admin\Message');
    }

    public function setRequest($request = null)
    {
        if (!$request) {
            $request = \Mage::getModel('Model\Core\Request');
        }
        $this->request = $request;
        return $this;
    }

    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest();
        }
        return $this->request;
    }

    public function toHtml()
    {
        ob_start();
        require_once $this->getTemplate();
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
