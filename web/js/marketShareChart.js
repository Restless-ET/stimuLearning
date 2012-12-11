jQuery(document).ready(function() {
	var numTicks = 36;
	var startingLevel = 5.00;
	var saturationLevel = 70.00;
	var alpha = 100;
	var beta = -0.3;
	
	// setup plot
    function getData() {
    	var market = [];
    	market.push([0, startingLevel]);
    	for (var i = 0; i < numTicks; i++) {
    	    var share = (startingLevel + ((saturationLevel - startingLevel) / (1 + alpha * Math.exp(i * beta)))).toFixed(2);
    		market.push([i+1, share]);
    	}
    	
        return [{ data: market, label: 'market penetration (%)' }];
    };
	
	var startData = getData();
	
	var options = {
        legend: { show: false },
        series: {
            lines: { show: true },
            points: { show: true }
        },
		grid: { hoverable: true, clickable: true },
		yaxis: { min: 0, max: 100 },
        //yaxis: { ticks: 10 },
		xaxis: { min: -0.5, max: numTicks+1 },
        selection: { mode: "xy" }
    };

    var plot = jQuery.plot(jQuery('#market_share_chart'), startData, options);
    
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
    
    var previousPoint = null;
    jQuery('#market_share_chart').bind('plothover', function (event, pos, item) {
    	jQuery('#x').text(pos.x.toFixed(2));
    	jQuery('#y').text(pos.y.toFixed(2));
        
        if (item) {
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                jQuery('#tooltip').remove();
                
                var x = item.datapoint[0],
                    y = item.datapoint[1];
                
                showTooltip(item.pageX, item.pageY,
                            "Month #: "+ x +"<br>Penetration: " + y +' %');
            }
        }
        else {
        	jQuery('#tooltip').remove();
            previousPoint = null;            
        }
    });
    
    jQuery('#market_share_chart').bind('plotclick', function (event, pos, item) {
        if (item) {
        	jQuery('#clickdata').text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });
    
  // ZOOMING
    // setup overview
    var overview = $.plot($("#overview"), startData, {
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
    
    // now connect the two 
    $("#market_share_chart").bind("plotselected", function (event, ranges) {
        // clamp the zooming to prevent eternal zoom
        if (ranges.xaxis.to - ranges.xaxis.from < 0.00001)
            ranges.xaxis.to = ranges.xaxis.from + 0.00001;
        if (ranges.yaxis.to - ranges.yaxis.from < 0.00001)
            ranges.yaxis.to = ranges.yaxis.from + 0.00001;
        
        // do the zooming
        plot = $.plot($("#market_share_chart"), getData(),
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
    
    function resetZoom() 
    { 
    	plot=$.plot($("#market_share_chart"),getData(),options); 
    	overview.clearSelection(); 
    	plot.clearSelection(); 
    };
    $("#overview").bind("dblclick",resetZoom); 
});
