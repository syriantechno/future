<?php include('../../../ultra.php'); ?>
<?php get_header(); ?>
<?php
add_page_info( 'title', 'الخيارات العامة' );
add_page_info( 'nav', array('name'=>'خيارات', 'url'=>get_site_url('admin/system/')) );
add_page_info( 'nav', array('name'=>'الخيارات العامة') );
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs til-nav-page" role="tablist">
  <li role="presentation" class="active"><a href="#general" id="general-tab" aria-controls="general" role="tab" data-toggle="tab" aria-expanded="false">عامة</a></li>

  <li role="presentation" class=""><a href="#mail" id="mail-tab" aria-controls="mail" role="tab" data-toggle="tab" aria-expanded="false">البريد</a></li>

</ul>


<!-- Tab panes -->
<div class="tab-content">

	<!--/ General /-->
  <div role="tabpanel" class="tab-pane fade in active" id="general" aria-labelledby="general-tab">
  	<?php
  		if ( isset($_POST['company']) ) {
  			if ( update_option('company', json_encode_utf8($_POST['company'])) ) {
          add_alert('تحديث معلومات الشركة!', 'success', 'company');
  			}
  		}

  		$_company = get_option('company');
  		if ( empty($_company) ) {$_company = (object) array('name' => '', 'address' => '', 'district' => '', 'city' => '', 'country' => '', 'email' => '', 'phone' => '', 'gsm' => '' , 'currency' => '' , 'price1' => '' , 'price2' => '' , 'price4' => '' , 'price5' => '' , 'price6' => ''); }
  	?>

		<form action="#general" method="post" autocomplete="off">
			<div class="form-group">
	  			<div class="row">
	  				<div class="col-md-7">
	  					<?php print_alert('company'); ?>
	  				</div><!--/ .col-md-5 /-->
	  			</div><!--/ .row /-->
	  		</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="company[name]">اسم الشركة</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="company[name]" id="company[name]" value="<?php echo $_company->name; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="company[email]">البريد الالكتروني</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="company[email]" id="company[email]" value="<?php echo $_company->email; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="company[phone]">رقم التلفون</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="company[phone]" id="company[phone]" value="<?php echo $_company->phone; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="company[gsm]">رقم المحمول</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="company[gsm]" id="company[gsm]" value="<?php echo $_company->gsm; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="company[address]">العنوان</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="company[address]" id="company[address]" value="<?php echo $_company->address; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="company[district]">المحافظة</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="company[district]" id="company[district]" value="<?php echo $_company->district; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="company[city]">المدينة</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="company[city]" id="company[city]" value="<?php echo $_company->city; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="company[country]">البلد</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="company[country]" id="company[country]" value="<?php echo $_company->country; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->
			
			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="company[currency]">العملة</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="company[currency]" id="company[currency]" value="<?php echo $_company->currency; ?>" class="form-control">

					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->
            <div class="form-group">

            </div><!--/ .form-group /-->

			<div class="form-grouo">
				<div class="row">
					<div class="col-md-7">
                        <button type="submit" class="btn btn-primary btn-icon btn-lg "><i class="fa fa-rocket"></i>  حــــفــــــظ  </button>
					</div><!--/ .col-md-7 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->
		</form>

  </div><!--/ .tab-panel /-->
  <!--/ General /-->

    


  <div role="tabpanel" class="tab-pane" id="accounts" aria-labelledby="accounts-tab">
  		<?php
	  		if ( isset($_POST['account_print_barcode']) ) {
	  			if ( update_option('account_print_barcode', json_encode_utf8($_POST['account_print_barcode'])) ) {
	          		add_alert('Ayarlar kayıt edildi.', 'success', 'company');
	  			}

	  			update_option('account_print_address', json_encode_utf8($_POST['account_print_address']));
	  			update_option('account_print_cargo', json_encode_utf8($_POST['account_print_cargo']));
	  		}

	  		$account_print_barcode 	= get_option('account_print_barcode');
	  		$account_print_address 	= get_option('account_print_address');
	  		$account_print_cargo 	= get_option('account_print_cargo');
	  	?>

		<form action="#accounts" method="post" autocomplete="off">
			<div class="form-group">
	  			<div class="row">
	  				<div class="col-md-7">
	  					<?php print_alert('company'); ?>
	  				</div><!--/ .col-md-5 /-->
	  			</div><!--/ .row /-->
	  		</div><!--/ .form-group /-->

	  		<h4 class="module-title">الباركود <small class="text-muted block fs-12 mt-5">أحجام الطباعة الباركود فقط لبطاقات حساب، وعادة ما يفضل الطابعات الباركود. <br /> ادخل القياسات بال (mm).</small></h4>
			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="account_print_barcode-width">العرض والطول <small>(mm)</small></label>
						<input type="hidden" name="account_print_address[unit]" value="mm">
					</div><!--/ .col-md-2 /-->

					<div class="col-md-2">
						<input type="number" name="account_print_barcode[width]" id="account_print_barcode-width" value="<?php echo $account_print_barcode->width; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

					<div class="col-md-2">
						<input type="number" name="account_print_barcode[height]" id="account_print_barcode-height" value="<?php echo $account_print_barcode->height; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="h-20"></div>
			<h4 class="module-title">بطاقة العنوان <small class="text-muted block fs-12 mt-5">أحجام الطباعة بطاقة العنوان لبطاقات المحاسبة، وعادة ما يفضل طابعات الباركود. <br /> ادخل القياسات بال (mm).</small></h4>
			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="account_print_address-width">العرض والطول <small>(mm)</small></label>
						<input type="hidden" name="account_print_address[unit]" value="mm">
					</div><!--/ .col-md-2 /-->

					<div class="col-md-2">
						<input type="number" name="account_print_address[width]" id="account_print_address-width" value="<?php echo $account_print_address->width; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

					<div class="col-md-2">
						<input type="number" name="account_print_address[height]" id="account_print_address-height" value="<?php echo $account_print_address->height; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="h-20"></div>
			<h4 class="module-title">Kargo Barkodu <small class="text-muted block fs-12 mt-5">أحجام الطباعة الباركود البضائع لبطاقات الحساب، وعادة ما يفضل الطابعات الباركود. <br />ادخل القياسات بال (mm).</small></h4>
			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="account_address_print_width">العرض والطول <small>(mm)</small></label>
						<input type="hidden" name="account_print_cargo[unit]" value="mm">
					</div><!--/ .col-md-2 /-->

					<div class="col-md-2">
						<input type="number" name="account_print_cargo[width]" id="account_print_cargo-width" value="<?php echo $account_print_cargo->width; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

					<div class="col-md-2">
						<input type="number" name="account_print_cargo[height]" id="account_print_cargo-height" value="<?php echo $account_print_cargo->height; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="h-20"></div>
			<div class="form-grouo">
				<div class="row">
					<div class="col-md-7">
						<input type="hidden" name="update_setting_account">
                        <button type="submit" class="btn btn-primary btn-icon btn-lg "><i class="fa fa-rocket"></i>  حــــفــــــظ  </button>
					</div><!--/ .col-md-7 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->
		</form>
  		<!--/ Acoount /-->

  </div><!--/ .tab-panel /-->


  <div role="tabpanel" class="tab-pane" id="items" aria-labelledby="items-tab">

  		<?php
	  		if ( isset($_POST['update_setting_item']) ) {
	  			if ( update_option('item_print_barcode', json_encode_utf8($_POST['item_print_barcode'])) ) {
	          		add_alert('Ayarlar kayıt edildi.', 'success', 'company');
	  			}

	  			update_option('item_print_barcode_price', json_encode_utf8($_POST['item_print_barcode_price']));
	  		}

	  		$item_print_barcode 	= get_option('item_print_barcode');
	  		$item_print_barcode_price 	= get_option('item_print_barcode_price');
	  	?>

		<form action="#items" method="post" autocomplete="off">
			<div class="form-group">
	  			<div class="row">
	  				<div class="col-md-7">
	  					<?php print_alert('company'); ?>
	  				</div><!--/ .col-md-5 /-->
	  			</div><!--/ .row /-->
	  		</div><!--/ .form-group /-->

	  		<h4 class="module-title">الباركود <small class="text-muted block fs-12 mt-5">لبطاقات المنتج أحجام الطباعة الباركود فقط، والطابعات الباركود عادة، ويفضل. <br /> ادخل القياسات بال (mm).</small></h4>
			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="item_print_barcode-width">العرض والطول <small>(mm)</small></label>
						<input type="hidden" name="item_print_barcode[unit]" value="mm">
					</div><!--/ .col-md-2 /-->

					<div class="col-md-2">
						<input type="number" name="item_print_barcode[width]" id="item_print_barcode-width" value="<?php echo $item_print_barcode->width; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

					<div class="col-md-2">
						<input type="number" name="item_print_barcode[height]" id="item_print_barcode-height" value="<?php echo $item_print_barcode->height; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="h-20"></div>
			<h4 class="module-title">باركود الاسعار <small class="text-muted block fs-12 mt-5">أحجام الطباعة الباركود جنبا إلى جنب مع سعر بطاقات المنتج، وعادة ما يفضل الطابعات الباركود. <br /> ادخل القياسات بال (mm).</small></h4>
			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						<label for="item_print_barcode_price-width">العرض والطول <small>(mm)</small></label>
						<input type="hidden" name="item_print_barcode_price[unit]" value="mm">
					</div><!--/ .col-md-2 /-->

					<div class="col-md-2">
						<input type="number" name="item_print_barcode_price[width]" id="item_print_barcode_price-width" value="<?php echo $item_print_barcode_price->width; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

					<div class="col-md-2">
						<input type="number" name="item_print_barcode_price[height]" id="item_print_barcode_price-height" value="<?php echo $item_print_barcode_price->height; ?>" class="form-control digits">
					</div><!--/ .col-* /-->

				</div><!--/ .row /-->
			</div><!--/ .form-group /-->


			<div class="h-20"></div>
			<div class="form-grouo">
				<div class="row">
					<div class="col-md-7">
						<input type="hidden" name="update_setting_item">
                        <button type="submit" class="btn btn-primary btn-icon btn-lg "><i class="fa fa-rocket"></i>  حــــفــــــظ  </button>
					</div><!--/ .col-md-7 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->
		</form>
  		<!--/ Product /-->

  </div><!--/ .tab-panel /-->



  <div role="tabpanel" class="tab-pane" id="forms" aria-labelledby="forms-tab">

  		<!--/ Forms /-->

  </div><!--/ .tab-panel /-->







  <div role="tabpanel" class="tab-pane" id="person" aria-labelledby="person-tab">

  		<!--/ Person /-->

  </div><!--/ .tab-panel /-->
  
  
  

  <div role="tabpanel" class="tab-pane" id="mail" aria-labelledby="mail-tab">
  	<?php
  		if ( isset($_POST['mail']) ) {
  			if ( update_option('mail', json_encode_utf8($_POST['mail'])) ) {
  				add_alert('Mail Ayarları Güncellendi.', 'success', 'mail');
  			}
  		}

  		$_mail = get_option('mail');
  		if ( empty($_mail) ) { $_mail = (object) array('send_address' => '', 'host' => '', 'port' => '', 'password' => ''); }
  	?>

  	<form action="#accounts" method="post" autocomplete="off">
  		<div class="form-group">
  			<div class="row">
  				<div class="col-md-7">
  					<?php print_alert('mail'); ?>
  				</div><!--/ .col-md-5 /-->
  			</div><!--/ .row /-->
  		</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
						<div class="col-md-2">
						<label for="mail[send_address]">من البريد الإلكتروني</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="mail[send_address]" id="mail[send_address]" value="<?php echo $_mail->send_address; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
						<div class="col-md-2">
						<label for="mail[host]">خادم البريد</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="mail[host]" id="mail[host]" value="<?php echo $_mail->host; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
						<div class="col-md-2">
						<label for="mail[port]">المنفذ</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="mail[port]" id="mail[port]" value="<?php echo $_mail->port; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-group">
				<div class="row">
						<div class="col-md-2">
						<label for="mail[password]">كلمة المرور</label>
					</div><!--/ .col-md-2 /-->

					<div class="col-md-5">
						<input type="text" name="mail[password]" id="mail[password]" value="<?php echo $_mail->password; ?>" class="form-control">
					</div><!--/ .col-md-5 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

			<div class="form-grouo">
				<div class="row">
					<div class="col-md-7">
                        <button type="submit" class="btn btn-primary btn-icon btn-lg "><i class="fa fa-rocket"></i>  حــــفــــــظ  </button>
					</div><!--/ .col-md-7 /-->
				</div><!--/ .row /-->
			</div><!--/ .form-group /-->

		</form>

  </div><!--/ .tab-panel /-->
</div><!--/ .tab-content /-->
<?php get_footer(); ?>
