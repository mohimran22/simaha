<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Tambahkan di header.blade.php atau di layout master -->
        

        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                @include('tablar::partials.header.theme-mode')
                @include('tablar::partials.header.top-right')
            </div>
            
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            
        </div>
    </div>
</header>
