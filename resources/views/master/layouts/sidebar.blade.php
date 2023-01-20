<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" id="sidebar">
    <section class="sidebar">
        <div class="content pt-50 pb-30 ps-30">
            <div class="menus mt-4" id="nav-active">
                <div class="item mb-30 {{ request()->is('master') ? 'active' : '' }}" >
                    <span class="material-symbols-outlined"> dashboard </span>
                    <p class="item-title m-2">
                        <a href="/master" class="text-lg text-decoration-none">Overview</a>
                    </p>
                </div>
                <div class="item mb-30 {{ request()->is('master/admin*') ? 'active' : '' }}" >
                <span class="material-symbols-outlined"> supervisor_account </span>
                    <p class="item-title m-2">
                        <a href="/master/admin" class="text-lg text-decoration-none">Admins</a>
                    </p>
                </div>
                <div class="item mb-30 {{ request()->is('master/product*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined"> inventory_2 </span>
                    <p class="item-title m-2">
                        <a href="/master/product" class="text-lg text-decoration-none">Products</a>
                    </p>
                </div>
                <div class="item mb-30 {{ request()->is('master/order*') ? 'active' : '' }}">
                    <span class="material-symbols-outlined"> shopping_bag </span>
                    <p class="item-title m-2">
                        <a href="/master/order" class="text-lg text-decoration-none">Orders</a>
                    </p>
                </div>
                <div class="item mb-30 {{ request()->is('master/payment') ? 'active' : '' }}">
                    <span class="material-symbols-outlined"> paid </span>
                    <p class="item-title m-2">
                        <a href="/master/payment" class="text-lg text-decoration-none">Payments Notification</a>
                    </p>
                </div>

                <div class="item mb-30 ">
                    <span class="material-symbols-outlined"> power_settings_new </span>
                    <form action="/logout" method="post">
                        @csrf
                        <p class="item-title m-2">
                            <button type="submit" class=" text-lg text-decoration-none align-middle">Log Out</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</aside>