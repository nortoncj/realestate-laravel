@php
    $id = Auth::user()->id;
    $agentId = App\Models\User::find($id);
    $status = $agentId->status;
@endphp


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
                <a href="{{ route('agent.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            @if($status === 'active')
            <li class="nav-item nav-category">Real Estate</li>
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


@else
            @endif
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
