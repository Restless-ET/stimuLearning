function setTicksBetweenDP() {
    var ticks = 0;
    var total_ticks = parseInt(jQuery('#scenario_lifespan').val());
    var nbr_dp = parseInt(jQuery('#scenario_total_decision_points').val());

    if (nbr_dp> 0 && total_ticks >= nbr_dp) {
        ticks = Math.floor(total_ticks / (nbr_dp + 1));
    }

    jQuery('#scenario_ticks_between_decision_points').val(ticks);
};

function formatMoney(val, decPlaces, thouSeparator, decSeparator) {
    decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
    decSeparator = decSeparator == undefined ? "," : decSeparator,
    thouSeparator = thouSeparator == undefined ? "." : thouSeparator,
    sign = val < 0 ? "-" : "",
    i = parseInt(val = Math.abs(+val || 0).toFixed(decPlaces)) + "",
    j = (j = i.length) > 3 ? j % 3 : 0;

    return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(val - i).toFixed(decPlaces).slice(2) : "");
};

function setGeographyAreas() {
    var total_area = parseFloat(jQuery('#scenario_total_area').val()),
        duTerritory = parseFloat(jQuery('#scenario_dense_urban_territory').val()),
        uTerritory = parseFloat(jQuery('#scenario_urban_territory').val()),
        suTerritory = parseFloat(jQuery('#scenario_suburban_territory').val()),
        rTerritory = parseFloat(jQuery('#scenario_rural_territory').val()),
        duArea = 0.00, uArea = 0.00, suArea = 0.00, rArea = 0.00;

    if (total_area <= 0.00) {
        alert('The total area should be set to a value greater than zero!');
        return false;
    }

    if (duTerritory > 0.00) {
        duArea = parseFloat(total_area * duTerritory / 100).toFixed(2);
    }
    jQuery('#scenario_dense_urban_area').val(duArea);

    if (uTerritory > 0.00) {
        uArea = parseFloat(total_area * uTerritory / 100).toFixed(2);
    }
    jQuery('#scenario_urban_area').val(uArea);

    if (suTerritory > 0.00) {
        suArea = parseFloat(total_area * suTerritory / 100).toFixed(2);
    }
    jQuery('#scenario_suburban_area').val(suArea);

    if (rTerritory > 0.00) {
        rArea = parseFloat(total_area * rTerritory / 100).toFixed(2);
    }
    jQuery('#scenario_rural_area').val(rArea);
};

function setDemographyPopulation() {
    var total_clients = parseFloat(jQuery('#scenario_total_clients').val()),
        duDistribution = parseFloat(jQuery('#scenario_dense_urban_distribution').val()),
        uDistribution = parseFloat(jQuery('#scenario_urban_distribution').val()),
        suDistribution = parseFloat(jQuery('#scenario_suburban_distribution').val()),
        rDistribution = parseFloat(jQuery('#scenario_rural_distribution').val()),
        duPopulation = 0.00, uPopulation = 0.00, suPopulation = 0.00, rPopulation = 0.00;

    if (total_clients <= 0.00) {
        alert('The total clients/population should be set to a value greater than zero!');
        return false;
    }

    if (duDistribution > 0.00) {
        duPopulation = parseFloat(total_clients * duDistribution / 100).toFixed(0);
    }
    jQuery('#scenario_dense_urban_population').val(duPopulation);

    if (uDistribution > 0.00) {
        uPopulation = parseFloat(total_clients * uDistribution / 100).toFixed(0);
    }
    jQuery('#scenario_urban_population').val(uPopulation);

    if (suDistribution > 0.00) {
        suPopulation = parseFloat(total_clients * suDistribution / 100).toFixed(0);
    }
    jQuery('#scenario_suburban_population').val(suPopulation);

    if (rDistribution > 0.00) {
        rPopulation = parseFloat(total_clients * rDistribution / 100).toFixed(0);
    }
    jQuery('#scenario_rural_population').val(rPopulation);
};
