<div class="row tm-row">
    <div class="col-12">
        <form action="{{route('search')}}" method="post" class="form-inline tm-mb-80 tm-search-form">                
        @csrf    
        <input class="form-control tm-search-input" name="search" type="text" placeholder="Search..." aria-label="Search">
            <button class="tm-search-button" type="submit">
                <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
            </button>                                
        </form>
    </div>                
</div> 