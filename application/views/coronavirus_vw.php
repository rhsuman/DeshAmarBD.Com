<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('temp/_header'); ?>
<!--Top navbar-->
<?php $this->load->view('temp/top-navbar'); ?>

<!--Header-->
<?php $this->load->view('temp/header'); ?>

<!--main navbar-->
<?php $this->load->view('temp/main-navbar'); ?>

<!--start ticker-->
<?php $this->load->view('temp/ticker'); ?>

        <section class="container-xl mt-3">
            <div class="row">
                <section class="col-lg-12">


                    <div class="row row-deck">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card border">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader card-title">Bangladesh Total Cases</div>
                                    </div>
                                    <div class="h1 mb-3"><?php echo $BD_TOTAL_CASES; ?></div>
                                    <div class="d-flex mb-2">
                                        <div>Reported as of Today</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader card-title">Bangladesh Total Deaths</div>
                                    </div>
                                    <div class="h1 mb-3"><?php echo $BD_TOTAL_DEATHS; ?></div>
                                    <div class="d-flex mb-2">
                                        <div>Reported as of Today</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader card-title">Bangladesh Total Recovered</div>
                                    </div>
                                    <div class="h1 mb-3"><?php echo $BD_TOTAL_RECOVERED; ?></div>
                                    <div class="d-flex mb-2">
                                        <div>Reported as of Today</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader card-title">Bangladesh New Cases</div>
                                    </div>
                                    <div class="h1 mb-3"><?php echo $BD_NEW_CASES; ?></div>
                                    <div class="d-flex mb-2">
                                        <div>Since Previous Day</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row row-deck">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader card-title">World Total Cases</div>
                                    </div>
                                    <div class="h1 mb-3"><?php echo $TOTAL_CASES; ?></div>
                                    <div class="d-flex mb-2">
                                        <div>Reported as of Today</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader card-title">World Total Deaths</div>
                                    </div>
                                    <div class="h1 mb-3"><?php echo $TOTAL_DEATHS; ?></div>
                                    <div class="d-flex mb-2">
                                        <div>Reported as of Today</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader card-title">World Total Recovered</div>
                                    </div>
                                    <div class="h1 mb-3"><?php echo $TOTAL_RECOVERED; ?></div>
                                    <div class="d-flex mb-2">
                                        <div>Reported as of Today</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="subheader card-title">World New Cases</div>
                                    </div>
                                    <div class="h1 mb-3"><?php echo $NEW_CASES; ?></div>
                                    <div class="d-flex mb-2">
                                        <div>Since Previous Day</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <h4 class="m-b-30 m-t-0">Statistics Country</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Location</th>
                                                    <th>Confirmed cases</th>
                                                    <th>Deaths</th>
                                                    <th>Recovered</th>
                                                    <th>Total Tests</th>
                                                    <th>Changes since last day</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($RESULT_DATA_COUNTRY as $result) { ?>
                                                    <tr>           
                                                        <td><img src="<?php if (strpos($result['image'], 'gstatic') !== false) {
                                                    echo $result['image'];
                                                } else {
                                                    echo "https://www.gstatic.com/onebox/sports/logos/flags/" . strtolower(str_replace(" ", "_", $result['image'])) . "_icon_square.svg";
                                                }
                                                ?>
                                                                 " height="20" width="20"> <?php echo $result['country']; ?></td>
                                                        <td><?php echo number_format($result['cases']); ?></td>
                                                        <td><?php echo number_format($result['deaths']); ?></td>
                                                        <td><?php echo number_format($result['recovered']); ?></td>
                                                        <td><?php echo number_format($result['totalTests']); ?></td>
                                                        <td><?php echo number_format($result['todayCases']); ?></td>
                                                    </tr>
<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </section>
            </div>
        </section>
<?php $this->load->view('temp/footer'); ?>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            order: [],
            paging: true,
            "pageLength": 10,
            "pagingType": "full_numbers",
            "dom": '<"top"flp>rt<"bottom"ip><"clear">',
        });
    });
</script>
<?php $this->load->view('temp/_footer'); ?>
