<div class="card-tools">
    <form action="{{ $url }}" method="GET">
        <div class="input-group input-group-sm" style="width: 150px;">
            @include('Admin.layout.message.error', ['name' => 'search'])
            <input type="text" name="search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
</div>
