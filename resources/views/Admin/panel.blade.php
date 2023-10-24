<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('css/Admin/css/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Dashboard</title>
    <style>
        .chart{
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

    </style>
</head>
<body>

    @include('layouts.Admin.sidebar')
    <section id="content">
        @include('layouts.Admin.navbar')
        <main>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check' ></i>
                    <span class="text">
						<h3>{{$ordersCount}}</h3>
						<p>New Order</p>
					</span>
                </li>
                <li>
                    <i class='bx bxs-calendar-check' ></i>
                    <span class="text">
						<h3>{{$ordersCountAlltime}}</h3>
						<p>All orders</p>
					</span>
                </li>
                <li>
                    <i class='bx bxs-group' ></i>
                    <span class="text">
						<h3>{{$users}}</h3>
						<p>Users</p>
					</span>
                </li>
                <li>
                    <i class='bx bxl-product-hunt'></i>
                    <span class="text">
						<h3>{{$products}}</h3>
						<p>Products</p>
					</span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle' style="color: green;"></i>
                    <span class="text">
						<h3>{{$total}} MAD</h3>
						<p>Total Sales</p>
					</span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle' style="color: green;"></i>
                    <span class="text">
						<h3>{{$totalPerDay}} MAD</h3>
						<p>Total Sales Per day</p>
					</span>
                </li>

            </ul>
            <div class="chart">
                <canvas id="orderChart"></canvas>
            </div>

        </main>
    </section>
    <script src="../slick/jquery/jquery.js"></script>
    <script
    type="module"
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{url('js/jquery/jquery.js')}}"></script>

<script src="{{url('js/Admin/js/script.js')}}"></script>


<script>
    var orderData = @json($orders);

    // Extract necessary data for the chart

    var labels = orderData.map(order => order.oder_date);
    var values = orderData.map(order => order.total);

    // Create the chart
    var ctx = document.getElementById('orderChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Order Total',
                data: values,
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Date'
                    },
                    ticks: {
                        beginAtZero: true,
                        autoSkip: true,
                        maxTicksLimit: 10, // Maximum number of x-axis ticks to display
                        callback: function(value, index, values) {
                            // Customize x-axis labels if needed
                            return value;
                        }
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Total'
                    },
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            // Customize y-axis labels if needed
                            return 'MAD' + value.toFixed(1);
                        }
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Order Total Chart',
                    font: {
                        size: 16
                    }
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        boxWidth: 20,
                        font: {
                            size: 12
                        }
                    }
                }
            }
        }
    });
</script>

</html>
