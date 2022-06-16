@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Calculate EMI') }}</div>
                <div class="card-body">
                    <form id="emiForm">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="amont">Amount</label>
                                <input type="number" class="form-control" name="amount" id="amount" >
                                <div class="errorMsg">
                                    <amount></amount>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="interest">Interest(%)</label>
                                <input type="number" class="form-control" name="interest" id="interest" >
                                <div class="errorMsg">
                                    <interest></interest>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="duration">Duration</label>
                                <select class="form-select" name="duration" id="duration">
                                    <option value="">--- select ---</option>
                                    @foreach ($months as $month)
                                        <option value="{{ $month->month }}">{{ $month->month }}</option>
                                    @endforeach
                                </select>
                                <div class="errorMsg">
                                    <duration></duration>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2" id="calculate">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card mt-2" id="emiTable" style="display: none">
                <div class="card-header">EMI Table</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Installment</th>
                                <th>Duration</th>
                                <th>Interest </th>
                                <th>Total Cost</th>
                            </tr>
                        </thead>
                        <tbody id="table"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--script-->
<script>
    $(document).ready(function(){
        // ajax token
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // on search click calculate emi
        $('body').on('click', '#calculate', function(event){
            event.preventDefault();
            // enable emi table
            $('#emiTable').show();
            var amount = $('#amount').val();
            var interest = $('#interest').val();
            var duration = $('#duration').val();
            // getting emi data
            $.ajax({
                url: '{{ route("emi") }}',
                type: 'get',
                dataType: 'json',
                data:{
                    '_token': '{{ csrf_token() }}',
                    amount:amount, interest:interest,
                    duration:duration
                },
                // success response
                success:function(res){
                    // getting response & errors
                    if($.isEmptyObject(res.error)){
                        $('#table').html('');
                        $('#table').append(res);
                    }else{
                        ErrorMsg(res.error);
                    }
                },
            });
        });
        // error function
        function ErrorMsg(msg){
            $.each(msg, function(key, value){
                $('.errorMsg').find(key).append(value);
            });
        }
    });
</script>

@endsection
