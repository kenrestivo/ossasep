<?php
class BreadCrumb extends CWidget {

    public $crumbs = array();
    public $newCrumb = array();
    public $delimiter = ' &rarr; ';
    public $hideCrumbsOnHome = true;
    public $firstCrumbName = false;
    public $firstCrumb = array('Home' => array('name' => 'Home', 'url' => array()));
    public $excludeCrumbs = array('Login');
    public $crumbs2Show = 8;
    public $truncatedCrumb = array('Truncated' => array('name' => '&#8230;'));

    public function run() {

        // if home url is not supplied, use application base url
        if (count($this->firstCrumb['Home']['url'])==0){
            $this->firstCrumb['Home']['url'] = Yii::app()->baseUrl;
        }

        if ($this->firstCrumbName){
            $this->firstCrumb['Home']['name']=$this->firstCrumbName;
        }

        // Breadcrumbs are a way back to to the homepage so dump
        // the crumbs if we find ourselves back on the homepage
        $homepageRoutes = array(
            Yii::app()->baseUrl,
            Yii::app()->baseUrl . '/index.php',
            '/index-dev.php',
            '/index.php',
            '/index-production.php',
            Yii::app()->baseUrl . '/',
            Yii::app()->defaultController.'/list', 
            '/');
        
        if ( in_array($this->newCrumb['url']   , $homepageRoutes)) {
            unset ($_SESSION['crumbs']);

            // If desired, don't show the lone Home crumb on
            // the homepage
            if ($this->hideCrumbsOnHome) {
                return;
            }
        }

        // Place the homepgage anchor crumb in the first position
        $this->crumbs = $this->firstCrumb;

        // Some pages, such as Login, we don't want in the list, so
        // let's exclude them
        if ( !in_array($this->newCrumb['name'], $this->excludeCrumbs)) {

            $this->newCrumb['name'] = str_replace(
                Yii::app()->name . ' -', "",
                $this->newCrumb['name']);

            $newCrumbKey = $this->newCrumb['name'];

            if (!key_exists('crumbs', $_SESSION)) $_SESSION['crumbs'] = array();

            // If we have an existing crumb list, check to see whether
            // the new crumb is already in the list. If so, dump all the
            // crumbs from that crumb position to the end of the list. The
            // purpose of this is to keep the list clean of duplicates.
            if ( sizeof($_SESSION['crumbs']) > 0 ) {
                if ( array_key_exists($newCrumbKey, $_SESSION['crumbs'])) {

                    $offset = $this->array_offset($_SESSION['crumbs'], $newCrumbKey);
                    $_SESSION['crumbs'] = array_slice( $_SESSION['crumbs'], 0, $offset, true);

                }
            }

            // Handle UrlManager->urlSuffix case
//            $this->newCrumb['url'] = rtrim($this->newCrumb['url'][0], Yii::app()->UrlManager->urlSuffix);
            // Finally add the new crumb to the end of the list
            $_SESSION['crumbs'][$newCrumbKey]=$this->newCrumb;

            // If we have more crumbs than we want to display, we'll evict the
            // oldest crumbs from the list. Plus we'll show a truncated crumb
            // so the user has a visual indicator that we are truncating.
            if (sizeof($_SESSION['crumbs']) > $this->crumbs2Show ) {
                array_shift($_SESSION['crumbs']) ;
                $this->crumbs = array_merge($this->crumbs, $this->truncatedCrumb);
            }
        }

        // Ok, we've build the crumb list prefix with the Home crumb and possibly
        // the Truncated crumb. Now lets add the user's crumbs.
        if ( sizeof($_SESSION['crumbs']) > 0 ) {
            $this->crumbs = array_merge($this->crumbs, $_SESSION['crumbs']);
        }

        // display!
        $this->render('BreadCrumb');
    }

    /**
     * Find the integer position of the offset key in the array
     * @param array $array
     * @param string $offset_key
     * @return int
     */
    public function array_offset($array, $offset_key) {
        $offset = 0;
        foreach($array as $key=>$val) {
            if($key == $offset_key)
                return $offset;
            $offset++;
        }
        return -1;
    }
  }
?>