<?php if(in_array('premium', Ctr_Api_Connector::connection_valid()['subscriptions']) || in_array('medium', Ctr_Api_Connector::connection_valid()['subscriptions'])) { $chart_data = ctr_generate_chartdata($stages); ?>
    <div class="ctr-w-full ctr-md:ctr-w-4/4 ctr-px-2 chart-block">
        <div class="ctr-w-full px-2">
            <div class="ctr-rounded-lg ctr-shadow-sm mb-4">
                <div class="ctr-rounded-lg ctr-bg-white ctr-shadow-lg ctr-md:shadow-xl ctr-relative ctr-overflow-hidden">
                    <div class="ctr-bottom-0 ctr-inset-x-0">
                        <canvas id="ctr-tuning-dynochart-data"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // this is JS code
        document.addEventListener('DOMContentLoaded', () => {
            var dynoChart = document.getElementById("ctr-tuning-dynochart-data");
            if (dynoChart !== null && typeof(dynoChart) !== 'undefined') {
                dynoChart = dynoChart.getContext('2d');
                var gradientHp = dynoChart.createLinearGradient(0, 0, 0, 400);
                gradientHp.addColorStop(0, '<?php echo ctr_rgba_converter(get_option(CTR_OPT_PREFIX . 'graph_colors')['original_hp']); ?>');
                gradientHp.addColorStop(1, '<?php echo ctr_rgba_converter(get_option(CTR_OPT_PREFIX . 'graph_colors')['tuning_hp']); ?>');

                if (typeof(Chart) !== 'undefined') {
                    <?php $lineChartData = ctr_linechart_data_generator($stages); ?>
                    var lineChart = new Chart(dynoChart, {
                        backgroundColor: "transparent",
                        type: 'line',
                        data: {
                            labels: ['1000 RPM', '1500 RPM', '2000 RPM', '2500 RPM', '3000 RPM', '3500 RPM', '4000 RPM', '4500 RPM', '5000 RPM', '5500 RPM', '6000 RPM', '6500 RPM'],
                            datasets: [{
                                    label: "<?php _e('Power (HP) Original', 'ctr'); ?>",
                                    data: [<?php echo $lineChartData['lineDataHpOriData']; ?>],
                                    backgroundColor: ['<?php echo ctr_rgba_converter(get_option(CTR_OPT_PREFIX . 'graph_colors')['original_hp']); ?>'],
                                    borderColor: ['rgba(155,155,155,1)'],
                                    fill: true,
                                    tension: 0.4,
                                    yAxisID: 'y_hp',
                                    pointColor: "#ccc",
                                    pointStrokeColor: "#ff6c23",
                                },
                                <?php echo $lineChartData['dataSetsHp']; ?> {
                                    label: "<?php _e('Torque (Nm) Original', 'ctr'); ?>",
                                    data: [<?php echo $lineChartData['lineDataNmOriData']; ?>],
                                    backgroundColor: ['<?php echo ctr_rgba_converter(get_option(CTR_OPT_PREFIX . 'graph_colors')['original_nm']); ?>'],
                                    borderColor: ['rgba(155,155,155,1)'],
                                    fill: true,
                                    tension: 0.4,
                                    yAxisID: 'y_nm',
                                    pointColor: "#ccc",
                                    pointStrokeColor: ['<?php echo ctr_rgba_converter(get_option(CTR_OPT_PREFIX . 'graph_colors')['original_nm']); ?>'],
                                },
                                <?php echo $lineChartData['dataSetsNm']; ?>
                            ]
                        },
                        options: {
                            aspectRatio: 1.3,
                            animation: {
                                duration: 2000,
                                easing: 'easeInOutElastic'
                            },
                            responsiveAnimationDuration: 1000,
                            responsive: true,
                            scales: {
                                y_hp: {
                                    type: 'linear',
                                    display: true,
                                    position: 'left',
                                    title: {
                                        display: true,
                                        text: '<?php _e('Power (HP)', 'ctr'); ?>'
                                    },
                                },
                                y_nm: {
                                    type: 'linear',
                                    display: true,
                                    position: 'right',
                                    title: {
                                        display: true,
                                        text: '<?php _e('Torque (Nm)', 'ctr'); ?>'
                                    },
                                    // grid line settings
                                    grid: {
                                    drawOnChartArea: false, // only want the grid lines for one axis to show up
                                    },
                                },
                                },
                                plugins: {
                                    legend: {
                                        labels: {
                                            // This more specific font property overrides the global property
                                            font: {
                                                size: 16
                                            }
                                        }
                                    }
                                }
                        },
                    });
                } else {
                    console.log('CTR: DynoLineChart not activated');
                }
            }
        }, false);
    </script>
    <?php } ?>