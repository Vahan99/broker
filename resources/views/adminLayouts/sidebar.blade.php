<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                @if(Auth::user()->admin == 4)
                    <li>
                        <a href="{{route('superadmin.index')}}"><i class="fa fa-tachometer"></i> <span> Գլխավոր </span> </a>
                    </li>
                    <li class="has_sub">
                        <a href="#"><i class="fa fa-building"></i> <span> Ընկերություններ </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'user-list', 0) ? 'active' : ''}}"><a href="{{route('company.index')}}">Բոլորը</a></li>
                            <li class="{{strrpos(url()->full(), 'add-user', 0) ? 'active' : ''}}"><a href="{{route('company.create')}}">Ավելացնել</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="#"><i class="fa fa-users"></i> <span> Ադմիններ </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'add-user', 0) ? 'active' : ''}}"><a href="{{route('company.admin.index')}}">Բոլորը</a></li>
                            <li class="{{strrpos(url()->full(), 'add-user', 0) ? 'active' : ''}}"><a href="{{route('company.admin.create')}}">Ավելացնել</a></li>
                        </ul>
                    </li>
                    <li class="has_sub">
                        <a href="#"  class="{{strrpos(url()->full(), 'regions', 0) ? 'active' : ''}} waves-effect"><i class="fa fa-globe"></i> <span> Համայնք </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'regions-list', 0) ? 'active' : ''}}"><a href="/admin/regions/regions-list/1">Բոլորը</a></li>
                            @if(Auth::user()->admin != 2)
                                <li class="{{strrpos(url()->full(), 'add-region', 0) ? 'active' : ''}}"><a href="/admin/regions/add-region">Ավելացնել</a></li>
                            @endif
                        </ul>
                    </li>
                    @else
                    <li class="has_sub">
                        <a href="#"  class="{{strrpos(url()->full(), 'reality', 0) ? 'active' : ''}} waves-effect"><i class="ti-home"></i> <span> Անշարժ Գույքեր </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'reality-list', 0) ? 'active' : ''}}"><a href="/admin/reality/reality-list">Բոլորը</a></li>
                            @if(Auth::user()->admin != 1)
                                <li class="{{strrpos(url()->full(), 'add-reality', 0) ? 'active' : ''}}"><a href="/admin/reality/add-reality?type=apartment&&value=0">Ավելացնել</a></li>
                            @endif
                        </ul>
                    </li>
                    @if(Auth::user()->admin != 2)

                    <li class="has_sub">
                        <a href="#"  class="{{strrpos(url()->full(), 'gorcakal', 0) ? 'active' : ''}} waves-effect"><i class="ti-user"></i> <span> Աշխատակիցներ </span> </a>
                        <ul class="list-unstyled">
                            <li class="{{strrpos(url()->full(), 'user-list', 0) ? 'active' : ''}}"><a href="/admin/broker/user-list">Բոլորը</a></li>
                            <li class="{{strrpos(url()->full(), 'add-user', 0) ? 'active' : ''}}"><a href="/admin/broker/add-user">Ավելացնել</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->admin == 2)
                        <li class="has_sub">
                            <a href="javascript:;"  class=""><i class="fa fa-users"></i> <span> Գնորդ / Վարձակալ </span> </a>
                            <ul class="list-unstyled">
                                <li class=""><a href="{{route('customer.index')}}">Բոլորը</a></li>
                                <li class=""><a href="{{route('customer.create')}}?customer=0">Ավելացնել</a></li>
                                <li class=""><a href="{{route('customer.filter.create')}}?type=apartment&&value=0">Ավելացնել պահանջվող գույքեր</a></li>
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
