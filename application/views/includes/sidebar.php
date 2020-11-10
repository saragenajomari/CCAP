<div class="side">
<div class="sidebar-head">
<label for="option"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Categories</label> 
<ul style=""  class="nav ">
    <li class="" class="" id="cars-display"><a style="color: #ff5500; font-weight:bold;" href="<?php echo site_url('pages/home'); ?>"><i class="fa fa-car"></i>  CARS <span id="car-span" style="float:right" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a></li>
    <li class="" id="parts-display"><a style="color: #ff5500; font-weight:bold;" href="<?php echo site_url('pages/home_parts'); ?>"></span><i class="fa fa-cogs"></i>  PARTS <span id="part-span" style="float:right" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></a></li>
</ul>
</div>
<div class="sidebar-content">
    <div class="cars-sidebar" id="cars-sidebar">
    <label for="search">FIND CARS AVAILABLE:</label>
    <p style="font-size:8pt;">Search using the brand, model, or dealer name</p>
    <div style="margin-top:10pt;" class="container-fluid">
        <form>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <div class="input-group-addon">
                       <span class="glyphicon glyphicon-search"></span>
                    </div>
                    <input class="form-control" type="text" name="carsearch" id="carsearch" placeholder="Search..">
                </div>
            </form>
            <input type="submit" style="background-color:#ff5500;" class="btn btn-warning carSearch" id="carSearch" name="submit" value="Search">
        </form>
    </div>
    </div>

</div>
<hr>
    <div class="sidebar-head">
        <label for="option"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Advance Search</label> 
    </div>
    <input type="submit" style="background-color:#ff5500;" class="btn btn-warning" data-toggle="modal" value="Advance Search" data-target="#filter">
    <ul class="nav ">
        <li class="" class="" id="cars-display"><a style="color: #119e0c; font-weight:bold;" href="<?php echo site_url('pages/home'); ?>"><i class="fa fa-times"></i> Clear Advance Search<span id="car-span" style="float:right" aria-hidden="true"></span></a></li>
    </ul>
    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="padding:0pt;" class="modal-header">
                    <nav style="margin-bottom:0pt;">
                        <div class="container-fluid">
                            <ul class="nav">
                              <li style="border-right: 1px solid  #e6e6e6; text-align: center;" class="modal-title"><a style="color: black; font-weight:bold;" href="#"><i class="fa fa-filter"></i> ADVANCE SEARCH</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="modal-body">
                            <form>
                            <label>Make:</label>
                                <select class="form-control" id="maker" name="maker">
                                    <option value="">-- Select Maker --</option>
                                    <option value="Acura">Acura</option>
                                    <option value="Alfa_Romero">Alfa Romero</option>
                                    <option value="Aston_Martin">Aston Martin</option>
                                    <option value="Audi">Audi</option>
                                    <option value="Bentley">Bentley</option>
                                    <option value="BMW">BMW</option>
                                    <option value="Buick">Buick</option>
                                    <option value="Cadillac">Cadillac</option>
                                    <option value="Chevrolet">Chevrolet</option>
                                    <option value="Chrysler">Chrysler</option>
                                    <option value="Daewoo">Daewoo</option>
                                    <option value="Dodge">Dodge</option>
                                    <option value="Ferarri">Ferarri</option>
                                    <option value="FIAT">FIAT</option>
                                    <option value="Fisker">Fisker</option>
                                    <option value="Ford">Ford</option>
                                    <option value="Freightliner">Freightliner Light Duty</option>
                                    <option value="Genesis">Genesis</option>
                                    <option value="GMC">GMC</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Hummer">Hummer</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="INFINITI">INFINITI</option>
                                    <option value="Isuzu">Isuzu</option>
                                    <option value="Jaguar">Jaguar</option>
                                    <option value="Jeep">Jeep</option>
                                    <option value="Karma Automotive">Karma Automotive</option>
                                    <option value="Kia">Kia</option>
                                    <option value="Lamborghini">Lamborghini</option>
                                    <option value="Land Rover">Land Rover</option>
                                    <option value="Lexus">Lexus</option>
                                    <option value="Lincoln">Lincoln</option>
                                    <option value="Lotus">Lotus</option>
                                    <option value="Maserati">Maserati</option>
                                    <option value="Maybach">Maybach</option>
                                    <option value="Mazda">Mazda</option>
                                    <option value="McLaren">McLaren</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                    <option value="Mercury">Mercury</option>
                                    <option value="MINI">MINI</option>
                                    <option value="Mitsubishi">Mitsubishi</option>
                                    <option value="Nissan">Nissan</option>
                                    <option value="Oldsmobile">Oldsmobile</option>
                                    <option value="Panoz">Panoz</option>
                                    <option value="Plymouth">Plymouth</option>
                                    <option value="Pontiac">Pontiac</option>
                                    <option value="Porsche">Porsche</option>
                                    <option value="Ram Truck">Ram Truck</option>
                                    <option value="Rolls-Royce">Rolls-Royce</option>
                                    <option value="Saab">Saab</option>
                                    <option value="Saturn">Saturn</option>
                                    <option value="Scion">Scion</option>
                                    <option value="Smart">Smart</option>
                                    <option value="Subaru">Subaru</option>
                                    <option value="Suzuki">Suzuki</option>
                                    <option value="Tesla Motors">Tesla Motors</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Volkswagen">Volkswagen</option>
                                    <option value="Volvo">Volvo</option>
                                </select>
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="mkr" name="submit" value="Search">
                            </form>
                            <hr>
                            <form>
                            <label>Year:</label>
                                <input type="number" class="form-control" id="modyear" name="modyear" min="1990" max="2018" step="1">
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="yr" name="submit" value="Search">
                            </form>
                            <hr>
                            <form>
                            <label>Seating Capacity:</label>
                                <input type="number" class="form-control" id="seatcap" name="seatcap" min="1" max="15" step="1" numeric>
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="sc" name="submit" value="Search">
                            </form>
                            <hr>
                            <form>
                            <label>Transmission:</label>
                                <select class="form-control" id="transmission" name="transmission">
                                    <option value="">-- Select Transmission --</option>
                                    <option value="AT">Automatic</option>
                                    <option value="MT">Manual </option>
                                    <option value="CVT">CVT</option>
                                </select>
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="tran" name="submit" value="Search">
                            </form>
                            <hr>
                            <form>
                            <label>Body Style:</label>
                                <select class="form-control" id="bodstyle" name="bodstyle">
                                    <option value="">-- Select Body Style --</option>
                                    <option value="SUV">SUV</option>
                                    <option value="Trucks">Trucks</option>
                                    <option value="Sedan">Sedan</option>
                                    <option value="Van">Van</option>
                                    <option value="Coupe">Coupe</option>
                                    <option value="Wagon">Wagon</option>
                                    <option value="Convertible">Convertible</option>
                                    <option value="Sports Car">Sports Car</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Crossover">Crossover</option>
                                    <option value="Luxury Car">Luxury Car</option>
                                    <option value="Hybrid/Electic Car">Hybrid/Electic Car</option>
                                </select>
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="bs" name="submit" value="Search">
                            </form>
                            <hr>
                            <form>
                            <label>Drive Type:</label>
                                <select class="form-control" id="driveType" name="driveType">
                                    <option value="">-- Select Drive Type --</option>
                                    <option value="FWD">FWD</option>
                                    <option value="AWD">AWD</option>
                                    <option value="RWD">RWD</option>
                                    <option value="4WD">4WD</option>
                                </select>
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="dt" name="submit" value="Search">
                            </form>
                            <hr>
                            <form>
                            <label>Fuel Type:</label>
                                <select class="form-control" id="fType" name="fType">
                                    <option value="">-- Select Fuel Type --</option>
                                    <option value="Gasoline">Gasoline</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="LPG">LPG</option>
                                    <option value="Ethanol">Ethanol</option>
                                    <option value="Bio-diesel">Bio-diesel</option>
                                </select>
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="ft" name="submit" value="Search">
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>