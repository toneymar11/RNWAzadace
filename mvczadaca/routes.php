<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
	  case 'djelatnici':
        require_once('models/djelatnik.php');
		$controller = new DjelatniciController();
      break;
	   case 'zupanija':
        require_once('models/zupanija.php');
		$controller = new ZupanijaController();
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' 		=> ['home', 'error'],
                       'posts' 		=> ['index', 'show', 'editpost', 'deletepost', 'createpost', 'uredipost'],
					   'djelatnici' => ['index', 'show', 'deletedjelatnik', 'createdjelatnik', 'editdjelatnik', 'uredidjelatnik'],
					   'zupanija' 	=> ['index', 'show','deletezupanija', 'createzupanija', 'editzupanija', 'uredizupanija']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>