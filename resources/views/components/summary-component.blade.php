<div class=" top-100 start-50 rounded bg-white p-3 hero-nav-link-section">
    <div class="d-flex justify-content-center">
        <div class="pr-3">
            <a href="{{route('pages.counties')}}" class="text-decoration-none">
                <div class="card header-card border-0">
                    <div class="card-body p-4 quick-links">
                        <i class="fa-solid fa-map"></i>
                        Counties ({{ $county_count }})
                    </div>
                </div>
            </a>
        </div>

        <div class="px-3">
            <a href="{{route('pages.boroughs')}}" class="text-decoration-none ">
                <div class="card header-card border-0">
                    <div class="card-body p-4 quick-links">
                        <i class="fa-solid fa-location-arrow"></i>
                        Boroughs ({{ $borough_count }})
                    </div>
                </div>
            </a>
        </div>

        <div class="">
            <a href="{{route('pages.mosques')}}" class="text-decoration-none">
                <div class="card header-card border-0">
                    <div class="card-body p-4 quick-links">
                        <i class="fa-solid fa-mosque"></i>
                        Masjids and Charities ({{ $mosque_count }})
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
