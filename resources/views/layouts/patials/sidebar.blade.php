<div class="sidebar">
    <ul class="sidebar-nav">
        <li id="sidebar-nav">
            <a href="/" ><h5>Employee Management</h5></a>
        </li>
        <li>
            <a href="{{route('home')}}"  id="home">Home <i class="fa fa-home menu-icon fa-2x" aria-hidden="true"></i></a>
        </li>
        <li>
            <a href="{{route('employee.index')}}" id="employees">Employees<i class="fas fa-user-friends menu-icon fa-2x" aria-hidden="true"></i></a>
        </li>
        <li>
            <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">log out<i class="fa fa-sign-out menu-icon fa-2x" aria-hidden="true"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>