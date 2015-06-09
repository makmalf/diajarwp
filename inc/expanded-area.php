<div class="modal fade" id="widgetExpand" tabindex="-1" role="dialog" aria-labelledby="widgetExpandLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="close-widgetExpand">
				<button type="button" class="btn btn-lg btn-warning btn-block" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span> Close
				</button>
			</div>
			
			<div class="modal-body">
				<?php diajarwp_expandWidget_searchForm(); ?>
				
				<div class="row">
					<div class="col-md-4">
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div>

					<div class="col-md-4">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</div>

					<div class="col-md-4">
						<?php dynamic_sidebar( 'sidebar-4' ); ?>
					</div>
				</div>

			</div>
			
		</div>
	</div>
</div>