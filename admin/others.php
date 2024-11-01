<?php
$advcontent = '';


 Redux::setSection( $opt_name, array(
        'title'            => __( 'Themes & Plugins', 'redux-framework-demo' ),
        'desc'             => __( '', 'redux-framework-demo' ),
        'id'               => 'alborotado-options-fields',
        'subsection'       => false,
        'customizer_width' => '700px',
        'fields'           => array(
            array(
				'id'       => 'advertise-alborotado',
				'type'     => 'raw',
				'title'    => __('Other themes & plugins made by Miguras', 'redux-framework-demo'),
				'subtitle' => __('', 'redux-framework-demo'),
				'desc'     => __('', 'redux-framework-demo'),
				'content'  => $advcontent,
			),
        )
    ) );
?>
