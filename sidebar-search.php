	  <div class="widget search-form">
			<form method="get" id="searchForm" action="http://www.louisvillehardcore.com">
				<div class="search-form__options">
					<label for="news">News
					<input
						type="radio"
						id="news"
						class="news"
						name="SearchSelections"
						value="news"
						checked="checked"
						data-action-path="<?=get_home_url();?>"
						data-action-name="s"
					></label>
					<!-- <label>Forums
						<input type="radio" class="forums" name="SearchSelections">
					</label> | -->
					<label for="history">History
					<input
						type="radio"
						id="history"
						class="history"
						name="SearchSelections"
						value="history"
						data-action-path="https://history.louisvillehardcore.com/index.php?title=Special%253ASearch"
						data-action-name="search"
					></label>
				</div>
				<div class="search-form__controls">
					<input id="searchBox1" type="search" value="" name="s" onclick="this.value=''" placeholder="Search LHxC" required/>
					<input type="submit" value="Search" class="submitButton" id="searchsubmit">
				</div>
			</form>
	  </div>