<div id="leftHtml"></div>


<?php

$children = $this->getChildren();

foreach ($children as $child) {
    echo $child->toHtml();
}
