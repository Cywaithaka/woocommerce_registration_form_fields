<?php

/*
  Plugin Name: Woocommerce Registration Form Fields
  Plugin URI: 
  Description: Add fields to woocommerce fields registration form.
  Version: 1.0.0
  Author: Cyrus Waithaka
  Author URI: exploredatasystems.com
 */
 
 
/**
 * Add new register fields for WooCommerce registration.
 *
 * @return string Register fields HTML.
 */
function wooc_extra_register_fields() {
	?>

	<p class="form-row form-row-first">
	<label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
	</p>

	<p class="form-row form-row-last">
	<label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
	</p>
	
	<div class="clear"></div>

	<p class="form-row form-row-wide">
	<label for="reg_billing_phone"><?php _e( 'Telephone', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />
	</p>

	<p class="form-row form-row-first">
	<label for="reg_billing_address_1"><?php _e( 'Address', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_address_1" id="reg_billing_address_1" value="<?php if ( ! empty( $_POST['billing_address_1'] ) ) esc_attr_e( $_POST['billing_address_1'] ); ?>" />
	</p>

	<p class="form-row form-row-last">
	<label for="reg_billing_postcode"><?php _e( 'Postal / Zip Code', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php if ( ! empty( $_POST['billing_postcode'] ) ) esc_attr_e( $_POST['billing_postcode'] ); ?>" />
	</p>

	<p class="form-row form-row-first">
	<label for="reg_billing_city"><?php _e( 'City', 'woocommerce' ); ?> <span class="required">*</span></label>
	<input type="text" class="input-text" name="billing_city" id="reg_billing_city" value="<?php if ( ! empty( $_POST['billing_city'] ) ) esc_attr_e( $_POST['billing_city'] ); ?>" />
	</p>

	<p class="form-row form-row-last">
	<label for="reg_billing_state"><?php _e( 'State', 'woocommerce' ); ?> <span class="required">*</span></label>
	<select class="state_select" name="billing_state" id="reg_billing_state">
	<option value="">Select the state</option>
	<option value="Île-de-france">Île-de-France</option>
<option value="berry">Berry</option>
<option value="orléanais">Orléanais</option>
<option value="normandie">Normandie</option>
<option value="languedoc">Languedoc</option>
<option value="lyonnais">Lyonnais</option>
<option value="dauphiné">Dauphiné</option>
<option value="champagne">Champagne</option>
<option value="aunis">Aunis</option>
<option value="saintonge">Saintonge</option>
<option value="poitou">Poitou</option>
<option value="guyenneetgascogne">Guyenne et Gascogne</option>
<option value="bourgogne">Bourgogne</option>
<option value="picardie">Picardie</option>
<option value="anjou">Anjou</option>
<option value="provence">Provence</option>
<option value="angoumois">Angoumois</option>
<option value="bourbonnais">Bourbonnais</option>
<option value="marche">Marche</option>
<option value="bretagne">Bretagne</option>
<option value="maine">Maine</option>
<option value="touraine">Touraine</option>
<option value="limousin">Limousin</option>
<option value="comtédefoix">Comté de Foix</option>
<option value="auvergne">Auvergne</option>
<option value="béarn">Béarn</option>
<option value="alsace">Alsace</option>
<option value="artois">Artois</option>
<option value="roussillon">Roussillon</option>
<option value="flandrefrançaiseethainautfrançais">Flandre française et Hainaut français</option>
<option value="franche-comté">Franche-Comté</option>
<option value="lorraine">Lorraine</option>
<option value="trois-Évêchés">Trois-Évêchés</option>
<option value="corse">Corse</option>
<option value="nivernais">Nivernais</option>
	</select>
	</p>
	
	<p class="form-row  form-row-wide">
	<input type="checkbox" class="input-checkbox" name="agent_confirm" id="reg_agent_confirm" value="<?php if ( ! empty( $_POST['agent_confirm'] ) ) esc_attr_e( $_POST['agent_confirm'] ); ?>" />
	<label for="agent_confirm" class="inline"><?php _e( 'Je confirme que je suis majeur', 'woocommerce' ); ?> <span class="required">*</span></label></p>
	<?php
}

add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );

/**
 * Validate the extra register fields.
 *
 * @param  string $username          Current username.
 * @param  string $email             Current email.
 * @param  object $validation_errors WP_Error object.
 *
 * @return void
 */
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
	if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
		$validation_errors->add( 'billing_first_name_error', __( 'Nombre es un campo requerido.', 'woocommerce' ) );
	}

	if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
		$validation_errors->add( 'billing_last_name_error', __( 'Apellidos es un campo requerido.', 'woocommerce' ) );
	}

	if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {
		$validation_errors->add( 'billing_phone_error', __( 'Teléfono es un campo requerido.', 'woocommerce' ) );
	}

	if ( isset( $_POST['billing_address_1'] ) && empty( $_POST['billing_address_1'] ) ) {
		$validation_errors->add( 'billing_address_1_error', __( 'Dirección es un campo requerido.', 'woocommerce' ) );
	}

	if ( isset( $_POST['billing_postcode'] ) && empty( $_POST['billing_postcode'] ) ) {
		$validation_errors->add( 'billing_postcode_error', __( 'Código postal / Zip es un campo requerido.', 'woocommerce' ) );
	}

	if ( isset( $_POST['billing_city'] ) && empty( $_POST['billing_city'] ) ) {
		$validation_errors->add( 'billing_city_error', __( 'Localidad / Ciudad es un campo requerido.', 'woocommerce' ) );
	}

	if ( isset( $_POST['billing_state'] ) && empty( $_POST['billing_state'] ) ) {
		$validation_errors->add( 'billing_state', __( 'Provincia es un campo requerido.', 'woocommerce' ) );
	}
	
	if ( isset( $_POST['agent_confirm'] ) && empty( $_POST['agent_confirm'] ) ) {
		$validation_errors->add( 'agent_confirm', __( 'Je confirme que je suis majeur.', 'woocommerce' ) );
	}
}

add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );

/**
 * Save the extra register fields.
 *
 * @param  int  $customer_id Current customer ID.
 *
 * @return void
 */
function wooc_save_extra_register_fields( $customer_id ) {
	if ( isset( $_POST['billing_first_name'] ) ) {
		// WordPress default first name field.
		update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );

		// WooCommerce billing first name.
		update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}

	if ( isset( $_POST['billing_last_name'] ) ) {
		// WordPress default last name field.
		update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );

		// WooCommerce billing last name.
		update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
	}

	if ( isset( $_POST['billing_phone'] ) ) {
		// WooCommerce billing phone
		update_user_meta( $customer_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
	}

	if ( isset( $_POST['billing_address_1'] ) ) {
		// WooCommerce billing address
		update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
	}

	if ( isset( $_POST['billing_postcode'] ) ) {
		// WooCommerce billing postcode
		update_user_meta( $customer_id, 'billing_postcode', sanitize_text_field( $_POST['billing_postcode'] ) );
	}

	if ( isset( $_POST['billing_city'] ) ) {
		// WooCommerce billing city
		update_user_meta( $customer_id, 'billing_city', sanitize_text_field( $_POST['billing_city'] ) );
	}

	if ( isset( $_POST['billing_state'] ) ) {
		// WooCommerce billing state
		update_user_meta( $customer_id, 'billing_state', sanitize_text_field( $_POST['billing_state'] ) );
	}
	
	if ( isset( $_POST['agent_confirm'] ) ) {
		// WooCommerce age confirmation (I am an adult)
		update_user_meta( $customer_id, 'agent_confirm', sanitize_text_field( $_POST['agent_confirm'] ) );
	}
}

add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );