<?php

	if(!defined('ABSPATH')){
		exit;
	}

	class wpb_crw_widget extends WP_Widget {

		private $data = array();
	
		function __construct() {
			
			parent::__construct(			
				'wpb_avm_crw_widget',  			
				__('Coders Rank Widget', 'wpb_widget_avm_crw_domain'),  			
				array( 'description' => __( 'Shows CodersRank.io badge into your site.', 'wpb_widget_avm_crw_domain' ), ) 
			);
		}
		public function widget( $args, $instance ) 
		{				
			$title = apply_filters( 'widget_title', $instance['title'] );
	
			$username = apply_filters( 'wp_crw_username', $instance['username'] ); 

			echo $args['before_widget'];
	
			if ( ! empty( $title ) )
				echo $args['before_title'] . $title . $args['after_title'];               
	
			$processed = FALSE;
			$ERROR_MESSAGE = '';
?>
	
	    <script src="https://profile.codersrank.io/widget/widget.js"></script>
				
		<div id="contentWidget">		
		    <codersrank-widget username="<?php echo html_entity_decode($username) ?>"></codersrank-widget>
		</div>
		
		<?php	
		echo $args['after_widget'];
	}
			
		// Widget Backend 
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; }	else { $title = ""; }  
			if ( isset( $instance[ 'username' ] ) ) { $username = $instance[ 'username' ]; } else { $username = ""; }
	
	?>
	
	<div style="padding-top:5px;">
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>" style="font-weight:bold;"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" placeholder="Optional" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	</div>
	
	<div style="padding-top:5px;">
		<p>
			<label for="<?php echo $this->get_field_id( 'username' ); ?>" style="font-weight:bold;"><?php _e( 'Username:' ); ?></label> 
			<input class="widefat" placeholder="Username" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" />
		</p>
	</div>

	<div>
		<hr>
	</div>

	
	<?php 
		}
		// end-form
		
		public function update( $new_instance, $old_instance ) {
			$instance = array();
	
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

			$instance['username'] = ( ! empty( $new_instance['username'] ) ) ? htmlspecialchars ( $new_instance['username'], ENT_QUOTES) : '';
	
			return $instance;
		}

		public function set( $name, $value )
    	{
        	$this->data[ $name ] = $value;
    	}

    	public function get( $name )
    	{
        	if ( isset ( $this->data[ $name ] ) )
            	return $this->data[ $name ];

        	return NULL;
		}

	}


	// END-OF-FILE: PHP OPEN TAG FOR SECURITY