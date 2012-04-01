	    </div><!--./content-->
	    
	</div><!--./w980-->
	<footer>
		footer
	</footer>
	<script type="text/javascript" charset="utf-8">
				    $(document).ready(function() {
					    // Alert messages fadeout
					    $('.alert-success').delay(2000).fadeOut(1000);
					    
					    // fullcalendar
					    $('#calendar').fullCalendar({
						header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,basicWeek,basicDay'
						},
						firstDay: 1,
						height: 500,
						
						events: [
						    <? foreach($hours as $row):?>
						    {
							title:	'<?getName($row->user_id)?> <?projectName($row->project_id)?> <?=$row->hours?>',
							start: '<?= $row->date?>',
							description: 'test'
						    },
						    <? endforeach;?>
						]
					    });
				    });
				</script>
	
    </body>
    
</html>