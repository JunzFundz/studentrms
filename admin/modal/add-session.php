			<!-- Modal -->
			<div class="modal fade" id="add-session" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h1 class="modal-title fs-5" id="exampleModalLabel">Add session</h1>
			                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			            </div>
			            <div class="modal-body">
			                <form action="db_add_session.php" method="post">

			                    <div class="row g-2 align-items-center">
			                        <div class="col-auto">
			                            <label for="platoon" class="col-form-label"></label>
                                        <h6>Session Format: <span style="font-style: italic;color:grey">2023-2024</span></h6>
			                            <input type="text" id="session-name" class="form-control" aria-describedby="" name="sessionNew">
			                        </div>
			                    </div>
			            </div>
			            <div class="modal-footer">
			                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			                <button type="submit" name="add" class="btn btn-primary">Add</button>
			            </div>

			            </form>
			        </div>
			    </div>
			</div>