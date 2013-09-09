function setTicksBetweenDP() {
    var ticks = 0;
    var total_ticks = parseInt(jQuery('#scenario_lifespan').val());
    var nbr_dp = parseInt(jQuery('#scenario_total_decision_points').val());

    if (nbr_dp> 0 && total_ticks >= nbr_dp) {
        ticks = Math.floor(total_ticks / (nbr_dp + 1));
    }

    jQuery('#scenario_ticks_between_decision_points').val(ticks);
}

function formatMoney(val, decPlaces, thouSeparator, decSeparator) {
    decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
    decSeparator = decSeparator == undefined ? "," : decSeparator,
    thouSeparator = thouSeparator == undefined ? "." : thouSeparator,
    sign = val < 0 ? "-" : "",
    i = parseInt(val = Math.abs(+val || 0).toFixed(decPlaces)) + "",
    j = (j = i.length) > 3 ? j % 3 : 0;

    return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(val - i).toFixed(decPlaces).slice(2) : "");
};
