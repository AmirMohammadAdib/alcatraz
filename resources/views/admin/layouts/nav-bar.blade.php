<div id="sidebar">
    <div class="sidebar-top">
        <div class="user-box">
            <a href="#">
                <img src="{{ asset('admin-assets/images/user/128.png') }}" alt="عکس پروفایل" class="img-circle img-responsive">
            </a>
            <div class="user-details">
                <h4>امیر ادیب</h4>
                
            </div><!-- /.user-details -->
        </div><!-- /.user-box -->
    </div><!-- /.sidebar-top -->
    <div class="side-menu-container">
        <ul class="metismenu" id="side-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="current">
                    <i class="icon-home"></i>
                    <span>داشبورد</span>
                </a>
            </li>

            <li>
                <a href="#" class="dropdown-toggle">
                    <i class="fas fa-unlock-keyhole"></i>
                    <span>احراز هویت</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('player.index') }}" class="">
                            <i class=" fas fa-gamepad"></i>
                            <span>بازیکنان</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.index') }}" class="">
                            <i class=" fas fa-user-lock"></i>
                            <span>ادمین ها</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('role.index') }}" class="">
                            <i class=" fas fa-masks-theater"></i>
                            <span>نقش ها</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="dropdown-toggle">
                    <i class=" fas fa-money-bill-transfer"></i>
                    <span>مالی</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('depoceit.index') }}" class="">
                            <i class=" fas fa-arrow-up"></i>
                            <span>واریزی های سایت</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('withdraw.index') }}" class="">
                            <i class="fas fa-arrow-down-long"></i>
                            <span>برداشتی های سایت</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="dropdown-toggle">
                    <i class="fas fa-coins"></i>
                    <span>فروشگاه cp</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('cp.index') }}" class="">
                            <i class="fab fa-product-hunt"></i>
                            <span>محصولات</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order.index') }}" class="">
                            <i class=" fas fa-cart-shopping"></i>
                            <span>سفارشات</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order.index', ['history']) }}" class="">
                            <i class=" fas fa-file-invoice-dollar"></i>
                            <span>تاریخچه معاملات</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="dropdown-toggle">
                    <img src="{{ asset('admin-assets/images/icons/call-icon.png') }}" alt="">
                    <span>اکانت ها</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('request.index') }}" class="">
                            <i class=" fas fa-users-rectangle"></i>
                            <span>درخواست های جدید</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('account.index') }}" class="">
                            <i class=" fab fa-wpforms"></i>
                            <span>اکانت ها</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('account-order.index') }}" class="">
                            <i class=" fas fa-cart-shopping"></i>
                            <span>سفارشات</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('account-order.index', ['history']) }}" class="">
                            <i class=" fas fa-file-invoice-dollar"></i>
                            <span>تاریخچه معاملات</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#" class="dropdown-toggle">
                    <i class=" fas fa-puzzle-piece"></i>
                    <span>مسابقات</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('room.index') }}" class="">
                            <i class="  far fa-circle-play"></i>
                            <span>روم های جاری</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('room.index', ['history']) }}" class="">
                            <i class="  fas fa-border-all"></i>
                            <span>روم های پایان یاقته</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('room.create') }}" class="">
                            <i class="  fas fa-plus"></i>
                            <span>روم جدید</span>
                        </a>
                    </li>
                </ul>
            </li>



            <li>
                <a href="#" class="dropdown-toggle">
                    <i class="  far fa-comments"></i>
                    <span>تیکت</span>
                </a>
                <ul>
                    <li>
                        <a href="#" class="">
                            <i class=" fas fa-envelope-circle-check"></i>
                            <span>تیکت های جدید</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="">
                            <i class=" far fa-envelope-open"></i>
                            <span>تیکت های باز</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="">
                            <i class="far fa-envelope"></i>
                            <span>تیکت های بسته</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="">
                            <i class="  fas fa-plus"></i>
                            <span>همه تیکت ها</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="">
                    <i class="   fas fa-gear"></i>
                    <span>تنظیمات</span>
                </a>
            </li>

        </ul><!-- /#side-menu -->
    </div><!-- /.side-menu-container -->
</div><!-- /#sidebar -->