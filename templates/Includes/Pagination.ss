<% require themedCSS(result-set) %>
<div class="pagination">
	<p>Showing page $Results.CurrentPage of $Results.TotalPages</p>
	<div class="pagingLinks">
		<% if Results.NotFirstPage %>
		<a class="previousPage" href="$Results.PrevLink" title="View the previous page of results">Previous</a>
		<% else %>
		<span class="previousPage">Previous</span>
		<% end_if %>
		<div class="pageLinks">
			<% control Results.Pages %>
			<% if CurrentBool %>
			<span>$PageNum</span>
			<% else %>
			<a href="$Link" title="View page number $PageNum">$PageNum</a>
			<% end_if %>
			<% end_control %>
		</div>
		<% if Results.NotLastPage %>
		<a class="nextPage" href="$Results.NextLink" title="View the next page of results">Next</a>
		<% else %>
		<span class="nextPage">Next</span>
		<% end_if %>
	</div>
</div>