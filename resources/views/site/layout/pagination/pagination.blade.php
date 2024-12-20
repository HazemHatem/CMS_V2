@if ( $data->hasPages() )
<div class="pagination">
    {{ $data->links() }}
</div>
@endif
