<x-dashboard-layout pagename="Edit Sale">
    <br>
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">Edit Sale</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-12">

                        @include('vendor._errors')

                        <form action="{{ route('sales.update', ['sale' => $sale->encrypted_id()]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">

                                    <label> Name <span style="color:red">*</span></label>

                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                        value="{{ old('name', $sale->name) }}">

                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">

                                    <label> Timezone <span style="color:red">*</span></label>
                                    <select name="user_timezone_id" id="" class="form-control user_timezone_id">
                                        @if($sale->user_timezone_id)
                                            <option value="{{$sale->user_timezone_id}}">{{$sale->timezone->name}}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">

                                    <label>Pipeline<span style="color:red">*</span></label>
                                    <select name="pipeline_id" id="pipeline_id" class="form-control" onchange="getPipelineStage(this.value)">
                                        <option value="">Select Pipeline</option>
                                        @foreach ($pipelines as $pipeline)
                                            <option value="{{$pipeline->id}}" {{$sale->pipeline_id == $pipeline->id ? 'selected' : ''}}>{{$pipeline->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">

                                    <label>Pipeline Stage<span style="color:red">*</span></label>
                                    <select name="pipeline_stage_id" id="pipeline_stage_id" class="form-control">
                                        <option value="">Select Pipeline Stage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Close Date</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="close_date" value="{{ old('close_date', \Carbon\Carbon::parse($sale->close_date)->format('Y-m-d')) }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Discount Percentage</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="overall_discount_percentage" step="any" placeholder="Discount Percentage"
                                            name="overall_discount_percentage" value="{{ old('overall_discount_percentage', $sale->discount_percentage) }}" onkeyup="getFinalPrice()">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Price</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="price" step="any" placeholder="price"
                                            name="price" value="{{ old('price', $sale->price) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Final Price</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="final_price" step="any" placeholder="Final Price"
                                            name="final_price" value="{{ old('final_price', $sale->final_price) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Organization</label>
                                    <select class="organization_id form-control" name="organization_id">
                                        @if($sale->organization_id)
                                        <option value="{{$sale->organization_id}}" selected>{{$sale->organization->name}}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Sale Owner</label>
                                    <select class="form-control owner_id" name="owner_id">
                                        @if($sale->owner_id)
                                            <option value="{{$sale->owner_id}}">{{$sale->saleOwner->full_name}}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Sale Type</label>
                                    <select class="form-control" name="sale_type_id">
                                            <option value="1" {{$sale->sale_type_id == 1 ? 'selected' : ''}}>New Business</option>
                                            <option value="2" {{$sale->sale_type_id == 2 ? 'selected' : ''}}>Existing Business</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Priority</label>
                                    <select class="form-control" name="priority">
                                        <option value="1" {{$sale->priority == 1 ? 'selected' : ''}}>Low</option>
                                        <option value="2" {{$sale->priority == 2 ? 'selected' : ''}}>Medium</option>
                                        <option value="3" {{$sale->priority == 3 ? 'selected' : ''}}>High</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Contacts <span style="color:red">*</span></label>
                                    <select class="contact_id form-control" name="contact_id[]" multiple>
                                        @foreach ($contacts as $contact)
                                            <option value="{{$contact->contact_id}}" selected>{{$contact->contact->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label>Solutions <span style="color:red">*</span></label>
                                    <select class="form-control solution" id="solution_id" name="solution_id[]" multiple>
                                        @foreach ($solutions as $solution)
                                            <option value="{{$solution->solution_id}}" selected>{{$solution->solution->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row" id="add_solution"></div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                                    <label>Description</label>
                                    <textarea name="description" id="" class="form-control">{{old('description', $sale->description)}}</textarea>
                                </div>
                            </div>
                            <div class="row justify-content-md-center mb-4 borderd">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            $(document).ready(function() {
                getPipelineStage({{$sale->pipeline_id}});

                var solutions = $('#solution_id').val();
                let saleId= "{{$sale->id}}";
                $.ajax({
                    url: '{{ route("get-solution-price-edit") }}',
                    type: 'POST',
                    data: {solutions: solutions, saleId:saleId, _token: '{{ csrf_token() }}'},
                    dataType: 'json',
                    success: function(response) {
                        $('#add_solution').html(response.partial);
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })
            function getPipelineStage(pipelineId){
                    if(pipelineId) {
                        $.ajax({
                            url: '{{ route("get_pipeline_stage") }}',
                            type: 'POST',
                            data: {pipelineId: pipelineId, _token: '{{ csrf_token() }}'},
                            dataType: 'json',
                            success: function(response) {
                                let pipelineStageId= "{{$sale->pipeline_stage_id}}";
                                var pipelineStages = response.pipelineStages;
                                $('#pipeline_stage_id').empty().append('<option value="">Select Pipeline Stage</option>');
                                $.each(pipelineStages, function(index, element) {
                                    $('#pipeline_stage_id').append(`<option value="${element['id']}" ${element['id'] == pipelineStageId ? 'selected' : ''}>${element['name']}</option>`);
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    } else {
                        $('#pipeline_stage_id').empty().append('<option value="">Select Pipeline Stage</option>');
                    }
            }
            
            $('#solution_id').select2({
                placeholder: 'Select an item',
                ajax: {
                    url: '/get-solutions',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.value,
                                    id: item.id
                                }
                            })
                        };
                    },

                }
            });

        $('#solution_id').change(function(e) {
            e.preventDefault();
            let solutions = $('#solution_id').val();
            let saleId= "{{$sale->id}}";
            $.ajax({
                url: '{{ route("get-solution-price-edit") }}',
                type: 'POST',
                data: {solutions: solutions, saleId: saleId, _token: '{{ csrf_token() }}'},
                dataType: 'json',
                success: function(response) {
                    $('#add_solution').html(response.partial);
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
                
        });

                $('#country_id').change(function() {
                    var country = $(this).val();
                    if(country) {
                        $.ajax({
                            url: '{{ route("getStates") }}',
                            type: 'POST',
                            data: {country: country, _token: '{{ csrf_token() }}'},
                            dataType: 'json',
                            success: function(response) {
                                var states = response.states;
                                $('#city_id').empty().append('<option value="">Select City</option>');
                                $('#state_id').empty().append('<option value="">Select State</option>');
                                $.each(states, function(index, element) {
                                    $('#state_id').append('<option value="' + element['id'] + '">' + element['name'] + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    } else {
                        $('#state_id').empty().append('<option value="">Select State</option>');
                    }
                });

                $('#state_id').change(function() {
                    var state = $(this).val();
                    if(state) {
                        $.ajax({
                            url: '{{ route("getCities") }}',
                            type: 'POST',
                            data: {state: state, _token: '{{ csrf_token() }}'},
                            dataType: 'json',
                            success: function(response) {
                                var cities = response.cities;
                                $('#city_id').empty().append('<option value="">Select City</option>');
                                $.each(cities, function(index, element) {
                                    $('#city_id').append('<option value="' + element['id'] + '">' + element['name'] + '</option>');
                                });
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    } else {
                        $('#city_id').empty().append('<option value="">Select City</option>');
                    }
                });

        $('.contact_id').select2({
            placeholder: 'Select an item',
            ajax: {
                url: '/get-contact',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    
                    return {

                        results: $.map(data, function(item) {
                            return {

                                text: item.value,
                                id: item.id
                            }
                        })
                    };
                },

            }
        });

        $('.organization_id').select2({
            placeholder: 'Select an item',
            ajax: {
                url: '/get-organization',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {

                        results: $.map(data, function(item) {
                            return {

                                text: item.value,
                                id: item.id
                            }
                        })
                    };
                },

            }
        });

        $('.owner_id').select2({
            placeholder: 'Select an item',
            ajax: {
                url: '/get-staffs',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    console.log(data);
                    return {

                        results: $.map(data, function(item) {
                            return {

                                text: item.value,
                                id: item.id
                            }
                        })
                    };
                },

            }
        });

        function getFinalPrice(){
            let totalPrice= $('#price').val()
            let finalPrice= 0;
            let discountAmount= 0;
            let discountPercentage= $('#overall_discount_percentage').val();

            if(discountPercentage > 0){
                discountAmount= parseFloat((totalPrice*discountPercentage)/100);
                finalPrice= totalPrice - discountAmount;
                $('#final_price').val(finalPrice);
            }else{
                $('#final_price').val(totalPrice);
            }
        }

        
        </script>
    </x-slot>
</x-dashboard-layout>