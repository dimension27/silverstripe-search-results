<% require themedCSS(result-set) %>
<% if Results %>
<ul id="searchResults" class="resultSet">
	<% control Results %>
	<li>
		<a class="itemLink" href="$Link"><h3>
		<% if MenuTitle %>
			$MenuTitle
		<% else %>
			$Title
		<% end_if %>
		</h3></a>
		<% if Content %>
			<div class="summary">
				$Content.ContextSummary
			</div>
		<% end_if %>
		<a class="readMore internal" href="$Link" title="Read more about &quot;{$Title}&quot;">Read more about &quot;{$Title}&quot;...</a>
	</li>
	<% end_control %>
</ul>
<% else %>
<p class="noResults">Your search query did not return any results.</p>
<% end_if %>
<% if Results.MoreThanOnePage %>
<% include Pagination %>
<% end_if %>
