<?php
	if (!isset($json_data)) {
		return '[CTR_SELECTOR: No data found, please flush the cache and try again]';
	}

	$barBackgroundColor = get_option(CTR_OPT_PREFIX . 'graph_colors', '#000000')['original_hp'];
	$jsonDataPath = CTR_JSON_FILE;
	?>
	<script>
		<?php if($only_show_vehicle_type) { ?> var onlyShowType = '<?php echo $only_show_vehicle_type; ?>'; <?php } ?> 
		var vData = <?php echo $json_data; ?>;
		var vTypes = <?php echo $vehicle_types; ?>;
		var homeUrl = '<?php echo get_home_url(); ?>';
		var ctrStartUrl = '<?php ctr_print_full_start_url(); ?>';
	</script>
	<?php
	// Check if a custom template exists in the theme folder, if not, load the plugin template file
	?>
	<div id="selectorApp">
		
		<div class="selectorSpace ctr-grid ctr-grid-cols-1" :class="[onlyShowType ? 'md:ctr-grid-cols-4' : 'md:ctr-grid-cols-5 ']" >
			<div class="selectorControl selectTypeControl nopadding" v-show="!onlyShowType">
				<label for="selectVType" class="ctr-block ctr-mb-2 ctr-text-sm ctr-font-medium ctr-text-gray-900 ctr-dark:text-gray-400"><?php _e('Type', 'ctr'); ?></label>
				<select v-model="selectedType" class="form-control ctr-border ctr-border-gray-300 ctr-text-gray-900 ctr-text-sm ctr-rounded-lg focus:ctr-ring-orange-500 focus:ctr-border-orange-500 ctr-block ctr-w-full ctr-p-2.5 dark:ctr-bg-gray-700 dark:ctr-border-gray-600 dark:ctr-placeholder-gray-400 dark:ctr-text-white dark:focus:ctr-ring-orange-500 dark:focus:ctr-orange-blue-500" name="type" id="selectType" v-model="selectedType" @change="typeSelected">
					<option value="0" :selected="true">-- <?php _e('Please select vehicle type', 'ctr'); ?> --</option>
					<option v-for="type in typeData" :value="type.slug" :key="type.slug" :data_slug="type.slug">{{ type.name }}</option>
				</select>
			</div>
			<div class="selectorControl selectBrandControl nopadding">
				<label for="selectVBrand" class="ctr-block ctr-mb-2 ctr-text-sm ctr-font-medium ctr-text-gray-900 ctr-dark:text-gray-400"><?php _e('Brand', 'ctr'); ?></label>
				<select v-model="selectedBrand" :disabled="selectedBrands.length == 0" class="form-control ctr-border ctr-border-gray-300 ctr-text-gray-900 ctr-text-sm ctr-rounded-lg focus:ctr-ring-orange-500 focus:ctr-border-orange-500 ctr-block ctr-w-full ctr-p-2.5 dark:ctr-bg-gray-700 dark:ctr-border-gray-600 dark:ctr-placeholder-gray-400 dark:ctr-text-white dark:focus:ctr-ring-orange-500 dark:focus:ctr-orange-blue-500" :class="{'refreshed': brandsLoaded}" name="brand" id="selectBrand" @change="brandSelected">
					<option value="0" selected v-if="selectedBrands.length == 0">-- <?php _e('Please select type first', 'ctr'); ?> --</option>
					<option value="0" selected v-else>-- <?php _e('Select brand', 'ctr'); ?> --</option>
					<option v-for="brand in selectedBrands" :value="{id: brand.id, slug: brand.slug}" :key="brand.id">{{ brand.name }}</option>
				</select>
			</div>
			<div class="selectorControl selectSerieControl nopadding">
			<label for="selectVSerie" class="ctr-block ctr-mb-2 ctr-text-sm ctr-font-medium ctr-text-gray-900 ctr-dark:text-gray-400"><?php _e('Serie', 'ctr'); ?></label>
				<select v-model="selectedSerie" :disabled="selectedSeries.length == 0" class="form-control ctr-border ctr-border-gray-300 ctr-text-gray-900 ctr-text-sm ctr-rounded-lg focus:ctr-ring-orange-500 focus:ctr-border-orange-500 ctr-block ctr-w-full ctr-p-2.5 dark:ctr-bg-gray-700 dark:ctr-border-gray-600 dark:ctr-placeholder-gray-400 dark:ctr-text-white dark:focus:ctr-ring-orange-500 dark:focus:ctr-orange-blue-500" :class="{'refreshed': seriesLoaded}" name="serie" id="selectSerie" @change="serieSelected">
					<option value="0" selected v-if="selectedSeries.length == 0">-- <?php _e('Please select brand first', 'ctr'); ?> --</option>
					<option value="0" selected v-else>-- <?php _e('Select serie', 'ctr'); ?> --</option>
					<option v-for="serie in selectedSeries" :value="{id: serie.id, slug: serie.slug}" :key="serie.id" :data_slug="serie.slug">{{ serie.name }}</option>
				</select>
			</div>
			<div class="selectorControl selectModelControl nopadding">
				<label for="selectVModel" class="ctr-block ctr-mb-2 ctr-text-sm ctr-font-medium ctr-text-gray-900 ctr-dark:text-gray-400"><?php _e('Model', 'ctr'); ?></label>
				<select v-model="selectedModel" :disabled="selectedModels.length == 0" class="form-control ctr-border ctr-border-gray-300 ctr-text-gray-900 ctr-text-sm ctr-rounded-lg focus:ctr-ring-orange-500 focus:ctr-border-orange-500 ctr-block ctr-w-full ctr-p-2.5 dark:ctr-bg-gray-700 dark:ctr-border-gray-600 dark:ctr-placeholder-gray-400 dark:ctr-text-white dark:focus:ctr-ring-orange-500 dark:focus:ctr-orange-blue-500" :class="{'refreshed': modelsLoaded}" name="models" id="selectModel" @change="modelSelected">
					<option value="0" selected v-if="selectedModels.length == 0">-- <?php _e('Please select a serie first', 'ctr'); ?> --</option>
					<option value="0" selected v-else>-- <?php _e('Select serie', 'ctr'); ?> --</option>
					<option v-for="model in selectedModels" :value="{id: model.id, slug: model.slug}" :key="model.id" :data_slug="model.slug">{{ model.name }}</option>
				</select>
			</div>
			<div class="selectorControl selectEngineControl nopadding" v-show="!redirecting">
				<label for="selectVEngine" class="ctr-block ctr-mb-2 ctr-text-sm ctr-font-medium ctr-text-gray-900 ctr-dark:text-gray-400"><?php _e('Engine', 'ctr'); ?></label>
				<select v-model="selectedEngine" :disabled="selectedEngines.length == 0" class="form-control ctr-border ctr-border-gray-300 ctr-text-gray-900 ctr-text-sm ctr-rounded-lg focus:ctr-ring-orange-500 focus:ctr-border-orange-500 ctr-block ctr-w-full ctr-p-2.5 dark:ctr-bg-gray-700 dark:ctr-border-gray-600 dark:ctr-placeholder-gray-400 dark:ctr-text-white dark:focus:ctr-ring-orange-500 dark:focus:ctr-orange-blue-500" :class="{'refreshed': enginesLoaded}" name="engines" id="selectEngine" <?php if($autoredirect !== false) { ?>@change="engineSelected"<?php } ?>>
					<option value="0" selected v-if="selectedEngines.length == 0">-- <?php _e('Please select a model first', 'ctr'); ?> --</option>
					<option value="0" selected v-else>-- <?php _e('Select engine', 'ctr'); ?> --</option>
					<option v-for="engine in selectedEngines" :value="{id: engine.id, slug: engine.slug}" :key="engine.id" :data_slug="engine.slug">{{ engine.name }} {{ engine.hp }} <?php _e('HP', 'ctr'); ?></option>
				</select>
			</div>
			<?php if(!$autoredirect) { ?>
				<button @click="engineSelected()">
					Go
				</button>
			<?php } ?>
			<div class="ctr-mt-8 ctr-transition-all ctr-ease-in" v-show="redirecting">
				<svg aria-hidden="true" style="max-width:50px;" class="ctr-mr-2 ctr-w-8 ctr-h-8 ctr-text-gray-200 ctr-animate-spin dark:ctr-text-gray-600 ctr-fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
					<path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
				</svg>
			</div>
		</div>
	</div>
	<div style="clear:both;"></div>
	<style>
		.selectorControl { display:inline-block; margin-right:20px;}
		.selectorControl input, label { width:100%; display:block; clear:both; }
		.selectorControl .form-control { width:100%; }
		#loadingDiv {position: absolute; display: block;width: 100%;text-align: center;left: 0px;height: 6%;padding-top: 10px;background-color: rgba(255,255,255, 0.9);}
		#loadingDiv img {animation: rotation 1s infinite linear;}
		.fadeInLoader { animation: fadeIn 0.3s linear; }
		.loader { width:100%; display:block; position:relative; height: 2px; top:50px; background-color:grey;}
		.loaderLoading {animation: loader 4s linear; }
		@keyframes fadeIn {0% { opacity:0; }100% { opacity:1; }}
		@keyframes rotation {from {transform: rotate(0deg);}to {transform: rotate(359deg);}}
		@keyframes loader {0% {width: 100%;}100% {width: 0%;}}
	</style>