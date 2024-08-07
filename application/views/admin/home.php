<ol class="breadcrumb">
    <li class="breadcrumb-item">Home</li>
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 clearfix">
                        <i class="fa fa-shopping-bag bg-daily-meat p-3 font-2xl mr-3 float-left"></i>
                        <div class="h5 text-daily-meat mb-0 mt-2"><?php echo $order_count; ?></div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs">Orders</div>
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="font-weight-bold font-xs btn-block text-muted" href="admin/orders">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-3 clearfix">
                        <i class="fa fa-cubes bg-daily-meat p-3 font-2xl mr-3 float-left"></i>
                        <div class="h5 text-daily-meat mb-0 mt-2"><?php echo $product_count; ?></div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs"> Jewellry Products </div>
                    </div>
                    <div class="card-footer px-3 py-2">
                        <a class="font-weight-bold font-xs btn-block text-muted" href="admin/products">View More <i class="fa fa-angle-right float-right font-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>