@foreach($sites as $site)
                    <div class="col-lg-4  col-md-4 col-sm-12" >

                        <div class="card text-dark bg-white mb-3 shadow-sm " style="max-width: 18rem; border-radius: 40px; ">
                            <div class="card-header text-white " style="border-radius: 40px; background-color:#304674 !important">
                                <h5 class=" font-weight-bold text-center ">{{$site->site_domain}}</h5>
                            </div>
                            <div class="card-body">
                                <p>
                                    <i class="flaticon-check-mark mr-2 " style="color:#304674"></i>
                                    <span class="card-text text-grey font-weight-bold ">Service :</span>
                                    <span style="color:#304674">{{$site->service}}</span>
                                </p>
                                <p>
                                    <i class="flaticon-check-mark mr-2 " style="color:#304674"></i>
                                    <span class="card-text text-grey font-weight-bold" >DA :</span>
                                    <span style="color:#304674">{{$site->da}}</span>
                                </p>
                                <p>
                                    <i class="flaticon-check-mark mr-2 " style="color:#304674"></i>
                                    <span class="card-text text-grey font-weight-bold">BackLink Type :</span>
                                    <span style="color:#304674">{{$site->backlink_type}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach