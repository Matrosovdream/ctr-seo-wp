<?php $chart_data = ctr_generate_chartdata($stages); ?>
<?php if(isset($chart_data['data'])) {
  foreach($chart_data['data'] as $stage_item) { 
    ?>
<div class="ctr-w-full ctr-md:ctr-w-4/4 ctr-px-2 chart-block">
  <div class="ctr-w-full px-2">
    <div class="ctr-rounded-lg ctr-shadow-sm mb-4">
      <div class="ctr-rounded-lg ctr-bg-white ctr-shadow-lg ctr-md:shadow-xl ctr-relative ctr-overflow-hidden">
        <div class="ctr-w-full ctr-pt-20  ctr-text-center ctr-absolute ctr-z-10">
          <h4 class="ctr-text-8xl ctr-md:ctr-text-4xl ctr-uppercase ctr-text-gray-500 ctr-leading-tight ctr-opacity-30"><?php echo $stage_item['label']; ?></h4>
        </div>
        <div class="ctr-bottom-0 ctr-inset-x-0">
          <canvas id="ctr-tuning-chart-<?php echo $stage_item['name']; ?>"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  /** Retrieve the elements from the template to inject our Chart into. Please remember that each stage has it's own element! */
  var barChart = document.getElementById("ctr-tuning-chart-<?php echo $stage_item['name']; ?>");
  if (barChart !== null && typeof(barChart) !== 'undefined') {
    var ctx_<?php echo $stage_item['name']; ?> = barChart.getContext('2d');
    /*** Setup our gradients, as set in our admin section ***/
    var gradient = ctx_<?php echo $stage_item['name']; ?>.createLinearGradient(0, 0, 0, 270);
    gradient.addColorStop(1, '<?php echo ctr_rgba_converter(get_option(CTR_OPT_PREFIX . 'graph_colors')['original_hp']); ?>');
    gradient.addColorStop(0, '<?php echo ctr_rgba_converter(get_option(CTR_OPT_PREFIX . 'graph_colors')['tuning_hp']); ?>');

    var gradient1 = ctx_<?php echo $stage_item['name']; ?>.createLinearGradient(0, 0, 0, 270);
    gradient1.addColorStop(1, '<?php echo ctr_rgba_converter(get_option(CTR_OPT_PREFIX . 'graph_colors')['original_nm']); ?>');
    gradient1.addColorStop(0, '<?php echo ctr_rgba_converter(get_option(CTR_OPT_PREFIX . 'graph_colors')['tuning_nm']); ?>');

    /**
     * Now, configure the data in the chart itself
     */
    var barChart = new Chart(ctx_<?php echo $stage_item['name']; ?>, {
      backgroundColor: "transparent",
      type: 'bar',
      data: {
        labels: [<?php echo $chart_data['labels']; ?>],
        datasets: [{
          label: "<?php _e('Original', 'ctr'); ?>",
          data: [<?php echo $stage_item['hp']; ?>],
          backgroundColor: gradient,
        }, {
          label: "<?php _e('Tuning', 'ctr'); ?>",
          data: [<?php echo $stage_item['nm']; ?>],
          backgroundColor: gradient1,
        }]
      },
      options: {
        aspectRatio: 1.3,
        responsiveAnimationDuration: 1000,
        responsive: true,
        scales: {
          x: {
            grid: {
              display: false,
              max: 1000
            }
          },
          y: {
            min: 0,
            max: <?php echo $chart_data['max']; ?>,
            ticks: {
              stepSize: 20
            }
          }
        }
      }
    });
  }
  </script>
  <?php } } ?>