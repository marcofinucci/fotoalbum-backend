<div class="my-logo text-secondary-emphasis">FOTO ALBUM</div>

{{-- Toggle button --}}
<button class="navbar-toggler d-lg-none ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

{{-- Desktop --}}
<div class="d-none d-lg-flex flex-column h-100">
  @include('partials.nav')
</div>

{{-- Mobile --}}
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
  <div class="offcanvas-header">
    <div class="my-logo text-secondary-emphasis">FOTO ALBUM</div>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column pt-0">
    @include('partials.nav')
  </div>
</div>
