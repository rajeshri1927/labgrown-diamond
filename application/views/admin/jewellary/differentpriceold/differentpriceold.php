<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Different Prices</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
    <style>
    .upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}



.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>
<div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h5><i class="fa fa-align-justify"></i> Different Price Table</h5>
                    </div>
                    <!--<button class="btn btn-primary float-right toggle-form"> Add Table </button>-->
                </div>
                <div class="card-body">
                <form action="/your-server-endpoint" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 mt-2">
                            <select class="form-control" name="product_sub_category" id="product_sub_category" data-validation="required">
							<option>Select Table</option>
                            <?php 
								if(isset($sub_categories) && !empty($sub_categories)) {
									echo "<option value='' disabled='disabled' selected='selected'>Select Sub Category</option>";
									foreach ($sub_categories as $sub_category) { ?>
										<option value="<?php echo $sub_category['sub_category_id'] ?>" <?php echo(isset($product['product_sub_category']) && !empty($product['product_sub_category']) && $product['product_sub_category'] ==  $sub_category['sub_category_id'])?'selected':''; ?>> <?php echo $sub_category['sub_category_title']; ?> </option>
									<?php }
								} else{
									echo "<option>No tables available</option>";
								}
							?>
						</select>
                        </div>
                        <div class="col-md-4">
                            <div class="upload-btn-wrapper">
                            <button class="btn btn-primary">Upload</button>
                                <input type="file" name="myfile" />
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
</form>
                    <!-- Heading for Price Listing -->
                    <h4 class="mt-4">Table Price Listing</h4>
                    <!-- Search Box -->
                    <div class="mb-4">
                        <input type="text" id="tableFilter" class="form-control" placeholder="Search in tables..." onkeyup="filterTables()">
                    </div>
                    <!-- Row for tables -->
                    <div class="row mt-4">
                        <!-- Table 1 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 1</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>100000000</td>
                                        <td>500000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>100000000</td>
                                        <td>500000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 2 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 2</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>200000000</td>
                                        <td>600000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>200000000</td>
                                        <td>600000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 3 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 3</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>300000000</td>
                                        <td>700000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>300000000</td>
                                        <td>700000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 4 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 4</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>400000000</td>
                                        <td>800000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>400000000</td>
                                        <td>800000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 5 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 5</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>500000000</td>
                                        <td>900000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>500000000</td>
                                        <td>900000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 6 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 6</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>600000000</td>
                                        <td>1000000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>600000000</td>
                                        <td>1000000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 7 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 7</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>700000000</td>
                                        <td>1100000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>700000000</td>
                                        <td>1100000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 8 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 8</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>800000000</td>
                                        <td>1200000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>800000000</td>
                                        <td>1200000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 9 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 9</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>900000000</td>
                                        <td>1300000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>900000000</td>
                                        <td>1300000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 10 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 10</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1000000000</td>
                                        <td>1400000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>1000000000</td>
                                        <td>1400000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table 11 -->
                        <div class="col-md-6 mb-4 table-container">
                            <h5>Table 11</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>From</th>
                                        <th>To</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1100000000</td>
                                        <td>1500000000</td>                           
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>1100000000</td>
                                        <td>1500000000</td>                           
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button class="btn btn-primary float-right mb-2 mr-2">Submit</button>
                </div>
            </div>

            </div>
            </div>
