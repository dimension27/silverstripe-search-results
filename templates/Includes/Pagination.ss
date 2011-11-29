<% require themedCSS(result-set) %>
<div class="pagination">
	<p>Showing page $Results.CurrentPage of $Results.TotalPages</p>
	<div class="pagingLinks">
		<% if Results.NotFirstPage %>
		<a class="previousPage" href="$Results.PrevLink" title="View the previous page of results">Previous</a>
		<% else %>
		<span class="previousPage">Previous</span>
		<% end_if %>
		<ul class="pageLinks">
			<% control Results.Pages %>
			<% if CurrentBool %>
			<li class="current">$PageNum</li>
			<% else %>
			<li><a href="$Link" title="View page number $PageNum">$PageNum</a></li>
			<% end_if %>
			<% end_control %>
		</ul>
		<% if Results.NotLastPage %>
		<a class="nextPage" href="$Results.NextLink" title="View the next page of results">Next</a>
		<% else %>
		<span class="nextPage">Next</span>
		<% end_if %>
	</div>
</div>