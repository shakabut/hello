    class SomeController extends Zend_Controller_Action
    {
        /**
         * Redirector - defined for code completion
         *
         * @var Zend_Controller_Action_Helper_Redirector
         */
        protected $_redirector = null;
     
        public function init()
        {
            $this->_redirector = $this->_helper->getHelper('Redirector');
     
            // Set the default options for the redirector
            // Since the object is registered in the helper broker, these
            // become relevant for all actions from this point forward
            $this->_redirector->setCode(303)
                              ->setExit(false)
                              ->setGotoSimple("this-action",
                                              "some-controller");
        }
     
        public function myAction()
        {
            /* do some stuff */
     
            // Redirect to a previously registered URL, and force an exit
            // to occur when done:
            $this->_redirector->redirectAndExit();
            return; // never reached
        }
    }

Example #6 Using Defaults

This example assumes that the defaults are used, which means that any redirect will result in an immediate exit().

    // ALTERNATIVE EXAMPLE
    class AlternativeController extends Zend_Controller_Action
    {
        /**
         * Redirector - defined for code completion
         *
         * @var Zend_Controller_Action_Helper_Redirector
         */
        protected $_redirector = null;
     
        public function init()
        {
            $this->_redirector = $this->_helper->getHelper('Redirector');
        }
     
        public function myAction()
        {
            /* do some stuff */
     
            $this->_redirector
                ->gotoUrl('/my-controller/my-action/param1/test/param2/test2');
            return; // never reached since default is to goto and exit
        }
    }

