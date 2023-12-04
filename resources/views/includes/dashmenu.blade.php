
<div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
    <div class="dash__pad-1">
        <img src="{{ auth()->user()->profilepic}}" style="display:block; width: 150px; height:150px; margin:auto; margin-bottom: 1rem; border-radius: 50%;"/>
        <span class="dash__text u-s-m-b-16" style="text-align: center;">Hello, {{ auth()->user()->fname }}
            {{ auth()->user()->lname }}</span>
        <ul class="dash__f-list">
            
            <li>

                <a  @if(request()->is('myaccount')) class="dash-active" @endif href="{{ route('myaccount') }}">Manage My
                    Account</a>
            </li>
            <li>

                <a @if(request()->is(['myprofile' , 'editprofile'])) class="dash-active" @endif href="{{ route('myprofile') }}">My Profile</a>
            </li>
            <li>

                <a @if(request()->is(['myaddress','editaddress'])) class="dash-active" @endif href="{{route('myaddress')}}">My Address</a>
            </li>

            <li>

                <a @if(request()->is('myorders')) class="dash-active" @endif href="{{route('myorders')}}">My Orders</a>
            </li>


        </ul>
    </div>
</div>