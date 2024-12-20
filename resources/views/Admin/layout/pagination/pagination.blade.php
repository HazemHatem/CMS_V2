@if ( $data->hasPages() )
<div class="card-footer">
    {{ $data->links() }}
</div>
@endif