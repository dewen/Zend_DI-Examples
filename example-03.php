<?php

namespace MovieApp {
    class Lister {
        public $finder;
        public function setFinder(Finder $finder){
            $this->finder = $finder;
        }
    }
    class Finder {
    }
}

namespace {
    // bootstrap
    include 'zf2bootstrap' . ((stream_resolve_include_path('zf2bootstrap.php')) ? '.php' : '.dist.php');

    $di = new Zend\Di\Di;
    $di->configure(new Zend\Di\Configuration(array(
        'definition' => array(
            'class' => array(
                'MovieApp\Lister' => array(
                    'setFinder' => array('required' => true)
                )
            )
        )
    )));
    $lister = $di->get('MovieApp\Lister');
    
    // expression to test
    $works = ($lister->finder instanceof MovieApp\Finder);

    // display result
    echo (($works) ? 'It works!' : 'It DOES NOT work!') . PHP_EOL;
}
