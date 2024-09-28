 <!--	Search   -->
<section id="search home">
    <div class="overlay-black w-100 slider-banner1 position-relative" style="background-image: url('{{ asset('assets/frontend/image/car.png') }}'); background-size: cover; background-position: center center; background-repeat: no-repeat;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-12">
                    <div class="text-white">
                        <h1 class="mb-4"><span class="text-success">Let us</span><br>
                      Search the car</h1>
                        <form method="post" action="productsgrid.php">
                            <div class="row">
                                <div class="col-md-6 col-lg-2">
                                    <div class="form-group">
                                        <select class="form-control" name="type">
                                            <option value="">Car Type</option>
                                            <option value="apartment">Apartment</option>
                                            <option value="flat">Flat</option>
                                            <option value="house">House</option>
                                            <option value="vehicle">Vehicle</option>
                                            <option value="workers">Workers</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-2">
                                    <div class="form-group">
                                        <select class="form-control" name="stype">
                                            <option value="">Car Brand</option>
                                            <option value="rent">Rent</option>
                                            <option value="sale">Sale</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="daily rent price" placeholder="daily rent price" required>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-2">
                                    <div class="form-group">
                                        <button type="submit" name="filter" class="btn btn-success w-100">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
