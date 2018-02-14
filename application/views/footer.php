	
	
	
						</div>
					</div>
				</section> <!-- page end-->
				
			</section>
			
		
		
		</section>
		
		<?php 
		if(isset($js) && count($js) > 0)
		{
			assets_url($js,$type='js');
			
		}
		?>
		<input type="hidden" class="form-control form-control-inline input-medium default-date-picker input-sm m-bot15" value="<?php echo date('d/m/Y');?>" id="date_remontee_fin_temp"  />
		<input type="hidden" class="form-control form-control-inline input-medium default-date-picker input-sm m-bot15" value="<?php echo date('01/m/Y'); ?>" id="date_remontee_deb_temp"  />
		<input value="activate scrollator" id="activate_scrollator4" type="hidden">
	</body>
	
</html>