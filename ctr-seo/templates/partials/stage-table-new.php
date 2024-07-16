
<?php
$i = 0;
foreach ($stages as $stage) {
    if( isset($stage['in_development']) ) { continue; }
?>

  <h3 class="elementor-heading-title elementor-size-default" style="text-align: left;">
    <?php echo strtoupper($stage['display_name']); ?>
  </h3>

  <div class="Chiptuning-comparison Clear">
    <div class="Chiptuning-comparison__row">
        <div class="Chiptuning-comparison__col">
            &nbsp;
        </div>
        <div class="Chiptuning-comparison__col">
            <div class="Chiptuning-comparison__label"><?php _e('Standaard', 'ctr'); ?></div>
        </div>
        <div class="Chiptuning-comparison__col">
            <div class="Chiptuning-comparison__label"><?php _e('Na tuning', 'ctr'); ?></div>
        </div>
        <div class="Chiptuning-comparison__col">
            <div class="Chiptuning-comparison__label"><?php _e('Verschil', 'ctr'); ?></div>
        </div>
    </div>
    <div class="Chiptuning-comparison__row">
        <div class="Chiptuning-comparison__col">
            <div class="Chiptuning-comparison__label-arrow"><?php _e('Vermogen', 'ctr'); ?></div>
        </div>
        <div class="Chiptuning-comparison__col">
            <div class="Chiptuning-comparison__number tuning-p-pre"><?php echo $stage['data']['hp_ori']; ?><span>pk</span></div>
        </div>
        <div class="Chiptuning-comparison__col">
            <div class="Chiptuning-comparison__number tuning-p-post">
                <div><?php echo $stage['data']['hp_tuning']; ?><span>pk</span></div> <span
                    data-tooltip="<?php _e('Nm', 'ctr'); ?>Bij ATM-Chiptuning wordt elke auto op maat en individueel afgesteld, het opgegeven vermogen is dan ook slechts een indicatie."></span>
            </div>
        </div>
        <div class="Chiptuning-comparison__col">
            <div
                class="Chiptuning-comparison__number Chiptuning-comparison__number--atm tuning-p-diff">
                <div>
                    <?php echo $stage['data']['hp_tuning'] - $stage['data']['hp_ori']; ?><span>pk</span></div> 
                  <span
                    data-tooltip="<?php _e('Nm', 'ctr'); ?>Bij ATM-Chiptuning wordt elke auto op maat en individueel afgesteld, het opgegeven vermogen is dan ook slechts een indicatie.">
                  </span>
            </div>
        </div>
    </div>
    <div class="Chiptuning-comparison__row">
        <div class="Chiptuning-comparison__col">
            <div class="Chiptuning-comparison__label-arrow"><?php _e('Koppel', 'ctr'); ?></div>
        </div>
        <div class="Chiptuning-comparison__col">
            <div class="Chiptuning-comparison__number tuning-t-pre"><?php echo $stage['data']['nm_ori']; ?><span>Nm</span></div>
        </div>
        <div class="Chiptuning-comparison__col">
            <div class="Chiptuning-comparison__number tuning-t-post">
                <div><?php echo $stage['data']['nm_tuning']; ?><span>Nm</span></div>
            </div>
        </div>
        <div class="Chiptuning-comparison__col">
            <div
                class="Chiptuning-comparison__number Chiptuning-comparison__number--atm tuning-t-diff">
                <div>
                  <?php echo $stage['data']['nm_tuning'] - $stage['data']['nm_ori']; ?><span>Nm</span>
                </div>
            </div>
        </div>
    </div>
  </div>

<?php } ?>

