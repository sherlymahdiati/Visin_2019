
<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
      	//load data from CI controller

      	var BarChartData1='<?php echo $BarChartData1;?>';

        // Create the data table.
        var data = new google.visualization.DataTable();
       data.addColumn('string', 'Topping');
        data.addColumn('number', 'Daging Sapi/Kg');
        data.addRows(JSON.parse(BarChartData1));

        // Set chart options
        var options = {'title':'<?php echo $BarCharTitle1;?>',
                       'width':420,
                       'height':260};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
        chart.draw(data, options);



        //Bar chart2
        var BarChartData2='<?php echo $BarChartData2; ?>';

        var Bar_data = google.visualization.arrayToDataTable(JSON.parse(BarChartData2));

        var Bar_options = {
          title: '<?php echo $BarCharTitle2; ?>',
          legend: { position: 'bottom' }
        };

        var Bar_chart = new google.visualization.ColumnChart(document.getElementById('curve_chart'));

        Bar_chart.draw(Bar_data, Bar_options);



        //bar chart 3
        var BarChartData3 = '<?php echo $BarChartData3; ?>';

        var data = new google.visualization.DataTable();
       data.addColumn('string', 'Topping');
        data.addColumn('number', 'Daging Sapi/Kg');
        data.addRows(JSON.parse(BarChartData3));

        // Set chart options
        var options = {'title':'<?php echo $BarCharTitle3;?>',
                       'width':420,
                       'height':260};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart.draw(data, options);


        //bar Chart 4
        var BarChartData4 = '<?php echo $BarChartData4; ?>';

        var data = new google.visualization.DataTable();
       data.addColumn('string', 'Topping');
        data.addColumn('number', 'Daging Ayam Ras/Kg');
        data.addRows(JSON.parse(BarChartData4));

        // Set chart options
        var options = {'title':'<?php echo $BarCharTitle4;?>',
                       'width':420,
                       'height':260};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
        chart.draw(data, options);

        //Bar Chart 5
        var BarChartData5 = '<?php echo $BarChartData5; ?>';

        var data = new google.visualization.DataTable();
       data.addColumn('string', 'Topping');
        data.addColumn('number', 'Daging Ayam Boiler/Kg');
        data.addRows(JSON.parse(BarChartData5));

        // Set chart options
        var options = {'title':'<?php echo $BarCharTitle5;?>',
                       'width':420,
                       'height':260};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div4'));
        chart.draw(data, options);


        // Barc Chart 6
        var BarChartData6 = '<?php echo $BarChartData6; ?>';

        var data = new google.visualization.DataTable();
       data.addColumn('string', 'Topping');
        data.addColumn('number', 'Telor Ayam Ras/Kg');
        data.addRows(JSON.parse(BarChartData6));

        // Set chart options
        var options = {'title':'<?php echo $BarCharTitle6;?>',
                       'width':420,
                       'height':260};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div5'));
        chart.draw(data, options);

      }
    </script>
  </head>
  <body>
  	<center> <button> <h1> Visualisasi Informasi Harga Daging Hewan Ternak di Indonesia Tahun 2012 - 2016</h1> </button></center>

   <center> <table>
    <tr>
        <th scope="row"><div id="chart_div2"></div></th>
        <td><div id="chart_div3"></div></td>
        <td><div id="chart_div4"></div></td>
    </tr>
    <tr>
        <th rowspan="2"><div id="chart_div5"></div></th>
        <th rowspan="2"><div id="curve_chart"></div></th>
        <th rowspan="2"><div id="chart_div1"></div></th>
    </tr>
</table></center>
  	
    <!--Div that will hold the pie chart-->
    <div id="chart_div2"></div>
    <div id="chart_div3"></div>
    <div id="chart_div4"></div>
    <div id="chart_div5"></div>
    <div id="chart_div1"></div>
    <div id="curve_chart"></div>
  </body>
</html>