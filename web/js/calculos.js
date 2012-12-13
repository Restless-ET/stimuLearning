function setTicksBetweenDP() {
	var ticks = 0;
	var total_ticks = parseInt(jQuery('#scenario_lifespan').val());
	var nbr_dp = parseInt(jQuery('#scenario_total_decision_points').val());
	
	if (nbr_dp> 0 && total_ticks >= nbr_dp)
		ticks = Math.floor(total_ticks / nbr_dp);
	
	jQuery('#scenario_ticks_between_decision_points').val(ticks);
}
