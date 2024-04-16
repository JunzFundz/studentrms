			<!-- Modal -->
			<div class="modal fade" id="modal-session" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Edit session</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form action="db_update_session.php" method="post">

								<input type="hidden" id="session-id" name="sessionID">

								<div class="row g-2 align-items-center">
									<div class="col-auto">
										<label for="platoon" class="col-form-label"></label>
										<h6>Session Format: <span style="font-style: italic;color:grey">2023-2024</span></h6>
										<h6 style="font-style: italic;color:red; font-size:10px">*Changing session may lead to data loss</h6>
										<br>
										<input type="text" id="session-name" class="form-control" aria-describedby="passwordHelpInline" name="sessionNew">
									</div>
								</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button type="submit" name="change" class="btn btn-primary">Add</button>
						</div>

						</form>
					</div>
				</div>
			</div>