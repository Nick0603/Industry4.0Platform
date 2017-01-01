
var chart;
function drawChart(utilization){
    chart = AmCharts.makeChart("chartdiv", {
        "type": "serial",
        "theme": "patterns",
        "marginRight":60,
        "autoMarginOffset":20,
        "dataDateFormat": "YYYY-MM-DD",
        "dataProvider":utilization,
        "valueAxes": [{
            "axisAlpha": 0,
            "max":100,
            "min":0,
            "position": "left",
        }],
        "graphs": [{
            "balloonText": "[[category]]<br>"+
            "<b><span style='float:left; '>稼動率 : [[utilization]] %</span></b><br>"+
            "<b><span style='float:left; '>busy : [[busyTimer]] hr</span></b><br>"+
            "<b><span style='float:left; '>idle : [[idleTimer]] hr</span></b><br>"+
            "<b><span style='float:left; '>alarm : [[alarmTimer]] hr</span></b><br>"+
            "<b><span style='float:left; '>off : [[offTimer]] hr</span></b><br>",
            "bullet": "round",
            "dashLength": 3,
            "colorField":"color",
            "valueField": "utilization"
        }],
        "chartScrollbar": {
            "scrollbarHeight":2,
            "offset":-1,
            "backgroundAlpha":0.1,
            "backgroundColor":"#888888",
            "selectedBackgroundColor":"#67b7dc",
            "selectedBackgroundAlpha":1
        },
        "chartCursor": {
            "fullWidth":true,
            "valueLineEabled":true,
            "valueLineBalloonEnabled":true,
            "valueLineAlpha":0.5,
            "cursorAlpha":0
        },
        "categoryField": "date",
        "categoryAxis": {
            "parseDates": true,
            "axisAlpha": 0,
            "gridAlpha": 0.1,
            "minorGridAlpha": 0.1,
            "minorGridEnabled": true
        },
        "export": {
            "enabled": true
         }
    });

    // 可設定初始時間位置，無設定就為全部
    //chart.addListener("dataUpdated", zoomChart);
}

// function zoomChart(){
//     chart.zoomToDates(new Date(2016, 11, 4), new Date(2016, 11, 5));
// }
