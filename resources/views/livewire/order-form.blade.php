<div class="page-content">
    <div class="container">
        @if(session()->has('funds_not_enough'))
        <div class="alert alert-danger mt-2 mb-2 text-center">
            <b>{{ session()->get('funds_not_enough') }}</b>
            <p>Add funds from <a class="hover:text-red-800" href="{{ route('add-funds') }}">here</a></p>
        </div>
        @endif @if(session()->has('order-done'))
        <div class="alert alert-success mt-2 mb-2 text-center">
            {{ session()->get('order-done') }}
        </div>
        @endif
        <div class="bg-white p-4 mb-4">
            <div class="card-head">
                <h4 class="card-title">Make an order</h4>
            </div>
            <form wire:submit.prevent="sendOrder()">
                @csrf
                <div class="form-group mb-4">
                    <label for="services"><b class="text-blue-800">Service Name</b></label>
                    <select id="services" class="form-control" wire:change="getService()" required wire:model="currentService">
                        <option selected value="null">Choose one</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->description }}</option>
                        @endforeach
                    </select> @error('currentService') <span class="text-red-500"> {{ $message }}</span> @enderror @if($serviceExtras !== null)
                    @if($chosenService != null && $chosenService != "null")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mx-4 mt-4 ">
                                @if($serviceExtras->isNotEmpty())
                                    <h6 class="text-info text-left ">Available Extras</h6>
                                    <div class="py-4">
                                        <h2 style="color:#fe465d;" class="text-center text-lg">Use 3 indexes together for fast results</h2>
                                        <div class="mt-2">
                                            @foreach($serviceExtras as $serviceExtra)
                                                <input type="checkbox" value="{{ $serviceExtra->extra->id }}" wire:model="currentExtras" wire:change="updatePriceWithExtraServices()" class="mr-2">{{ $serviceExtra->extra->description }} <span class="text-xs text-blue-500">price : USD {{ $serviceExtra->extra->price_per_item }}</span>
                                                <br>
                                            @endforeach
                                        </div>
                                    </div>
                                    @error('currentExtras') <span class="text-red-500">{{ $message }}</span> @enderror
                                @else
                                    <h6 class="text-info">No extra services available.</h6>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 p-4">
                            <h5 class="text-info text-left">Service Description</h5>
                            @if($chosenService != null && $chosenService != "null" && $chosenService->short_description)
                            <div class="py-4">
                                @php $lines = explode("➤", $chosenService->short_description); foreach ($lines as &$line) { echo "
                                <div class=\" choose-content-area text-left \">

                                    <div class=\" choose-text \">
                                        <i class=\" flaticon-check-mark \"></i>
                                        <p>" .$line."
                                        </p>
                                    </div>
                                </div>
                                "; } @endphp
                            </div>
                            @else
                            <h3 class="text-center">No available description for this service yet.</h3>
                            @endif
                        </div>
                    </div>
                    <!-- best formula pop up -->
                    <div class="row pb-5 form-group ml-3">
                        <div>
                            <div align="center" data-toggle="modal" data-target="#popup_modal" >
                                <a class="formula-button " > <span>See our best Formula </span>  </a>
                            </div>
                        </div>
                    </div>
                    @endif


                    <!-- Modal -->
                    <div class="modal fade" id="popup_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Our Best Formula</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="/assets/img/formula/formula.jpg" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="text-dark mr-4" data-dismiss="modal">Close</button>
                            <a href="/assets/img/formula/formula.jpg" target="_blank">
                                <button type="button" class="btn" style="background:#FE465D;">See Full Image</button>
                            </a>

                        </div>
                        </div>
                    </div>
                    </div>
                    @endif

                </div>
                @if($chosenService)
                <div class="form-group">
                    <label for="quantity"><b class="text-blue-800">Quantity</b></label>
                    <input id="quantity" wire:model.lazy="quantity" class="form-control" required placeholder="{{$min_qte}}" type="number" min="{{$min_qte}}" /> @if($errors->has('quantity'))
                    <span class="text-red-500">{{ $errors->first('quantity') }}</span> @endif
                </div>
                @endif

                <!-- <div class="form-group">
                    <label for="links">
                        <b class="text-blue-800">Links</b> <span class="text-blue-700">(Better to make one of them an authority link)</span>
                    </label>
                    <textarea id="links" rows="4" required placeholder="http://example.com/page-one.html
http://example.com/page-two.html
http://example.com/page-three.html" class="form-control" wire:model.lazy="links"></textarea>
                </div> -->



                <!-- links -->
                <div class="mb-4">
                        <label for="links">
                                <b class="text-blue-800">Links</b> <span class="text-blue-700">(Better to make one of them an authority link)</span>
                        </label>
                        <div class="row col-12 form-group justify-content-between mx-0 my-1 p-0 ">
                            <input class="form-control col-md-10" id="link1" type="url" placeholder="http://example.com/page-one.html" wire:model.lazy="link1">
                            <div class="btn col-md-1 add-link-button "  id="button1" wire:click.prevent="showLink2"><i class="fas fa-plus"></i></div>
                        </div>
                            @error('link1') <span class="text-red-500"> {{ $message }}</span> @enderror

                            @if($showLink2==true)
                        <div class="row col-12 form-group justify-content-between mx-0 my-1 p-0 ">
                            <input class="form-control col-md-10" id="link2" type="url" placeholder="http://example.com/page-two.html" wire:model.lazy="link2">
                            <div class="btn col-md-1 add-link-button"  id="button2" wire:click.prevent="showLink3"><i class="fas fa-plus"></i></div>
                        </div>
                        @endif
                            @error('link2') <span class="text-red-500"> {{ $message }}</span> @enderror

                            @if($showLink3==true)
                        <div class="row col-12 form-group justify-content-between mx-0 my-1 p-0 ">
                            <input class="form-control col-md-10" id="link3" type="url" placeholder="http://example.com/page-three.html" wire:model.lazy="link3">
                        </div>
                        @endif
                            @error('link3') <span class="text-red-500"> {{ $message }}</span> @enderror

                </div>





                <div class="form-group">
                    <label for="keywords"><b class="text-blue-800">Keywords</b></label>
                    <textarea id="keywords" rows="5" required placeholder="Keywords One
Keywords Two
Keywords Three
Keywords Four
Keywords Five" class="form-control" wire:model.lazy="keywords"></textarea>
                </div>
                @error('keywords') <span class="text-red-500"> {{ $message }}</span> @enderror
                <span class="text-red-500">{{ $keywordExceedMessage }}</span>
                <div class="form-group" wire:ignore wire:key="w_brands">
                    <label for="selUser"><b class="text-blue-800">Article Niche</b> <span class="text-blue-700">(Optional)</span></label>
                    <select id='selUser' class="form-control article-categories">
                    </select>
                </div>

                <div class="form-group">
                    <label for="notes"><b class="text-blue-800">Notes</b> <span class="text-blue-700">(Optional)</span></label>
                    <textarea id="notes" rows="4" placeholder="Enter your notes ..." class="form-control" wire:model.lazy="notes"></textarea>
                </div>

                <!-- disclamer -->
                <div class="card">
                    <div class="card-body shadow-sm">
                        <div class="card-title text-uppercase" style="color:#d35d6e">
                        disclaimer

                        </div>
                        <div>

                            <p>
                            We don't guarantee 100% indexed links, we guarantee that all of the backlinks have been crawled by Google spider with some. In this case, Google decided to index it or not according to many factors.                            </p>
                            <p>
                            Google crawls them, but at that time may no enough quota available to actually make the request.
                            </p>
                            <p>
                            Google is repeatedly not able to find a good slot to crawl. But it would retry crawling anyway.
                            </p>
                            <p>
                            So we recommend you to get indexer <span class="font-weight-bold" >#2</span>  &  <span class="font-weight-bold" >#3</span> TOGETHER as Extra to get a high indexer rate not only crawled by Google, and don't forget that SEO is a long term process and needs continuation from your side
                            </p>
                            <p>
                            We recommend keeping get regular quality backlinks in your tier 1 orders and increase the number of your backlinks by getting extra indexer <span class="font-weight-bold" >#2</span>  and indexer <span class="font-weight-bold" >#3</span> together.
                        </p>
                            <p>
                            We hope you are able to continue with the Regular sequence to get the result you wish.
                            </p>



                        </div>

                    </div>
                    <div class=" p-3">
                        <input required type="checkbox" name="disclaimer" value="check" id="agree" />

                          <label for="agree"><span class="ml-3 font-weight-bold">I have read and agree to the Terms and Conditions</span> </label>

                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <button class="btn btn-sm bg-green-600">Create</button>
                    <div class="bg-yellow-400 ml-4 p-1 text-white px-4">
                        Total Price : $ {{ $extras_price + $price }}
                    </div>
                    @if(session()->has('order-sent'))
                    <div class="bg-success ml-4 p-1 text-white px-4">
                        {{ session()->get('order-sent') }}
                    </div>
                    @endif
                </div>

            </form>
        </div>
    </div>
    <!-- Script
    <script >
        document.addEventListener('livewire:load', function () {
            if(@this.executedOnce == false)
            {
                console.log('executed')
                //hide button 2
                $("#button2").hide();
                //hide input 2 and 3
                $("#link2").hide();
                $("#link3").hide();
                @this.executedOnce = true;
            }
        })





        function addLink2() {
            //hide button one
            $("#button1").hide();
            //show input two
            $("#link2").show();
            //show button two
            $("#button2").show();
        }
        function addLink3() {
            //hide button two
            $("#button2").hide();
            //show input three
            $("#link3").show();
        }
    </script> -->
    <script type="text/javascript" data-turbolinks-track="reload">
        $(document).ready(function() {
            // Load all the article categories in Select-2
            $("#selUser").select2({
                ajax: {
                    url: "{{ route('getCategories') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            search: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });

            // If a value is selected fire an event
            $('#selUser').on('select2:select', function(e) {
                window.livewire.emit('categoryChanged', e.target.value);
            });
        });
    </script>
</div>
