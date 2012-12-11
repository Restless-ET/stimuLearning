jQuery(document).ready(function() {
	numTicks = 36;
	startingLevel = 5;
	saturationLevel = 70;
	alpha = 100;
	beta = -0.3;
	
	var market = [0, startingLevel];
	for (var i = 1; i <= numTicks; i++) {
		
	    var share = Math.round((startingLevel + ((saturationLevel - startingLevel) / (1 + alpha * Math.exp(i * beta)))), 2);
		market.push([i, share]);
	}

    var plot = jQuery.plot(jQuery('#placeholder'),
    	[{
    		data: market, label: 'market penetration (%)' 
    	}], {
    		series: {
    			lines: { show: true },
    			points: { show: true },
    		},
    		grid: { hoverable: true, clickable: true },
    		yaxis: { min: 0, max: 100 },
    		xaxis: { min: 0, max: i+1 },
    	});
    
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
    jQuery('#placeholder').bind('plothover', function (event, pos, item) {
    	jQuery('#x').text(pos.x.toFixed(2));
    	jQuery('#y').text(pos.y.toFixed(2));
        jQuery('#tooltip').remove();
        
        if (item) {
        	alert('item');
            if (previousPoint != item.dataIndex) {
                previousPoint = item.dataIndex;
                
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);
                
                showTooltip(item.pageX, item.pageY,
                            item.series.label + " of " + x + " = " + y);
            }
        }
        else {
            previousPoint = null;            
        }
    });
    
    jQuery('#placeholder').bind('plotclick', function (event, pos, item) {
        if (item) {
        	jQuery('#clickdata').text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });
});
