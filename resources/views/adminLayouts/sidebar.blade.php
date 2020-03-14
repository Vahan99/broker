<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                @if($admin == 4)
                    <li class="has_sub">
                        <a href="#"><i class="fa fa-building"></i> <span> Ընկերություններ </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'add-user', 0) ? 'active' : ''}}"><a href="{{route('company.create')}}">Ստեղծել</a></li>
                            <li class="{{strrpos(url()->full(), 'user-list', 0) ? 'active' : ''}}"><a href="{{route('company.index')}}">Բոլորը</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="#"><i class="fa fa-users"></i> <span> Ադմիններ </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'add-user', 0) ? 'active' : ''}}"><a href="{{route('company.admin.create')}}">Ստեղծել</a></li>
                            <li class="{{strrpos(url()->full(), 'add-user', 0) ? 'active' : ''}}"><a href="{{route('company.admin.index')}}">Բոլորը</a></li>
                        </ul>
                    </li>
                    @else
                    <li class="has_sub">
                        <a href="#"  class="{{strrpos(url()->full(), 'reality', 0) ? 'active' : ''}} waves-effect"><i class="ti-home"></i> <span> Անշարժ Գույքեր </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'reality-list', 0) ? 'active' : ''}}"><a href="/admin/reality/reality-list/1/1">Գույքերի ցուցակ</a></li>
                            @if($admin != 1)
                                <li class="{{strrpos(url()->full(), 'add-reality', 0) ? 'active' : ''}}"><a href="/admin/reality/add-reality">Ավելացնել Գույք</a></li>
                            @endif
                        </ul>
                    </li>
                    @if($admin != 2)

                    <li class="has_sub">
                        <a href="#"  class="{{strrpos(url()->full(), 'gorcakal', 0) ? 'active' : ''}} waves-effect"><i class="ti-user"></i> <span> Աշխատակիցներ </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'user-list', 0) ? 'active' : ''}}"><a href="/admin/broker/user-list">Գործակալների ցուցակ</a></li>
                            <li class="{{strrpos(url()->full(), 'add-user', 0) ? 'active' : ''}}"><a href="/admin/broker/add-user">Ավելացնել Գործակալ</a></li>
                        </ul>
                    </li>
                    @endif

                    <li class="">
                        <a href="/admin/clients/2"  class="{{strrpos(url()->full(), 'clients', 0) ? 'active' : ''}}"><i class="fa fa-users"></i> <span> Գնորդ / Վարձակալ </span> </a>
                    </li>
                    @if($admin == 1 || $admin == 3)
                    <li class="has_sub">
                        <a href="#"  class="{{strrpos(url()->full(), 'regions', 0) ? 'active' : ''}} waves-effect"><i class="fa fa-globe"></i> <span> Համայնք </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'regions-list', 0) ? 'active' : ''}}"><a href="/admin/regions/regions-list/1">Համայնքների ցուցակ</a></li>
                            @if($admin != 2)
                                <li class="{{strrpos(url()->full(), 'add-region', 0) ? 'active' : ''}}"><a href="/admin/regions/add-region">Ավելացնել Համայնք</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif
                @endif
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
