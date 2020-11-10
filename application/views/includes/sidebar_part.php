<div class="side">
    <div class="sidebar-head">
    <label for="option"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Categories</label> 
    <ul style=""  class="nav ">
        <li class="" class="" id="cars-display"><a style="color: #ff5500; font-weight:bold;" href="<?php echo site_url('pages/home'); ?>"><i class="fa fa-car"></i>  CARS <span id="car-span" style="float:right" class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a></li>
        <li class="" id="parts-display"><a style="color: #ff5500; font-weight:bold;" href="<?php echo site_url('pages/home_parts'); ?>"></span><i class="fa fa-cogs"></i>  PARTS <span id="part-span" style="float:right" class="glyphicon glyphicon-chevron-right" aria-hidden="true"></a></li>
    </ul>
    </div>
    <div class="sidebar-content"> 
        <div class="parts-sidebar" id="parts-sidebar">
            <label for="search">FIND PARTS AVAILABLE:</label>
            <p style="font-size:8pt;">Search using the brand, category, or dealer name</p>
            <div style="margin-top:10pt;" class="container-fluid">
                <form>
                    <div class="form-group">
                    <input type="text" class="form-control partsearch" id="partsearch" name="partsearch" placeholder="Search Brand ...">
                    </div>
                    <input type="submit" style="background-color:#ff5500;" class="btn btn-warning" id="partSearch" name="partSearch">
                </form>
            </div>
            <hr>
            <div class="part-list">
            <ul><form>
                    <input type="submit" id="inter" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="INTERNAL ACCESSORIES">
                </form>
                <form>
                    <input type="submit" id="exter" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="EXTERNAL ACCESSORIES">
                </form>
                <form>
                    <input type="submit" id="per" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="PERFORMANCE PARTS">
                </form>
                <form>
                    <input type="submit" id="auto" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="AUTOMOTIVE LIGHTING">
                </form>
                <form>
                    <input type="submit" id="wheel" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="WHEELS">
                </form>
                <form>
                    <input type="submit" id="tires" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="TIRES">
                </form>
                <form>
                    <input type="submit" id="audio" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="AUDIO">
                </form>
                <form>
                    <input type="submit" id="elect" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="ELECTRONICS">
                </form>
                <form>
                    <input type="submit" id="repair" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="REPAIR PARTS">
                </form>
                <form>
                    <input type="submit" id="body" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="BODY PARTS">
                </form>
                <form>
                    <input type="submit" id="tools" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="TOOLS">
                </form>
                <form>
                    <input type="submit" id="garage" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="GARAGE">
                </form>
                <form>
                    <input type="submit" id="camper" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="CAMPER">
                </form>
                <form>
                    <input type="submit" id="out" style="padding:0px 0px 0px 0px; margin-bottom: -13px" class="btn btn-warning" value="OUTDOOR RECREATION">
                </form>
            </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="sidebar-head">
        <label for="option"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Advance Search</label> 
    </div>
    <input type="submit" style="background-color:#ff5500;" class="btn btn-warning" data-toggle="modal" value="Advance Search" data-target="#filter">
    <ul class="nav ">
        <li class="" class="" id="cars-display"><a style="color: #119e0c; font-weight:bold;" href="<?php echo site_url('pages/home_parts'); ?>"><i class="fa fa-times"></i> Clear Advance Search<span id="car-span" style="float:right" aria-hidden="true"></span></a></li>
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
                            <label>Parts Category:</label>
                                <select class="form-control" id="cat" name="cat">
                                    <option value="">-- Select Maker --</option>
                                    <option value="INTERNAL ACCESSORIES">Internal Accessories</option>
                                    <option value="EXTERNAL ACCESSORIES">External Accessories</option>
                                    <option value="PERFORMANCE PARTS">Performance Parts</option>
                                    <option value="AUTOMOTIVE LIGHTING">Automotive Lighting</option>
                                    <option value="WHEELS">Wheels</option>
                                    <option value="TIRES">Tires</option>
                                    <option value="AUDIO">Audio</option>
                                    <option value="ELECTRONICS">Electronics</option>
                                    <option value="REPAIR PARTS">Repair Parts</option>
                                    <option value="BODY PARTS">Body Parts</option>
                                    <option value="TOOLS">Tools</option>
                                    <option value="GARAGE">Garage</option>
                                    <option value="CAMPER">Camper</option>
                                    <option value="OUTDOOR RECREATION">Outdoor Recreation</option>
                                </select>
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="ct" name="submit" value="Search">
                            </form>
                            <hr>
                            <form>
                            <label>Brand:</label>
                                <input type="text" class="form-control" id="brand" name="brand">
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="br" name="submit" value="Search">
                            </form>
                            <hr>
                            <form>
                            <label>Color:</label>
                                <input type="text" class="form-control" id="color" name="color">
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="co" name="submit" value="Search">
                            </form>
                            <hr>
                            <form>
                            <label>Model Name:</label>
                                <input type="text" class="form-control" id="modname" name="modname">
                                <input type="submit" style="background-color: #f2eded"  class="btn" id="mod" name="submit" value="Search">
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>