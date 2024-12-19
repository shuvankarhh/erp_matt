<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
    <table class="responsive table">
        <tr>
            <td>Solution</td>
            <td>Quantity<span style="color:red">*</span></td>
            <td>Unit Price</td>
            <td>Discount Percentage</td>
            <td>Amount</td>
        </tr>
        @foreach($solutions as $solution)
        <tr>
            <td>{{$solution->name}}</td>
            <td><input type="number" class="form-control" name="quantity[]" id="quantity_{{$solution->id}}" onkeyup="getAmount({{$solution->id}}); getTotalPrice(); getFinalPrice()" value="1"></td>
            <td><input type="number" class="form-control" name="unit_price" id="price_{{$solution->id}}" value="{{$solution->price}}" readonly></td>
            <td><input type="number" name="discount_percentage[]" id="discount_percentage_{{$solution->id}}" class="form-control" value="0" onkeyup="getAmount({{$solution->id}}); getTotalPrice(); getFinalPrice()"></td>
            <td><input type="number" class="form-control amount" name="amount" id="amount_{{$solution->id}}" value="{{$solution->price}}" readonly></td>
        </tr>
        @endforeach
    </table>
</div>

<script>
    $(document).ready(function(){
        let totalPrice=0;
        $('.amount').each(function(){
            totalPrice+= parseInt($(this).val());
        })

        let discountPercentage = $('#overall_discount_percentage').val();

        // if(discountPercentage > 0){
            discountAmount = parseFloat((totalPrice * discountPercentage) / 100);
        // }

        let finalPriceWithDiscount= parseFloat(totalPrice - discountAmount);

        $('#price').val(totalPrice);
        $('#final_price').val(finalPriceWithDiscount);
    })

    function getAmount(id){
        let quantity= $('#quantity_'+id).val();
        let price= $('#price_'+id).val();
        let discountPercentage= $('#discount_percentage_'+id).val();
        let amount= 0;
        let discount= 0;

        if(discountPercentage>0){
            discount= parseFloat(((quantity*price)*discountPercentage)/100);
            amount= parseFloat((quantity*price) - discount);
        }else{
            amount= parseFloat(quantity*price);
        }

        $('#amount_'+id).val(amount);
    }

    function getTotalPrice(){
        let totalPrice=0;
        $('.amount').each(function(){
            totalPrice+= parseInt($(this).val());
        })

        $('#price').val(totalPrice);
        // $('#final_price').val(totalPrice);
    }
</script>