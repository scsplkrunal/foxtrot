<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script type="text/javascript" lang="javaScript">
$(document).ready(function (){


 var data_investment_amount = <?php if($invest_amount['count']==''){ echo '0'; } else {echo $invest_amount['count']; }?>;
 var data_charge_amount = <?php if($charge_amount['count'] == '') {echo '0'; }else{echo $charge_amount['count']; }?>;
 var data_commission_received_amount = <?php if($commission_received_amount['count']==''){echo '0';}else {echo $commission_received_amount['count'];} ?>;

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
            depth: 20,
            dataLabels: {
                enabled: false,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Commision Ammount',
        data: [
            ['Investment Amount', data_investment_amount],
            ['Charge Amount', data_charge_amount],
            ['Commission Received Amount', data_commission_received_amount]
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
                            <td>Completed Files</td>
                            <td>16</td>
                            <td rowspan="5" width='60%'><div id="container1" style="min-width: 200px; height: 200px; max-width: 200px; margin:  auto"></div></td>
                        </tr>
                        <tr>
                            <td>Partially Completed</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>New Files</td>
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
                            <td>Invest Amount</td>
                            <td>$<?php if($invest_amount['count']!=''){ echo $invest_amount['count'];}else{echo 0;}?></td>
                            <td rowspan="5" style="width: 60%;"><div id="container_commission" style="min-width: 200px; height: 200px; max-width: 3000px; margin:  auto"></div></td>
                        </tr>
                        <tr>
                            <td>Charge Amount</td>
                            <td>$<?php if($charge_amount['count']!=''){ echo $charge_amount['count'];}else{echo 0;}?></td>
                        </tr>
                        <tr>
                            <td>Commission Received Amount</td>
                            <td>$<?php if($commission_received_amount['count']!=''){ echo $commission_received_amount['count'];}else{echo 0;}?></td>
                        </tr>
                        </table>
        				</div>
                        <div class="graphboxtitle" style="border-top: 2px solid #dfdfdf; font-weight: 10 !important; font-size: 15px !important;">
                        <table>
                            <tr><?php $total= $invest_amount['count']+$charge_amount['count']+$commission_received_amount['count'];?>
                                <td style="width: 28.5% !important;">Total Amount</td>
                                <td>$<?php echo $total; ?></td>
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
                            <td align='center'>Completed Files</td>
                        </tr>
                        <tr>
                            <td align='center'>4</td>
                        </tr>
                        <tr>
                            <td align='center'>Pending Files</td>
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
										