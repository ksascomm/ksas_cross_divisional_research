<form method="post" action="<?php echo $ancestor_url;?>results/">
	<input type="text" name="keyword" id="id_search" placeholder="Search by name or keyword"  />
	<label for="id_search" class="screen-reader-text">
		Search by name or keyword
	</label>
	<div class="row">
		<div class="medium-5 columns">
			<label for="id_search" class="screen-reader-text">Search by affiliation</label>
			<label for="affiliation" class="bold inline">Affiliation:
				<select id="affiliation" name="affiliation" class="inline">
					<option value="">Any Affiliation</option>
					<?php $taxonomies = array('academicdepartment', 'affiliation');
					$terms = get_terms($taxonomies, array(
								'hide_empty' => 1,
					));
								foreach ( $terms as $term ) {
									echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
					
					} ?>
				</select>
			</label>
		</div>
		<div class="medium-5 columns">
			<label for="award" class="screen-reader-text">Select Year</label>
			<label for="affiliation" class="bold inline">Select Year
				<select id="award" name="award">
					<option value="">Any Year</option>
					<?php $award_years = get_meta_values('ecpt_class_year');
					echo $award_years;
						foreach ($award_years as $award_year) {
							echo '<option value"' . $award_year . '">' . $award_year . '</option>';
					} ?>
				</select>
			</label>
		</div>
		<div class="medium-2 columns">
			<div class="input-group-button">
				<input type="submit" class="button" value="Search" />
			</div>
		</div>
	</div>
</form>