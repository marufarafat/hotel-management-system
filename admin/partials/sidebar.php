        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.php">
                  <i class="fa fa-fw fa-dashboard"></i>
                  <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cabins">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCabin" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Cabins</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseCabin">
                    <li><a href="cabins.php">Cabins</a></li>
                    <li><a href="create-cabin.php">Create Cabin</a></li>
                    <li><a href="cabin-type.php">Cabin type</a></li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Discounts">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseDiscount" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Discounts</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseDiscount">
                    <li><a href="discounts.php">Discounts</a></li>
                    <li><a href="create-dicount.php">Create Discount</a></li>
                </ul>
            </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Booking">
            <a class="nav-link" href="booking.php">
              <i class="fa fa-fw fa-link"></i>
              <span class="nav-link-text">
                Booking</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>