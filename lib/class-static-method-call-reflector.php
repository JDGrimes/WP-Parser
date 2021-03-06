<?php

/**
 * A reflection class for a method call.
 */

namespace WP_Parser;

use phpDocumentor\Reflection\BaseReflector;

/**
 * A reflection of a method call expression.
 */
class Static_Method_Call_Reflector extends Method_Call_Reflector {

	/**
	 * Returns the name for this Reflector instance.
	 *
	 * @return string[] Index 0 is the class name, 1 is the method name.
	 */
	public function getName() {
		$class = $this->node->class->parts[0];

		if ( $this->called_in_class ) {
			if ( 'self' === $class ) {
				$class = $this->called_in_class->getShortName();
			} elseif ( 'parent' === $class ) {
				$class = $this->called_in_class->getNode()->extends;
			}
		}

		return array( $class, $this->getShortName() );
	}
}
