<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Data<span>Door</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Real Estate</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#type" role="button" aria-expanded="false" aria-controls="type">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Property Type</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="type">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.type')}}" class="nav-link">All Types</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.type')}}" class="nav-link">Add Type</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#status" role="button" aria-expanded="false" aria-controls="status">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title">Property Status</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="status">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.status')}}" class="nav-link">All Statuses</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.status')}}" class="nav-link">Add Type</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#amenities" role="button" aria-expanded="false" aria-controls="amenities">
                    <i class="link-icon" data-feather="star"></i>
                    <span class="link-title"> Amenities</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="amenities">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.amenities')}}" class="nav-link">All Amenities</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.amenity')}}" class="nav-link">Add Amenities</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="home"></i>
                    <span class="link-title"> Property Listings</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="property">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.listing')}}" class="nav-link">All Listing</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.listing')}}" class="nav-link">Add Listing</a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Package History</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Package History</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Testimonial Manage </span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="message">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.type')}}" class="nav-link">All Properties</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.type')}}" class="nav-link">Add Type</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">User Functions</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#agents" role="button" aria-expanded="false" aria-controls="agents">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Manage Agents</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="agents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.agent')}}" class="nav-link">All Agents</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.agent')}}" class="nav-link">Add Agent</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Property Message</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">UI Kit</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Role & Permission</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="lock"></i>
                    <span class="link-title">Role & Permission</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{route('all.permission')}}" class="nav-link">All Permission</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('add.permission')}}" class="nav-link">Add Permission</a>
                        </li>

                    </ul>
                </div>
            </li>



            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
