
var chartSpinderLoad;

function drawChartSpinderLoad(){
    chartSpinderLoad = AmCharts.makeChart("chartdivSpinderLoad", {
        "type": "serial",
        "theme": "light",
        "marginTop":0,
        "marginRight": 80,
        "dataProvider":[],
        "valueAxes": [{
            "maximum":100,
            "minimum":0,
            "axisAlpha": 0,
            "position": "left",
        }],
        "graphs": [{
            "balloonText": "[[category]]<br>"+
            "<b><span style='float:left; '>主軸負載 : [[spindleLoad]] %</span></b><br>",
            "bullet": "round",
            "bulletSize": 12,
            "lineThickness": 2,
            "colorField":"color",
            "lineColor": "#5f5656",
            "type": "smoothedLine",
            "valueField": "spindleLoad" 
        }],
        // "chartScrollbar": {
        // "graph":"g1",
        // "gridAlpha":0,
        // "color":"#888888",
        // "scrollbarHeight":55,
        // "backgroundAlpha":0,
        // "selectedBackgroundAlpha":0.1,
        // "selectedBackgroundColor":"#888888",
        // "graphFillAlpha":0,
        // "autoGridCount":true,
        // "selectedGraphFillAlpha":0,
        // "graphLineAlpha":0.2,
        // "graphLineColor":"#c2c2c2",
        // "selectedGraphLineColor":"#888888",
        // "selectedGraphLineAlpha":1

        // },
        "chartCursor": {
            "categoryBalloonDateFormat": "JJ:NN:SS",
        },
        "categoryField": "time",
        "categoryAxis": {
            "parseDates": true,
            "boldPeriodBeginning": false,
            "axisColor": "#DADADA",
            "dateFormats": [{
              "period": "fff",
              "format": "JJ:NN:SS"
            }, {
              "period": "ss",
              "format": "JJ:NN:SS"
            }, {
              "period": "mm",
              "format": "JJ:NN:SS"
            }, {
              "period": "hh",
              "format": "JJ:NN:SS"
            }, {
              "period": "DD",
              "format": "MMM DD"
            }, {
              "period": "WW",
              "format": "MMM DD"
            }, {
              "period": "MM",
              "format": "MMM"
            }, {
              "period": "YYYY",
              "format": "YYYY"
            }],
            "equalSpacing": true,
            "minPeriod": "ss"
        },
        "export": {
            "enabled": true
         }
    });

}


function insertData_spinderLoad(resData){

    var newData = {
      'time':resData['updated_at'],
      'spindleLoad':resData['spinderLoad'],
    }
    if(resData['spinderLoad'] >=80){
      newData["color"]="#CC0000";
    }else{
       newData["color"]="#637bb6";
    }

    chartSpinderLoad.dataProvider.push(newData);
    //保留最新十項
    if(chartSpinderLoad.dataProvider.length>10){
      //移除第一項
      chartSpinderLoad.dataProvider.splice(0,1);
    }
    chartSpinderLoad.validateData();

}
