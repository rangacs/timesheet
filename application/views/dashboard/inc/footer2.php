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
			
			    dayClick: function(date, allDay, jsEvent, view) {

				if (allDay) {
				    location.assign(<?base_url()?> 'date/' + $.fullCalendar.formatDate(date, 'yyyy/MM/dd'));
				}
			    },
			
			events: [
			    <? foreach($hours as $row):?>
			    {
				title:	'<?projectName($row->project_id)?> <?=$row->hours?>',
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