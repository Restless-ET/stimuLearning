<div id="sdc_miniature">
  <div id="sdc_overview"></div>
  <br />
  <ul id="sdc_choices"></ul>
</div>
<?php $ajaxUrl = url_for('operator/getSimulatedDataDatasets?id='.$operator->id);
      $tickAlias = $operator->Scenario->getTickAlias(); ?>
<div id="simulated_data_chart"></div>

<script type="text/javascript">
jQuery(document).ready(function() {
  var chartDivId = '#simulated_data_chart';
  var overviewDivId = '#sdc_overview';
  var tooltipDivId = '#sdc_tooltip';
  var choiceContainer = jQuery('#sdc_choices');
  var datasets = [];

  //setup plot data
  jQuery.ajax({
      url: "<?php echo $ajaxUrl; ?>",
      dataType: 'json',
    success: setChoiceContainer,
  });

  function setChoiceContainer(data)
  {
    datasets = data;
    // insert checkboxes
    $.each(datasets, function(key, val) {
      l = val.label;
      var li = $('<li />').appendTo(choiceContainer);

      $('<input name="' + key + '" id="id' + key + '" type="checkbox" checked="checked" />').appendTo(li);
      $('<label>', { text: l, 'for': l}).appendTo(li);
    });

    plotAccordingToChoices();
    choiceContainer.find("input").change(plotAccordingToChoices);

    $(chartDivId+' > .legend > table > tbody > tr > .legendColorBox > div').each(function(i){
        $(this).clone().prependTo(choiceContainer.find("li").eq(i));
    });
  }

  function plotAccordingToChoices() {
    var drawData = [];

    choiceContainer.find("input:checked").each(function () {
      var key = $(this).attr("name");
      if (key && datasets[key])
        drawData.push(datasets[key]);
    });

    if (drawData.length > 0)
    {
      var options = getGraphOptions();
      var previousPoint = null;

      var plot = jQuery.plot(jQuery(chartDivId), drawData, options);

      jQuery(chartDivId).bind('plothover', function (event, pos, item) {
        if (item) {
          if (previousPoint != item.dataIndex) {
            previousPoint = item.dataIndex;
            jQuery(tooltipDivId).remove();

            var x = item.datapoint[0],
                y = item.datapoint[1];

            showTooltip(item.pageX, item.pageY, "<?php echo $tickAlias; ?>"+" #: "+ Math.round(x) +"<br>Value: " + formatMoney(y) +' €');
          }
        }
        else {
          jQuery(tooltipDivId).remove();
          previousPoint = null;
        }
      });

    // ZOOMING
      var overview = $.plot($(overviewDivId), drawData, {
        legend: { show: false },
        series: {
          lines: { lineWidth: 0.8 },
          shadowSize: 0
        },
        xaxis: { ticks: 4, min: -0.4 }, //, autoscaleMargin: 0.01 },
        yaxis: { ticks: 2, tickFormatter: suffixFormatter },
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
        plot = $.plot($(chartDivId), drawData,
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
        plot = $.plot($(chartDivId), drawData, options);
        overview.clearSelection();
        plot.clearSelection();
      };
      $(overviewDivId).bind("dblclick", resetZoom);
    }
  };

  function getGraphOptions() {
    var graphOptions = {
      //legend: { show: false },
      //series: { lines: { show: true }, points: { show: true }},
      grid: { hoverable: true },
      yaxis: {
        axisLabel: 'Value (€)',
        //axisLabelUseCanvas: true,
        ticks: 8,
        autoscaleMargin: 0.05,
        tickDecimals: 1,
        tickFormatter: suffixFormatter,
      },
      xaxis: {
        min: -0.4,
        axisLabel: "<?php echo $tickAlias; ?>",
        //autoscaleMargin: 0.01
      },
      selection: { mode: "xy" }
    };

    return graphOptions;
  };

  function suffixFormatter(val, axis) {
    if (Math.abs(val) >= 1000000)
      return (val / 1000000).toFixed(axis.tickDecimals) + " M";
    else if (Math.abs(val) >= 1000)
      return (val / 1000).toFixed(axis.tickDecimals) + ' k';
    else
      return val.toFixed(axis.tickDecimals);
  };

  function showTooltip(x, y, contents) {
    jQuery('<div id="sdc_tooltip">' + contents + '</div>').css( {
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
</script>
