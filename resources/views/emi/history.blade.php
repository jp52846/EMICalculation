@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">EMI History</div>
        <div class="card-body table-responsive">
            <table class="table ">
                <thead>
                    <tr>
                        <th>Amount</th>
                        <th>Interest </th>
                        <th>Duration</th>
                        <th>Date/Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($histories as $history)
                        <tr>
                            <td><i class="fa fa-inr" aria-hidden="true"></i>{{ $history->amount }}</td>
                            <td>{{ $history->interest }}%</td>
                            <td>{{ $history->duration }}m</td>
                            <td>{{ date('Y-m-d, h:ia', strtotime($history->created_at)) }}</td>
                            <td>
                                <button class="btn btn-dark btn-sm" data-id="{{ $history->id }}" id="search"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float:right">
                {{ $histories->links() }}
            </div>
        </div>
    </div>
    <div class="card mt-2" id="emiSearch" style="display: none">
        <div class="card-body table-responsive">
            <table class="table" id="table" >
                {{-- <thead>
                    <tr>
                        <th>Installment</th>
                        <th>Duration</th>
                        <th>Interest </th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody id="table">
                </tbody> --}}
            </table>
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
        $('body').on('click', '#search', function(event){
            event.preventDefault();
            var searchId = $(this).data('id');
            // enable search table
            $('#emiSearch').show();
            // getting emi data
            $.ajax({
                url: '{{ route("emi") }}',
                type: 'get',
                dataType: 'json',
                data:{
                    '_token': '{{ csrf_token() }}',
                    searchId:searchId,
                },
                // getting response
                success:function(res){
                    if($.isEmptyObject(res.error)){
                        $('#table').html('');
                        $('#table').append(res);
                    }
                },
            });
        });
    });
</script>

@endsection

