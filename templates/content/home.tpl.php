<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript" lang="javaScript">
$(document).ready(function (){
Highcharts.chart('container1', {
   chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: '',
        align: 'center',
        verticalAlign: 'middle',
        y: 40
    },
    /*tooltip: {
        pointFormat: '{plotOptions.pie.endAngle}: <b>{point.percentage:.1f}%</b>'
    },*/
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: true,
                distance: -50,
                style: {
                    fontWeight: 'bold',
                    color: 'orange'
                }   
            },
            startAngle: 0,
            endAngle: 270,
            center: ['50%', '50%']
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        innerSize: '75%',
        data: [
            ['75%',   75],
            {
                name: 'Proprietary or Undetectable',
                y: 0.2,
                dataLabels: {
                    enabled: false
                }
            }
        ]
    }]
});
Highcharts.chart('container2', {
    chart: {
        type: 'bar'
    },
    title: {
        text: ''
    },
    
    xAxis: {
        categories: ['cat1', 'cat2', 'cat3', 'cat4', 'cat5'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: '',
            align: ''
        },
        labels: {
            overflow: ''
        }
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    credits: {
        enabled: false
    },
    series: [{
        
        color:'orange',
        data: [107, 31, 635, 203, 2]
    }]
});
Highcharts.chart('container3', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0,
            borderWidth: 0
        }
    },
    series: [{
        //name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        //name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        //name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        //name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});

Highcharts.chart('container_commission', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0,
            width: 849,
            height: 400
        }
    },
    title: {
        text: ''
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: false,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        data: [
            ['Direct', 45.0],
            {
                name: 'Pending',
                y: 12.8,
                sliced: false,
                selected: true
            },
            ['Advisory', 26.8],
            ['Clearing', 8.5],
            ['Others', 2.3]
        ]
    }]
});
Highcharts.chart('container_payroll', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        categories: [
            'Last Cutoff',
            'Gross Commission',
            'Average Payout Rate',
            'Charges',
            'Net Commission',
            'Adjustment',
            'Total Check Amount',
            'Balance Carried Forword',
            'Retention'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Commission'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0,
            height:30
        }
    },
    series: [{
        
        name: 'Payroll',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6]

    }]
});
});
</script>
<div class="sectionwrapper">
  <div class="container">
  <?php require_once(DIR_FS_INCLUDES."alerts.php"); ?>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
			<div class="graphbox">
				<div class="graphboxtitle">Daily Importing <i class="fa fa-times-circle"></i><i class="fa fa-chevron-circle-down"></i></div>
				<div class="graphboxcontent">
                    <table width='100%'> 
                        <tr>
                            <td>Completed file</td>
                            <td>16</td>
                            <td rowspan="5" width='60%'><div id="container1" style="min-width: 200px; height: 200px; max-width: 200px; margin:  auto"></div></td>
                        </tr>
                        <tr>
                            <td>Partially Completed</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>New file</td>
                            <td>4</td>
                        </tr>
                    </table>
					<div class="graphimg">
                    <!--img src="images/graphimg.jpg" alt="Graph Image" / --></div>
				</div>
			</div>
			<div class="graphbox">
				<div class="graphboxtitle">Commissions <i class="fa fa-times-circle"></i><i class="fa fa-chevron-circle-down"></i></div>
				<div class="graphboxcontent">
                    <table width='100%'> 
                        <tr>
                            <td>Direct</td>
                            <td>$45.000</td>
                            <td rowspan="5" style="width: 60%;"><div id="container_commission" style="min-width: 200px; height: 200px; max-width: 3000px; margin:  auto"></div></td>
                        </tr>
                        <tr>
                            <td>Pending</td>
                            <td>$12.8000</td>
                        </tr>
                        <tr>
                            <td>Advisory</td>
                            <td>$26.8000</td>
                        </tr>
                        <tr>
                            <td>Clearing</td>
                            <td>$8.5000</td>
                        </tr>
                        <tr>
                            <td>Others</td>
                            <td>$2.3000</td>
                        </tr>
                        </table>
        				</div>
                        <div class="graphboxtitle" style="border-top: 2px solid #dfdfdf; font-weight: 10 !important; font-size: 15px !important;">
                        <table>
                            <tr>
                                <td style="width: 28.5% !important;">Total file</td>
                                <td>$192.000</td>
                                <td rowspan="5" style="width: 60%;"></td>
                            </tr>
                        </table>
                        </div>
            </div>
			<div class="graphbox">
				<div class="graphboxtitle">Payroll <i class="fa fa-times-circle"></i><i class="fa fa-chevron-circle-down"></i></div>
				<div class="graphboxcontent">
                    <table width='100%'> 
                        <tr>
                            <td>Last Cutoff</td>
                            <td>15-11-2017</td>
                            <td rowspan="9" style="width: 60%;"><div id="container_payroll" style="min-width: 200px; height: 200px; max-width: 3000px; margin:  auto"></div></td>
                        </tr>
                        <tr>
                            <td>Gross Commission</td>
                            <td>$325k</td>
                        </tr>
                        <tr>
                            <td>Average Payout Rate</td>
                            <td>$346.512.1</td>
                        </tr>
                        <tr>
                            <td>Charges</td>
                            <td>$1.5k</td>
                        </tr>
                        <tr>
                            <td>Net Commission</td>
                            <td>$228k</td>
                        </tr>
                        <tr>
                            <td>Adjustment</td>
                            <td>$4.5k</td>
                        </tr>
                        <tr>
                            <td>Total Check Amount</td>
                            <td>$265k</td>
                        </tr>
                        <tr>
                            <td>Balance Carried Forword</td>
                            <td>$45k</td>
                        </tr>
                        <tr>
                            <td>Retention</td>
                            <td>$415k</td>
                        </tr>
                    </table>
					<!--p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p-->
					<div class="graphimg"><!--img src="images/graphimg.jpg" alt="Graph Image" /--></div>
				</div>
			</div>
		</div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
			<div class="graphbox graphbox02">
				<div class="graphboxtitle">Compliance <i class="fa fa-times-circle"></i><i class="fa fa-chevron-circle-down"></i></div>
				<div class="graphboxcontent">
					<div class="graphimg">
                     <table width='100%'> 
                        <tr>
                            <td align='center'>Complated file</td>
                        </tr>
                        <tr>
                            <td align='center'>4</td>
                        </tr>
                        <tr>
                            <td align='center'>Pendding file</td>
                        </tr>
                        <tr>
                            <td align='center'>4</td>
                        </tr>
                        <tr>
                            <td> <div id="container3" style="min-width: 290px; height: 400px; margin: 0 auto"></div> </td>
                        </tr>
                    </table>
				</div>
			</div>
        </div>
   
			<div class="graphbox graphbox02">
				<div class="graphboxtitle">YTD Production <i class="fa fa-times-circle"></i><i class="fa fa-chevron-circle-down"></i></div>
				<div class="graphboxcontent">
                    <table width='100%'> 
                        <tr>
                            <td colspan="2" width='60%'><div id="container2" style="min-width: 190px; max-width: 800px; height: 400px; margin: 0 auto"></div></div></td>
                        </tr>
                        <tr>
                            <td>cat1</td>
                            <td>107</td>
                        </tr>
                        <tr>
                            <td>cat2</td>
                            <td>31</td>
                        </tr>
                        <tr>
                            <td>cat3</td>
                            <td>635</td>
                        </tr>
                        <tr>
                            <td>cat4</td>
                            <td>203</td>
                        </tr>
                        <tr>
                            <td>cat5</td>
                            <td>2</td>
                        </tr>
                    </table>
				</div>
			</div>
		</div>
    </div>
  </div>
</div>
										