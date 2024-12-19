<x-dashboard-layout pagename="Edit Solution">
    <x-slot name='css'>
        
    </x-slot>

    <br>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">Edit Solution</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-12">

                        @include('vendor._errors')

                        <form action="{{ route('solutions.update',['solution' => $solution->encrypted_id()]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Name <span  style="color:red" >*</span></label>
                                    <input type="text" class="form-control" placeholder="name" name="name" value="{{ old('name') ?? $solution->name ?? '-' }}" required>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>sku<span  style="color:red" >*</span></label>
                                    <input type="text" class="form-control" placeholder="sku" name="sku" value="{{ old('sku') ?? $solution->sku ?? '-' }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Description</label>
                                    <textarea name="description" id=""rows="1"  class="form-control" >{{ old('description') ?? $solution->description ?? '-' }}</textarea>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Type<span  style="color:red" >*</span></label>
                                    <select name="type" id=""  class="form-control" >
                                        <option value="">select one</option>

                                        @if (old('type') == null)

                                            @if ($solution->type == '1')
                                                <option value="1" selected>Product</option>
                                            @else
                                                <option value="1" >Product</option>
                                            @endif

                                            @if ($solution->type == '2')
                                                <option value="2" selected>Service</option>
                                            @else
                                                <option value="2">Service</option>
                                            @endif

                                        @else

                                            @if ($solution->type == '1')
                                                <option value="1" selected>Product</option>
                                            @else
                                                <option value="1" >Product</option>
                                            @endif
                                            @if ($solution->type == '2')
                                                <option value="2" selected>Service</option>
                                            @else
                                                <option value="2">Service</option>
                                            @endif

                                        @endif

                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Image</label>
                                    <div class="product-list-img">
                                        <img src="{{ $solution->image_url }}" alt="product">
                                    </div>
                                    <input type="file" class="form-control" placeholder="image" name="image" value="{{ old('image') }}" >
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Solution URL</label>
                                    <input type="text" class="form-control" placeholder="Solution URL" name="solution_url" value="{{ old('solution_url') ?? $solution->solution_url ?? null  }}" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>currency</label>
                                    <select name="currency_id" id="" class="form-control">
                                        <option value="">select one</option>
                                        @if ( old('currency_id') == null )
                                            @foreach ($currencies as $currency)
                                                @if ( $solution->currency_id == $currency->id)
                                                    <option value="{{$currency->id}}" selected>{{ $currency->name }}</option>
                                                @else
                                                    <option value="{{$currency->id}}">{{ $currency->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($currencies as $currency)
                                                @if ( old('currency_id') == $currency->id)
                                                    <option value="{{$currency->id}}" selected>{{ $currency->name }}</option>
                                                @else
                                                    <option value="{{$currency->id}}">{{ $currency->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Price</label>
                                    <input type="number" step="0.001"   class="form-control" placeholder="Price" name="price" value="{{ old('price') ?? $solution->price ?? "-" }}" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Cost </label>
                                    <input type="number" step="0.001" class="form-control" placeholder="cost" name="cost" value="{{ old('cost') ?? $solution->cost ?? "-" }}" >
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Tax Percentage</label>
                                    <input type="number" step="0.001"  class="form-control" placeholder="Tax percentage" name="tax_percentage" value="{{ old('tax_percentage') ?? $solution->tax_percentage ?? "-" }}" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Subscription Interval</label>
                                    <select name="subscription_interval" id="" class="form-control">
                                        <option value="">select one</option>
                                        @if ( old('subscription_interval') == null)

                                            @if ($solution->subscription_interval == 1)
                                                <option value="1" selected>One-time</option>
                                            @else
                                                <option value="1">One-time</option>
                                            @endif

                                            @if ( $solution->subscription_interval == 2)
                                                <option value="2" selected>Weekly</option>
                                            @else
                                                <option value="2">Weekly</option>
                                            @endif

                                            @if ($solution->subscription_interval == 3)
                                                <option value="3" selected>Monthly</option>
                                            @else
                                                <option value="3">Monthly</option>
                                            @endif

                                            @if ($solution->subscription_interval == 4)
                                                <option value="4" selected>Quarterly</option>
                                            @else
                                                <option value="4">Quarterly</option>
                                            @endif

                                            @if ($solution->subscription_interval == 5)
                                                <option value="5" selected>Semi-annually</option>
                                            @else
                                                <option value="5">Semi-annually</option>
                                            @endif

                                            @if ($solution->subscription_interval == 6)
                                                <option value="6" selected>Annually</option>
                                            @else
                                                <option value="6">Annually</option>
                                            @endif

                                        @else

                                            @if ($solution->subscription_interval == 1)
                                                <option value="1" selected>One-time</option>
                                            @else
                                                <option value="1">One-time</option>
                                            @endif

                                            @if ($solution->subscription_interval == 2)
                                                <option value="2" selected>Weekly</option>
                                            @else
                                                <option value="2">Weekly</option>
                                            @endif

                                            @if ($solution->subscription_interval == 3)
                                                <option value="3" selected>Monthly</option>
                                            @else
                                                <option value="3">Monthly</option>
                                            @endif

                                            @if ($solution->subscription_interval == 4)
                                                <option value="4" selected>Quarterly</option>
                                            @else
                                                <option value="4">Quarterly</option>
                                            @endif

                                            @if ($solution->subscription_interval == 5)
                                                <option value="5" selected>Semi-annually</option>
                                            @else
                                                <option value="5">Semi-annually</option>
                                            @endif

                                            @if ($solution->subscription_interval== 6)
                                                <option value="6" selected>Annually</option>
                                            @else
                                                <option value="6">Annually</option>
                                            @endif
                                        
                                        @endif
                                    </select>

                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-3">
                                    <label>Subscription Term</label>
                                    <input type="number" class="form-control" placeholder="Subscription Term" name="subscription_term" value="{{$solution->subscription_term }}">
                                </div>
                            </div>

                        </div>

                            <div class="row justify-content-md-center mb-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            
            </div>
        </div>
    </div>

    <x-slot name='scripts'>
        
    </x-slot>
</x-dashboard-layout>