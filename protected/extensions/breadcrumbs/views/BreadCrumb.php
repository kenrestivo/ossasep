<div id="BreadCrumb">
    <?php

    $lastCrumb = array_pop($this->crumbs);
    
    foreach($this->crumbs as $crumb) {
        
        if(isset($crumb['url']) ){
            echo CHtml::link($crumb['name'], $crumb['url']);
        } else {
            echo $crumb['name'];
        }

        echo $this->delimiter;

    }
    echo $lastCrumb['name'];
    ?>
</div>