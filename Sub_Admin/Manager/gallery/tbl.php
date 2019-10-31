<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<button type="submit" class="btn btn-success" name="create"><i class="fa fa-plus-square">&nbsp; Create New <?php echo ucfirst($type);?></i></button>
           <br><br>             <div class="input-group">
							<input class="form-control" type="text">
							<span class="input-group-btn"><button class="btn btn-primary" type="button">Go!</button></span>
						</div>
				<br><br>
                		<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Username</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>Steve</td>
												<td>Jobs</td>
												<td>@steve</td>
											</tr>
											<tr>
												<td>2</td>
												<td>Simon</td>
												<td>Philips</td>
												<td>@simon</td>
											</tr>
											<tr>
												<td>3</td>
												<td>Jane</td>
												<td>Doe</td>
												<td>@jane</td>
											</tr>
										</tbody>
									</table>
						</form>