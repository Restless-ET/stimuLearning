chartDivId = '#market_share_chart';
tickAliasId = '#scenario_tick_alias';
lifespanId = '#scenario_lifespan';
startLevelId = '#scenario_starting_level';
saturationId = '#scenario_saturation_level';
alphaId = '#scenario_alpha';
betaId = '#scenario_beta';

var numTicks, tickAlias, startingLevel, saturationLevel, alpha, beta;
var startData, options;

jQuery(document).ready(function() {
	
	actOnChange = jQuery([]).add($(lifespanId)).add($(tickAliasId)).add($(startLevelId)).add($(saturationId)).add($(alphaId)).add($(betaId));
	if (jQuery('#scenario_id').length != 0)
	{
		// hook on change events to each related input
		actOnChange.bind('change blur input paste', configAndInitiateGraphDraw);
	}
	
	configAndInitiateGraphDraw();
});

function configAndInitiateGraphDraw() {
    
	setNeededValuesFromInput();
	startData = getPlotData();
	options = getGraphOptions();
	
	var previousPoint = null;

    var plot = jQuery.plot(jQuery(chartDivId), startData, options);
    
    jQuery(chartDivId).bind('plothover', function (event, pos, item) {
    	jQuery('#x').text(pos.x.toFixed(2));
    	jQuery('#y').text(pos.y.toFixed(2));
        
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                jQuery('#tooltip').remove();
                
                var x = item.datapoint[0],
                    y = item.datapoint[1];
                
                showTooltip(item.pageX, item.pageY,
                            tickAlias+" #: "+ x +"<br>Penetration: " + y +' %');
            }
        }
        else {
        	jQuery('#tooltip').remove();
            previousPoint = null;            
        }
    });
    /*
    jQuery(chartDivId).bind('plotclick', function (event, pos, item) {
        if (item) {
        	jQuery('#clickdata').text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });
    */
    
// ZOOMING
    var overview = setupOverview();
    
    // now connect the two 
    $(chartDivId).bind("plotselected", function (event, ranges) {
        // clamp the zooming to prevent eternal zoom
        if (ranges.xaxis.to - ranges.xaxis.from < 0.00001)
            ranges.xaxis.to = ranges.xaxis.from + 0.00001;
        if (ranges.yaxis.to - ranges.yaxis.from < 0.00001)
            ranges.yaxis.to = ranges.yaxis.from + 0.00001;
        
        // do the zooming
        plot = $.plot($(chartDivId), getPlotData(),
                      $.extend(true, {}, options, {
                          xaxis: { min: ranges.xaxis.from, max: ranges.xaxis.to },
                          yaxis: { min: ranges.yaxis.from, max: ranges.yaxis.to }
                      }));
        
        // don't fire event on the overview to prevent eternal loop
        overview.setSelection(ranges, true);
    });
    
    $("#overview").bind("plotselected", function (event, ranges) {
        plot.setSelection(ranges);
    });
    
    $("#overview").bind("dblclick", resetZoom);
}

function setNeededValuesFromInput() {
	numTicks = parseInt(jQuery(lifespanId).val());
	tickAlias = jQuery(tickAliasId).val();
	startingLevel = parseFloat(jQuery(startLevelId).val());
	saturationLevel = parseFloat(jQuery(saturationId).val());
	alpha = parseInt(jQuery(alphaId).val());
	beta = parseFloat(jQuery(betaId).val());
}

function getGraphOptions() {
	var graphOptions = {
	    legend: { show: false },
	    series: {
	        lines: { show: true },
	        points: { show: true }
	    },
		grid: {
			hoverable: true,
			//clickable: true
		},
		yaxis: { min: 0, max: 100 },
	    //yaxis: { ticks: 10 },
		xaxis: { min: -0.5, max: numTicks + 1 },
	    selection: { mode: "xy" }
	};
	
	return graphOptions;
}

//setup plot data
function getPlotData() {
	var market = [];
	market.push([0, startingLevel]);
	for (var i = 0; i < numTicks; i++) {
	    var share = (startingLevel + ((saturationLevel - startingLevel) / (1 + alpha * Math.exp(i * beta)))).toFixed(2);
		market.push([i+1, share]);
	}
	
    return [{ data: market, label: 'market penetration (%)' }];
};

function showTooltip(x, y, contents) {
    jQuery('<div id="tooltip">' + contents + '</div>').css( {
        position: 'absolute',
        display: 'block',
        top: y + 5,
        left: x + 5,
        border: '1px solid #fdd',
        padding: '2px',
        'background-color': '#fee',
        opacity: 0.80
    }).appendTo('body').fadeIn(200);
};

function setupOverview() {
	return $.plot($("#overview"), startData, {
        legend: { show: true, container: $("#overviewLegend") },
        series: {
            lines: { show: true, lineWidth: 1 },
            shadowSize: 0
        },
        xaxis: { ticks: 4 },
        yaxis: { ticks: 3, min: 0, max: 100 },
        grid: { color: "#999" },
        selection: { mode: "xy" }
    });
};

function resetZoom() 
{ 
	plot = $.plot($(chartDivId), getPlotData(), options); 
	overview.clearSelection(); 
	plot.clearSelection(); 
};
