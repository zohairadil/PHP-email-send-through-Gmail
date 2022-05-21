								<form action="code.php" method="post">
									<div class="form-group">
										<input type="text" name="name" placeholder="Enter Your Name" class="form-control" required="required" onkeypress="return Validate_name(event);">
									</div>
									<div class="form-group">
										<input type="email" name="email" placeholder="Enter Your Email Address" class="form-control" required="required" onkeypress="return Validate_email(event);">
									</div>
									<div class="form-group">
										<input type="number" name="subject" placeholder="Enter Your Phone No" class="form-control" required="required" onkeypress="return Validate_number(event);">
									</div>
									<div class="form-group">
										<input type="text" name="message" placeholder="Enter Your Topic" class="form-control" required="required" onkeypress="return Validate_name(event);">
									</div>
									<div class="form-group">
										<button type="submit" class="ban_btn" name="banner_btn">Submit</button>
									</div>
								</form>