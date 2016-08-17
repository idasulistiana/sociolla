<!DOCTYPE html>
<div class="container container_company">
<div class="body_loading col-sm-12 ">
	<div class="loading"><div class="loading_text"></div></div>	
</div>	
	<div class="alert alert-danger alert-false col-sm-12" role="alert">
		<span class="alert-message"></span>
		<div class="alert-message-detail"></div>
	</div>
	<div class="alert alert-success alert-true col-sm-12" role="alert">
		<span class="alert-message"></span>
		<div class="alert-message-detail"></div>
	</div>

 <div class="body-form">
	<div class="row">
			<div class="col-md-3">
				<img src="<?php echo base_url();?>assets/images/logo_sociolla.jpg" class="img-responsive" id="img-logo">
			</div>
			<div class="col-sm-5">
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn-lg btn-info btn-submit"> Submit </button>
			</div>
			<div class="col-md-2">
				<button class="btn-lg btn-primary btn-cancel"> Cancel </button>
			</div>
	</div>
	<div class="row ">
	 <div class="row-form" id="company_profile">
		<div class="col-md-6">
			<form role="form" id="form-company-profile">
				<div class="form-group">
					<label for="name"> Name </label>
					<input type="text" class="form-control input" id="name" required>
				</div>
				<div class="form-group">
					<label for="description"> Description </label>
					<textarea class="form-control input" id="description" row="8" ></textarea>
				</div> 
				<div class="form">
					<fieldset class="address">
						<legend>Address</legend>
						<div class="form-group">
							<label for="street">Street</label>
							<input type="text" class="form-control input" id="street">
						</div>
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" class="form-control input" id="city">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="province">Province</label>
									<select class="form-control input" id="province">
										<option selected="" value="">Province</option>
										<option value="west java">West Java</option>
										<option value="east java">East Java</option>
										<option value="central java">Central Java</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="city">Postal Code</label>
									<input type="number" class="form-control input" id="postal">
								</div>
							</div>
						</div>
					</fieldset>
				</div>

			</form>
		</div>  
		
		<div class="col-md-6">
			<form role="form" id="form-contact">
				<fieldset class="ask_us">
					<legend>Ask Us</legend>
					<div class="col-md-4">
						<div class="form-group">
							<label for="division">Division</label>
							<select class="form-control input_ask_us" id="division">
								<option selected="" value="">===Select===</option>
								<option value="technology">Technology</option>
								<option value="communication">Communication</option>
							</select>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<label for="name_askus">Name</label>
						<input type="text" class="form-control input_ask_us" id="name_ask_us">
					</div>
					<div class="form-group">
						<label for="question">Question</label>
						<textarea class="form-control input_ask_us" id="question" row="8"></textarea>
					</div>
						<input type="button" class="btn btn-md btn-primary btn-send-ask-us" value="Send">
				</fieldset>
			</form>
		</div>
	</div>
</div>
</div>
</div>