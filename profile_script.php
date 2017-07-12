<div class="chartdiv" id="chartdiv<?php echo $group_by; ?>" style="width:100% !important; height:300px;"></div>	

<script>
/* jQuery(document).ready(function(){
chart.exportConfig = {
    menuItems: [{
        icon: 'am_chart/images/export.png',
        format: 'png',
        onclick: function(a) {
            var output = a.output({
                format: 'png',
                output: 'datastring'
            }, function(data) {
                console.log(data)
            });
        }
    }]
}
}); */

var chart = AmCharts.makeChart("chartdiv<?php echo $group_by; ?>", {
    "type": "serial",
    "theme": "light",
    "pathToImages":"http://localhost/new_admin/am_chart/images/export.png",
    "dataProvider": [<?php echo $data_array; ?>],
    "valueAxes": [{
        "axisAlpha": 0,
        "position": "left",
        "title": "",
		
    }],

    "startDuration": 1,
    "graphs": [{
        "balloonText": "<b>[[category]]: [[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "type": "column",
        "valueField": "data_count"
    }],
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "group_by",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 45
    },

});

</script>