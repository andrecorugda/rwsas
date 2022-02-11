<div class="row p-3 pt-5">
    <ul class="nav nav-tabs mb-3" id="myTab0" role="tablist">
        <!-- Tab Buttons -->
        <li class="nav-item" role="presentation" onclick="tab(1)">
            <button
            class="nav-link <?php echo ($tab == 1) ? "active":"" ?>"
            id="home-tab0"
            data-mdb-toggle="tab"
            data-mdb-target="#home0"
            type="button"
            role="tab"
            aria-controls="home"
            aria-selected="true"
            data-toggle="tooltip" 
            data-placement="bottom" 
            title="Pin road signages to a certain location"
            >
                <i class="bi bi-geo-alt-fill"></i>
                Locations
            </button>
        </li>
        <li class="nav-item" role="presentation" onclick="tab(2)">
            <button
            class="nav-link <?php echo ($tab == 2) ? "active":"" ?>"
            id="profile-tab0"
            data-mdb-toggle="tab"
            data-mdb-target="#profile0"
            type="button"
            role="tab"
            aria-controls="profile"
            aria-selected="false"
            data-toggle="tooltip" 
            data-placement="bottom" 
            title="Manage list of road signages"
            >
                <i class="bi bi-signpost-2-fill"></i>
                Signage
            </button>
        </li>
    </ul>
    <!-- Tab Contents -->
    <div class="tab-content p-0" id="myTabContent0">
        <div
            class="tab-pane fade <?php echo ($tab == 1) ? "show active":"" ?>"
            id="home0"
            role="tabpanel"
            aria-labelledby="home-tab0"
        >
            <?php require_once __DIR__.'/partials/location-panel.php'; ?>
        </div>
        <div 
            class="tab-pane fade <?php echo ($tab == 2) ? "show active":"" ?>" 
            id="profile0" 
            role="tabpanel" 
            aria-labelledby="profile-tab0"
        >
            <?php require_once __DIR__.'/partials/signage-panel.php'; ?>
        </div>
    </div>
</div>