var colorIndex = 6;

jQuery(document).ready(function() {
	var chartDivId = '#market_share_evolution_chart';
	var overviewDivId = '#msec_overview';
	var legendDivId = '#msec_legend';
	var tooltipDivId = '#msec_tooltip';
	var tickAlias = 'Month';
	
	if (jQuery(chartDivId).length != 0)
	{
		var startData, options;

		startData = getPlotData();
		options = getGraphOptions();
		
		var previousPoint = null;

	    var plot = jQuery.plot(jQuery(chartDivId), startData, options);
	    
	    jQuery(chartDivId).bind('plothover', function (event, pos, item) {
	        if (item) {
	            if (previousPoint != item.dataIndex) {
	                previousPoint = item.dataIndex;
	                jQuery(tooltipDivId).remove();
	                
	                var x = item.datapoint[0],
	                    y = item.datapoint[1];
	                
	                showTooltip(item.pageX, item.pageY,
	                            tickAlias+" #: "+ x +"<br>Market Share: " + y +' %');
	            }
	        }
	        else {
	        	jQuery(tooltipDivId).remove();
	            previousPoint = null;            
	        }
	    });
	    
	// ZOOMING
	    var overview = $.plot($(overviewDivId), startData, {
	        legend: { show: true, container: $(legendDivId) },
	        series: {
	        	color: colorIndex,
	            lines: { show: true, lineWidth: 1 },
	            shadowSize: 0
	        },
	        xaxis: { ticks: 4, min: -0.5, max: 21 },
	        yaxis: { ticks: 2 },
	        grid: { color: "#999" },
	        selection: { mode: "xy" }
	    });
	    
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
	    
	    $(overviewDivId).bind("plotselected", function (event, ranges) {
	        plot.setSelection(ranges);
	    });
	    
	    function resetZoom() 
	    { 
	    	plot = $.plot($(chartDivId), getPlotData(), options); 
	    	overview.clearSelection(); 
	    	plot.clearSelection();
	    };
	    
	    $(overviewDivId).bind("dblclick", resetZoom);
	}
	
	//setup plot data
	function getPlotData() {
		var market = [];
		for (var i = 0; i <= 20; i++) {
		    market.push([i, Math.pow(i, 2).toFixed(2)]);
		}
		
	    return [{ data: market, label: 'market share (%)' }];
	};
	
	function getGraphOptions() {
		var graphOptions = {
		    legend: { show: false },
		    series: {
		    	color: colorIndex,
		        lines: { show: true },
		        points: { show: true }
		    },
			grid: {
				hoverable: true,
				//clickable: true
			},
			//yaxis: { min: 0, max: 100 },
		    //yaxis: { ticks: 10 },
			xaxis: { min: -0.5, max: 21 },
		    selection: { mode: "xy" }
		};
		
		return graphOptions;
	}

	function showTooltip(x, y, contents) {
	    jQuery('<div id="msec_tooltip">' + contents + '</div>').css( {
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
});
