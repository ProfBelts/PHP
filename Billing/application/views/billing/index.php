<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of total charges per month</title>
    <link rel="stylesheet" href="public/css/styles.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
    $(document).ready(function() {
        // Data
        var months = [];
        var totalCosts = [];
        <?php foreach($billing as $data) { ?>
            months.push('<?= $data["month"] ?>');
            totalCosts.push(<?= $data["Total_Cost"] ?>);
        <?php } ?>
        
        // Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var year = <?= $billing[0]["year"] ?>; 
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: 'Total Cost',
                    data: totalCosts,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Cost'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Month'
                        }
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Client billing in ' + year
                    }
                }
            }
        });

        $(function() {
            $("#datepicker1, #datepicker2").datepicker();
        });

    });
    </script>
</head>
<body>

<div class="datepicker-container">
    <form action = <?= ("show_billing") ?> method = "POST"> 
        <input type="text" id="datepicker1" name = "start_date">
        <label for="datepicker1">&#128197;</label>

        <input type="text" id="datepicker2" name = "end_date">
        <label for="datepicker2">&#128197;</label>

        <input type="submit" value="Show">
    </form>
    </div>

    <h2>List of total charges per month</h2>

    <table> 
        <thead>
            <tr>
                <th>Month</th>
                <th>Year</th>
                <th>Total Cost</th>
            </tr>
        </thead>

        <tbody> 
            <?php foreach($billing as $data) { ?>
                <tr> 
                    <td><?= $data["month"] ?></td>
                    <td><?= $data["year"] ?></td>
                    <td><?= $data["Total_Cost"] ?></td> 
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <canvas id="myChart" width="400" height="100"></canvas>

  

</body>
</html>
